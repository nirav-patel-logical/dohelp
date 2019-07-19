<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Help extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function get_help_list($start, $limit)
    {
        return DB::table('get_help')
            ->select('users.id',
                    'users.user_name',
                    'users.user_mobile_country_code',
                    'users.user_mobile',
                    'users.user_city',
                    'users.user_reference_number',
                    'users.user_status',
                    'users.user_gender',
                    'get_help.status',
                    'get_help.date',
                    'get_help.amount',
                    'get_help.help_id',
                    'get_help.fess_id'
                    )
            ->leftJoin('users', 'get_help.assign_id', '=', 'users.id')
            ->Where('id','<', $start)
            ->limit($limit)
            ->get();
    }

    public function paid_help_list($start, $limit)
    {
        return DB::table('paid_help')
            ->select('users.id',
                'users.user_name',
                'users.user_mobile_country_code',
                'users.user_mobile',
                'users.user_city',
                'users.user_reference_number',
                'users.user_status',
                'users.user_gender',
                'paid_help.status',
                'paid_help.date',
                'paid_help.amount',
                'paid_help.paid_id',
                'paid_help.fess_id'
            )
            ->leftJoin('users', 'paid_help.assign_id', '=', 'users.id')
            ->Where('id','<', $start)
            ->limit($limit)
            ->get();
    }

    public function get_user_details_by_user_id($user_id)
    {
        return DB::table($this->table)
            ->select('id',
                'user_name',
                'user_mobile_country_code',
                'user_mobile',
                'user_city',
                'user_reference_number',
                'user_status',
                'user_gender',
                'user_image',
                'user_add_date',
                'user_details_id',
                'user_bank_name',
                'user_bank_number',
                'user_IFSC_code',
                'user_bank_branch',
                'user_phone_pay_number',
                'user_paytm_number',
                'user_google_pay_number',
                'user_details_amount',
                'user_details_payment_date',
                'user_details_by',
                'user_details_image'
            )
            ->leftJoin('user_details', 'users.id', '=', 'user_details.user_id')
            ->Where('user_role_name','!=','Admin')
            ->Where('id','=',$user_id)
            ->get();
    }

    public function get_user_details_for_dashboard($user_id)
    {
        return DB::table($this->table)
            ->select('id',
                'user_name',
                'user_mobile_country_code',
                'user_mobile',
                'user_city',
                'user_reference_number',
                'user_gender',
                'user_image',
                'user_add_date'
            )
            ->Where('user_role_name','!=','Admin')
            ->Where('id','=',$user_id)
            ->get();
    }

}
