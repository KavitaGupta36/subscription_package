<?php

namespace Hestalabs\Subscription\Transformers;

use Auth;
use Carbon;
use Hestalabs\Subscription\Models\SubscriptionPlan;
use Hestalabs\Subscription\Models\UserSubscription;
use Illuminate\Http\Request;

trait UserSubscriptionTransformer 
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct(SubscriptionPlan $subscription_plan, UserSubscription $user_subscription)
	{
	    $this->subscription_plan = $subscription_plan;
	    $this->user_subscription = $user_subscription;
	}
	
	/**
	 *Save User subscription Detail
	 *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
	 */
	public function storeRequest($request)
	{
		try {
			$subsDetail = $this->subscription_plan->find($request->subscription_id);
            $mytime = Carbon\Carbon::now();
            $start_date = $mytime->toDateTimeString();
            if(!empty($subsDetail) && !empty($subsDetail->validity_text)){
                if($subsDetail->validity_text == 'day')
                    $end_date = $mytime->addDays($subsDetail->valid_time)->toDateTimeString();
                if($subsDetail->validity_text == 'month')
                    $end_date = $mytime->addMonths($subsDetail->valid_time)->toDateTimeString();
                if($subsDetail->validity_text == 'year')
                    $end_date = $mytime->addYear($subsDetail->valid_time)->toDateTimeString();
            }

            $input['user_id']                   =   $request->user_id;
            $input['subscription_id']           =   $request->subscription_id;
            $input['subscription_start_date']   =   $start_date;
            $input['subscription_end_date']     =   $end_date;
            $input['created_by']                =   isset(Auth::user()->id) ? Auth::user()->id : 1;
            return $input;
		} catch (Exception $e) {
			dd($e);
		}
	}	
}