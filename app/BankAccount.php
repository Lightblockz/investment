<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class BankAccount extends Model
{
    //
    use UsesUuid;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'bank_name', 'account_name' , 'account_number' , 'account_type'
    ];


    /**
     * Get the user that owns the wallet.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

}
