<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Wallet extends Model
{
    use UsesUuid;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'available_balance', 'wallet_id'
    ];


    /**
     * Get the user that owns the wallet.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
