<?php

namespace Hestalabs\Subscription\Models;;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptionLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'subscription_id', 'subscription_start_date', 'subscription_end_date', 'created_by'
    ];
}
