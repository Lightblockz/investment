<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'available_balance', 'wallet_id'
    ];


    /**
     * Get the user that owns the wallet.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
