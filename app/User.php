<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Traits\UsesUuid;


class User extends Authenticatable
{
    use Notifiable , UsesUuid;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'last_name', 'email', 'verified', 'password', 'phone' , 'token' , 'reset_token', 'email_verified_at' , 'last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Get the wallet record associated with the user.
     */
    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    /**
     * Get the bank account associated with the user.
     */
    public function bankAccount()
    {
        return $this->hasMany('App\BankAccount');
    }

    /**
     * Get the bank transfers account associated with the user.
     */
    public function bankTransfer()
    {
        return $this->hasMany('App\BankTransfer')->where('verified' , 0);
    }

    /**
     * Get the transactions for the user.
    */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    /**
     * Get the investments for the user.
    */
    public function investments()
    {
        return $this->hasMany('App\MyInvestment');
    }

    /**
     * Get the user's history.
     */
    public function investmentPlan()
    {
        return $this->hasOneThrough('App\InvestmentPlan', 'App\MyInvestment');
    }

}
