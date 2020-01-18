<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id', 
        'investment_id', 
        'reference_id' , 
        'action' , 
        'description' , 
        'previous_amount' , 
        'current_amount' , 
        'executed_by',
        'executed_at'
    ];
}
