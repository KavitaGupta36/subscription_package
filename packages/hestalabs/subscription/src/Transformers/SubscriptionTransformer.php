<?php

namespace Hestalabs\Subscription\Transformers;

use Hestalabs\Subscription\Models\SubscriptionPlan;
use Illuminate\Http\Request;

trait SubscriptionTransformer 
{
	
	public function __construct(SubscriptionPlan $subscription_plan)
	{
	    $this->subscription_plan = $subscription_plan;
	}
	/*
	 *Save subscription update 
	 */
	public function updateRequest($request, $id)
	{
		try {
			if($request->hasFile('thumbnail')) {
	            $this->uploadImage($request);
	            $input['thumbnail'] = $request->thumbnail;
	        }
			$input['title']         =   $request->title;
	        $input['description']   =   $request->description;
	        $input['price']         =   $request->price;
	        $input['valid_time']    =   $request->valid_time;
	        $input['validity_text'] =   $request->validity_text;
	        return $this->subscription_plan->findorfail($id)->update($input);
		} catch (Exception $e) {
			dd($e);
		}
	}	
}