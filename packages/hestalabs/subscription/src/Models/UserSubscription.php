<?php

namespace Hestalabs\Subscription\Models;

use User;
use Hestalabs\Subscription\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubscription extends Model
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'subscription_id', 'subscription_start_date', 'subscription_end_date', 'created_by'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the user associated with the subscription.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Get the user subscription associated with the user.
     */
    public function subscription()
    {
        return $this->belongsTo('Hestalabs\Subscription\Models\SubscriptionPlan', 'subscription_id', 'id');
    }
}
