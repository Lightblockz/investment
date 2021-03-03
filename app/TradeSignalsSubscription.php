<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class TradeSignalsSubscription extends Model
{
    use UsesUuid;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'email', 
        'phone', 
        'signal_plan_id' , 
        'via_email' , 
        'via_phone' , 
        'duration' , 
        'start_date' , 
        'end_date',
        'amount_paid' , 
        'status'
    ];


}
