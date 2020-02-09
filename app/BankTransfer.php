<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
// use Spatie\Activitylog\Models\Activity;

class BankTransfer extends Model
{
    // use LogsActivity;
    use UsesUuid;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'id',
        'user_id', 
        'reference_id', 
        'amount' , 
        'investment_plan_id' , 
        'duration' , 
        'status' , 
        'interest',
        'image',
        'verified',

    ];


    /**
     * Get the user that owns the wallet.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // protected static $logAttributes = [
    //     'user_id', 'investment_plan_id', 'reference_id' , 'duration' , 'amount' , 'image'
    //   ];
  
    //   public function tapActivity(Activity $activity, string $eventName)
    //   {
    //       $activity->causer_name = isset(Auth::user()->name) ? Auth::user()->name : "";
    //   }
  
    //   public function getDescriptionForEvent(string $eventName): string
    //   {
    //       return "Bank Transfer has been {$eventName}";
    //   }

}
