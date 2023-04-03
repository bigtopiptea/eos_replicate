<?php

use App\Http\Controllers\API\Address\AddressController;
use App\Http\Controllers\Api\Biller\BillerController;
use App\Http\Controllers\API\Branch\BranchController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\API\CustomEmailController;
use App\Http\Controllers\Api\Fee\FeeController;
use App\Http\Controllers\Api\HandlingFee\HandlingFeeController;
use App\Http\Controllers\Api\Maintenance\MaintenanceController;
use App\Http\Controllers\Api\OutBoundController;
use App\Http\Controllers\Api\InBoundController;
use App\Http\Controllers\Api\TransactionOutBoundController;
use App\Http\Controllers\Api\TransactionInBoundController;
use App\Http\Controllers\Api\Rate\RateController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CustomFieldController;
use App\Models\CustomerField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('outbound')->middleware('auth:sanctum')->group(
    function () {
        Route::get('companies', [OutBoundController::class, 'companies']);
        Route::get('get-companies', [OutBoundController::class, 'getCompanies']);
        Route::get('branches', [OutBoundController::class, 'branches']);
        Route::get('get-branches', [OutBoundController::class, 'getBranches']);
        Route::get('get-branch-details', [OutBoundController::class, 'getBranchDetails']);
        Route::get('biller-categories', [OutBoundController::class, 'billerCategory']);
        Route::get('billers', [OutBoundController::class, 'billers']);
        Route::get('get-billers', [OutBoundController::class, 'getBillers']);
        Route::get('transaction-types', [OutBoundController::class, 'transactionTypes']);
        Route::get('get-transaction-types', [OutBoundController::class, 'getTransactionTypes']);
        Route::get('banks', [OutBoundController::class, 'banks']);
        Route::get('source-of-funds', [OutBoundController::class, 'sourceOfFunds']);
        Route::get('get-source-of-funds', [OutBoundController::class, 'getSourceOfFunds']);
        Route::get('fees', [OutBoundController::class, 'fees']);
        Route::get('rates', [OutBoundController::class, 'rates']);
        Route::get('get-branch-currencies', [OutBoundController::class, 'getBranchCurrencies']);
        Route::get('cmt-rate', [OutBoundController::class, 'getCmtRate']);
    }
);
Route::prefix('inbound')->middleware('auth:sanctum')->group(
    function () {
        Route::put('fees/{id}', [InBoundController::class, 'fees']);
        Route::put('rates/{id}', [InBoundController::class, 'rates']);
    }
);

Route::prefix('transaction-inbound')->middleware('auth:sanctum')->group(
    function () {
        Route::post('transaction', [TransactionInBoundController::class, 'saveTransaction']);
    }
);

Route::prefix('transaction-outbound')->middleware('auth:sanctum')->group(
    function () {
        Route::get('processed', [TransactionOutBoundController::class, 'getAllTransactions']);
    }
);

Route::get('companies', [OutBoundController::class, 'companies']);

Route::group(['middlware' => ['auth:sanctum']], function () {
    //USER
    Route::get('get-api-access', [UserController::class, 'getAPIAccess']);
    Route::get('check-permission', [UserController::class, 'checkUserPermission']);
    Route::get('get-auth-user', [UserController::class, 'getAuthenthecatedUser']);

    //Company Route
    Route::prefix('companies')->group(
        function () {
            Route::get('pagination', [CompanyController::class, 'companyPagination']);
            Route::put('status/update', [CompanyController::class, 'updateCompanyStatus']);
            Route::put('details/update/{id}', [CompanyController::class, 'updateCompanydetails']);
        }
    );

    //Branches
    Route::get('branches/pagination', [BranchController::class, 'branchesPagination']);
    Route::put('/branches/remove_currency/{branch}', [BranchController::class, 'removeCurrency']);
    Route::put('/branches/{branch}/add', [BranchController::class, 'addCurrency']);
    Route::Get('/branches/{branch}/get', [BranchController::class, 'getBranchByCompany']);

    //Address Route
    Route::get('/country/currency', [AddressController::class, 'currency']);
    Route::get('/country/list', [AddressController::class, 'getCountry']);
    Route::get('/state/{country}/list', [AddressController::class, 'getStateByCountry']);
    Route::get('/city/{iso2}/list', [AddressController::class, 'getCityByProvince']);
    Route::get('/province/{country}/{region}/{fips_code}/list', [AddressController::class, 'getProvinceByRegion']);

    Route::prefix('maintenance')->group(
        function () {
            Route::get('bank', [MaintenanceController::class, 'getBanks']);
            Route::post('bank', [MaintenanceController::class, 'storeBank']);
            Route::put('bank/{id}', [MaintenanceController::class, 'updateBank']);

            Route::prefix('transaction-type')->group(
                function () {
                    Route::get('/name', [MaintenanceController::class, 'getTransactionType']);
                    Route::get('/list', [MaintenanceController::class, 'getTransactions']);
                    Route::get('', [MaintenanceController::class, 'getTransactionTypes']);
                    Route::post('', [MaintenanceController::class, 'storeTransactionType']);
                    Route::put('{id}', [MaintenanceController::class, 'updateTransactionType']);
                }
            );

            Route::prefix('provider')->group(
                function () {
                    Route::get('/list', [\App\Http\Controllers\Api\Provider\ProviderController::class, 'index']);
                }
            );
            Route::prefix('biller-category')->group(
                function () {

                    Route::get('', [MaintenanceController::class, 'getBillerCategory']);
                    Route::get('/list', [MaintenanceController::class, 'getBillerCategories']);
                    Route::post('', [MaintenanceController::class, 'storeBillerCategory']);
                    Route::put('{id}', [MaintenanceController::class, 'updateBillerCategory']);
                }
            );
            Route::prefix('door-to-door')->group(
                function () {
                    Route::get('', [MaintenanceController::class, 'getDoorToDoor']);
                    Route::put('/name/{id}', [MaintenanceController::class, 'updateDoorToDoor']);
                    Route::post('', [MaintenanceController::class, 'storeDoorToDoor']);
                }
            );
            Route::prefix('cash-pickup-anywhere')->group(
                function () {
                    Route::get('', [MaintenanceController::class, 'getCashPickupAnywhere']);
                    Route::put('/name/{id}', [MaintenanceController::class, 'updateCashPickupAnywhere']);
                    Route::post('', [MaintenanceController::class, 'storeCashPickupAnywhere']);
                }
            );
            Route::prefix('funds')->group(
                function () {
                    Route::get('', [MaintenanceController::class, 'allFunds']);
                    Route::get('/{maintenance}', [MaintenanceController::class, 'getFund']);
                    Route::post('store', [MaintenanceController::class, 'storeFund']);
                    Route::put('update/{maintenance}', [MaintenanceController::class, 'updateFund']);
                }
            );
            Route::prefix('data-entry')->group(
                function () {
                    Route::get('', [CustomFieldController::class, 'dataEntryIndex']);
                }
            );

            Route::apiResources(['custom-emails' => CustomEmailController::class]);
        }
    );

    Route::prefix('users')->group(
        function () {
            Route::put('{user}/status', [UserController::class, 'updateUserStatus']);
        }
    );

    Route::prefix('transactions')->group(
        function (){
            Route::get('/', [\App\Http\Controllers\Api\TransactionController::class, 'index']);
            Route::post('storeValidation', [\App\Http\Controllers\Api\TransactionController::class, 'storeValidation']);
            Route::get('{eos_batch_id}/processed-data', [\App\Http\Controllers\Api\TransactionController::class, 'processed']);
            Route::post('processedForApproval', [\App\Http\Controllers\Api\TransactionController::class, 'processForApproval']);
            Route::get('monitoring', [\App\Http\Controllers\Api\TransactionController::class, 'monitoring']);
            Route::get('monitoring/{monitoring_id}', [\App\Http\Controllers\Api\TransactionController::class, 'outfile']);
            Route::put('monitoring/change-status/{id}', [\App\Http\Controllers\Api\TransactionController::class, 'changeStatus']);
            Route::get('edit-transaction/{id}', [\App\Http\Controllers\Api\TransactionController::class, 'editTransaction']);
        }
    );

    //custom fields
    Route::get('custom-fields/pagination', [CustomFieldController::class, 'fieldsPagination']);

    //fees route
    Route::put('/fees/service-fee/{fee}', [FeeController::class, 'updateServiceFee']);
    Route::get('/fees/branch-currency', [FeeController::class, 'getBranchCurrency']);
    Route::put('/fees/update/service-fees', [FeeController::class, 'updateMultipleServiceFee']);
    Route::put('/fees/update/amendment-fees', [FeeController::class, 'updateMultipleAmendmentFee']);
    Route::put('/fees/update/refund-fees', [FeeController::class, 'updateMultipleRefundFee']);

    //Handling fee
    Route::post('/service-fee/store', [HandlingFeeController::class, 'storeServiceFee']);
    Route::get('/handling-fee/currency', [HandlingFeeController::class, 'sortByCurrency']);
    Route::put('/service-fee/update', [HandlingFeeController::class, 'updateMultipleServiceFee']);

    //biller per transaction type
    Route::get('/biller-cba', [BillerController::class, 'getCBAType']);
    Route::get('/biller-type/list', [HandlingFeeController::class, 'index']);
    Route::get('/biller-type/list/{transaction_type}', [BillerController::class, 'getBillerByTransactionType']);

    //rate cmt
    Route::get('/rates/cmt/list', [RateController::class, 'cmtRate']);
    Route::put('/rates/cmt/{id}', [RateController::class, 'updateCmtRate']);

    Route::apiResources([
        'users' => UserController::class,
        'companies' => CompanyController::class,
        'branches' => BranchController::class,
        'custom-fields' => CustomFieldController::class,
        'billers' => BillerController::class,
        'rates' => RateController::class,
        'fees' => FeeController::class,
    ]);
});
