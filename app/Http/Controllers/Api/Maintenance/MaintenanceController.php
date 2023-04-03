<?php

namespace App\Http\Controllers\Api\Maintenance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Maintenance\StoreBanksRequest;
use App\Http\Requests\Maintenance\StoreBillerRequest;
use App\Http\Requests\Maintenance\StoreCashPickupAnywhere;
use App\Http\Requests\Maintenance\StoreDoorToDoor;
use App\Http\Requests\Maintenance\StoreFund;
use App\Http\Requests\Maintenance\StoreTransactionRequest;
use App\Models\Biller;
use App\Models\Fee;
use App\Models\Maintenance;
use App\Models\OtherMaintenance;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class MaintenanceController extends Controller
{
    private $maintenance;

    public function __construct(Maintenance $maintenance)
    {
        $this->maintenance = $maintenance;
    }
    //bank functions
    public function getBanks()
    {
        $banks = $this->maintenance::with([
            'billerName' => function ($query) {
                $query->with(['getProvider']);
            }
        ])->where('meta_name', 'CBA')->paginate(10);

        $arr = [];

        foreach ($banks as $bank) {
            $arr[] = [
                'id' => $bank->id,
                'name' => $bank->meta_value,
                'code' => $bank->meta_name,
            ];
        }

        return response()->json($banks);
    }

    public function storeBank(StoreBanksRequest $request)
    {
        DB::beginTransaction();
        try {
            $biller = Biller::create([
                'biller_category_id' => $request->transaction_type_id,
                'transaction_type_id' => $request->transaction_type_id,
                'payment_type' => $request->payment_type,
                'amount_range' => $request->payment_type === 'One Time Charge' ?
                null : json_encode($request->amount_range),
                'provider_id' => $request->provider['id'],
                'name' => $request->meta_value,
                'fields' => json_encode([]),
            ]);

            $this->maintenance::create([
                'provider_id' => $request->provider['id'],
                'meta_value' => $biller->id,
                'meta_name' => $request->ref,
                'meta_id' => $request->meta_id,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return response()->json(['message' => 'Bank added Successfully!']);
    }

    public function updateBank($id, StoreBanksRequest $request)
    {
        $biller = Biller::findOrFail($request->code_id);
        $maintenance = $this->maintenance::findOrFail($id);

        $biller->update([
            'name' => $request->meta_value,
            'provider_id' => $request->provider['id'],
            'payment_type' => $request->payment_type,
            'amount_range' => $request->payment_type === 'Amount Range' ? $request->amount_range : null,
        ]);

        $maintenance->update([
            'meta_id' => $request->meta_id,
        ]);

        return response()->json(['message' => $request->meta_value . " " . 'Bank Update Successfully!']);
    }

    //end bank function

    //start transaction type function
    public function getTransactionTypes()
    {
        $transaction_types = $this->maintenance->filterByColumn($this->maintenance::COLUMN_TRANSACTION);
        $arr = [];

        foreach ($transaction_types as $transaction_type) {
            $arr[] = [
                'value' => $transaction_type->id,
                'abbrevation' => $transaction_type->meta_id,
                'label' => $transaction_type->meta_value,
            ];
        }

        $getTransactionType = collect($arr)->paginate(10);

        return response()->json($getTransactionType);
    }

    public function getTransactions()
    {
        $transaction_types = $this->maintenance->filterByColumn($this->maintenance::COLUMN_TRANSACTION);
        $arr = [];

        foreach ($transaction_types as $transaction_type) {
            $arr[] = [
                'value' => $transaction_type->id,
                'abbrevation' => $transaction_type->meta_id,
                'label' => $transaction_type->meta_value,
            ];
        }
        return response()->json($arr);
    }

    public function getTransactionType()
    {
        $query_transaction_type = $this->maintenance::where('meta_id', request('ref'))->get();
        return response()->json($query_transaction_type);
    }

    public function storeTransactionType(StoreTransactionRequest $request)
    {
        $this->maintenance::create([
            'meta_id' => $request->meta_id,
            'meta_name' => $request->meta_name,
            'meta_value' => $request->meta_value,
        ]);

        return response()->json(['message' => $request->meta_value . " " . 'Added Successfully.']);
    }

    public function updateTransactionType($id, StoreTransactionRequest $request)
    {
        $maintenance = $this->maintenance::findOrFail($id);

        $maintenance->update([
            'meta_id' => $request->meta_id,
            'meta_value' => $request->meta_value,
        ]);

        return response()->json(['message' => $request->meta_value . " " . 'Update Successfully!']);

    }
    //end transaction type function


    //start biller function
    public function getBillerCategory()
    {
        $biller_categories = $this->maintenance->filterByColumn($this->maintenance::COLUMN_BILLER_CATEGORY);

        $arr = [];

        foreach ($biller_categories as $biller_category) {
            $arr[] = [
                'label' => $biller_category->meta_value,
                'value' => $biller_category->id,
                'category' => $biller_category->meta_value,
                'transaction_type' => $biller_category->transactionName,
            ];
        }

        $biller_category = collect($arr)->paginate(10);

        return response()->json($biller_category);
    }

    public function getBillerCategories()
    {
        $biller_categories = $this->maintenance->filterByColumn($this->maintenance::COLUMN_BILLER_CATEGORY);

        $arr = [];

        foreach ($biller_categories as $biller_category) {
            $arr[] = [
                'label' => $biller_category->meta_value,
                'value' => $biller_category->id,
                'category' => $biller_category->meta_value,
                'transaction_type' => $biller_category->transactionName,
            ];
        }

        return response()->json($arr);
    }

    public function storeBillerCategory(StoreBillerRequest $request)
    {
        $this->maintenance::create([
            'meta_id' => $request->transaction_type_id,
            'meta_name' => $request->ref,
            'meta_value' => $request->meta_value,
        ]);

        return response()->json(['message' => $request->meta_value . " " . 'Added Successfully.']);
    }

    public function updateBillerCategory($id, StoreBillerRequest $request)
    {
        $maintenance = $this->maintenance::findOrFail($id);

        $maintenance->update([
            'meta_value' => $request->meta_value,
        ]);
        return response()->json(['message' => $request->meta_value . " " . 'Update Successfully!']);
    }

    //end biller function

    //start door to door

    public function getDoorToDoor()
    {
//        $door_to_doors = $this->maintenance::with(['billerName'])->filterByColumn($this->maintenance::COLUMN_DOOR_TO_DOOR);

        $door_to_doors = $this->maintenance::with([
            'billerName' => function ($query) {
                $query->with(['getProvider']);
            }
        ])->where('meta_name', 'DTD')->get();

        $arr = [];

        foreach ($door_to_doors as $door_to_door) {
            $arr[] = [
                'label' => $door_to_door->meta_value,
                'value' => $door_to_door->id,
                'category' => $door_to_door->meta_name,
                'transaction_type' => $door_to_door->bankTransactionType,
                'dtd' => $door_to_door->billerName,
            ];
        }

        $door_to_door = collect($arr)->paginate(10);

        return response()->json($door_to_door);

    }

    public function updateDoorToDoor($id, StoreDoorToDoor $request)
    {
        $biller = Biller::findOrFail($id);

        $biller->update([
            'name' => $request->name,
            'provider_id' => $request->provider['id'],
        ]);

        return response()->json(['message' => $request->name . " " . 'Has Been Updated.']);
    }

    public function storeDoorToDoor(StoreDoorToDoor $request)
    {
        DB::beginTransaction();
        try {
            $biller = Biller::create([
                'biller_category_id' => $request->transaction_type_id,
                'transaction_type_id' => $request->transaction_type_id,
                'payment_type' => 'none',
                'amount_range' => json_encode([]),
                'name' => $request->name,
                'provider_id' => $request->provider['id'],
                'fields' => json_encode([]),
            ]);

            $this->maintenance::create([
                'provider_id' => $request->provider['id'],
                'meta_id' => $request->transaction_type,
                'meta_value' => $biller->id,
                'meta_name' => $request->ref,
            ]);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return response()->json(['message' => $request->name . " " . 'Added Successfully!']);
    }
    //end door to door


    //start cash pickup anywhere

    public function getCashPickupAnywhere()
    {
//        $cash_pickup_anywhere = $this->maintenance->filterByColumn($this->maintenance::COLUMN_CASH_PICKUP_ANYWHERE);


        $cash_pickup_anywhere = $this->maintenance::with([
            'billerName' => function ($query) {
                $query->with(['getProvider']);
            }
        ])->where('meta_name', 'OTC')->get();

        $arr = [];

        foreach ($cash_pickup_anywhere as $otc) {
            $arr[] = [
                'label' => $otc->meta_value,
                'value' => $otc->id,
                'category' => $otc->meta_name,
                'transaction_type' => $otc->bankTransactionType,
                'otc' => $otc->billerName,
            ];
        }
        $otc = collect($arr)->paginate(10);
        return response()->json($otc);

    }

    public function updateCashPickupAnywhere($id, StoreCashPickupAnywhere $request)
    {
        $biller = Biller::findOrFail($id);

        $biller->update([
            'name' => $request->name,
            'provider_id' => $request->provider['id'],
        ]);

        return response()->json(['message' => $request->name . " " . 'Has Been Updated.']);
    }

    public function storeCashPickupAnywhere(StoreCashPickupAnywhere $request)
    {
        DB::beginTransaction();
        try {
            $biller = Biller::create([
                'biller_category_id' => $request->transaction_type_id,
                'transaction_type_id' => $request->transaction_type_id,
                'payment_type' => 'none',
                'amount_range' => json_encode([]),
                'name' => $request->name,
                'fields' => json_encode([]),
                'provider_id' => $request->provider['id'],
            ]);

            $this->maintenance::create([
                'meta_id' => $request->transaction_type,
                'meta_value' => $biller->id,
                'meta_name' => $request->ref,
                'provider_id' => $request->provider['id'],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return response()->json(['message' => 'Cash Pickup Anywhere Added Successfully!']);
    }
    //end cash pickup anywhere

    public function allFunds()
    {
        $funds = $this->maintenance->filterByColumn($this->maintenance::COLUMN_SOURCE_OF_FUNDS);

        $arr = [];

        foreach ($funds as $fund) {
            $arr[] = [
                'value' => $fund->id,
                'label' => $fund->meta_value,
                'ref' => $fund->meta_name,
            ];
        }

        return response()->json($arr);
    }

    public function storeFund(StoreFund $request)
    {
        $this->maintenance::create([
            'meta_id' => $request->code,
            'meta_name' => $request->ref,
            'meta_value' => $request->name,
        ]);

        return response()->json(['message' => 'Fund added Successfully!']);
    }

    public function getFund(Maintenance $maintenance)
    {
        return response()->json($maintenance);
    }

    public function updateFund(Maintenance $maintenance, StoreFund $request)
    {
        ;
        $maintenance->update([
            'meta_id' => $request->code,
            'meta_name' => $request->ref,
            'meta_value' => $request->name,
        ]);

        return response()->json(['message' => 'Fund updated Successfully!']);
    }
}
