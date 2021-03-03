<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class TradeSignals extends Model
{
    use UsesUuid;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sent_by', 
        'created_by',
        'coin_name', 
        'trade_type' , 
        'trade_action',
        'entry_point' , 
        'exit_point' , 
        'stop_loss' , 
        'image' , 
        'additional_info',
        'status'
    ];


}