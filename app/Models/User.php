<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Closure;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'user_name',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'mobile_number',
        'email',
        'company_id',
        'branch_id',
        'status',
        'is_online',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companyName()
    {
        return $this->hasOne(Company::class, 'id', 'company_id')->select(['id', 'name', 'partner_code']);
    }

    public function branchName()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id')->select(['id', 'name', 'currency', 'type_of_fee']);
    }

    public function currency()
    {
        $branch = Branch::where('id', $this->branch_id)->first();
        return Country::where('id', $branch->country)->first('currency');
    }

    public function branchCurrency()
    {
        return Branch::where('id', $this->branch_id)->select(['currency'])->first();
    }

//    public function selectFromCurrency(){
//        return self::branchCurrency();
//    }

    public function permissions()
    {
        return $this->hasOne(UserPermission::class, 'user_id', 'id');
    }

    public function tokens()
    {
        return $this->morphMany(PersonalAccessToken::class, 'tokenable');
    }

    public static function transaction(Closure $callback)
    {
        DB::beginTransaction();
        try {
            $callback();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Manila')->toDateTimeString();
    }

    public function getAuthIdentifierName()
    {
        return 'user_name';
    }
}
