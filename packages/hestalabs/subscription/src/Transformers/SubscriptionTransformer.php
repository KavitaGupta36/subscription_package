<?php

namespace Hestalabs\Subscription\Transformers;

use Hestalabs\Subscription\Models\SubscriptionPlan;
use Illuminate\Http\Request;

trait SubscriptionTransformer 
{
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct(SubscriptionPlan $subscription_plan)
	{
	    $this->subscription_plan = $subscription_plan;
	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
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