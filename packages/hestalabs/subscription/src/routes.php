<?php 

//Route::group(['namespace'=> 'Hestalabs\Subscription\Controllers', 'middleware' => 'web'], function(){

Route::group(['namespace'=> 'Hestalabs\Subscription\Controllers'], function(){
	route::resource('/subscription','SubscriptionPlanController');
	route::get('/subscriptionSearch','SubscriptionPlanController@Search');

	route::resource('/user_subscription','UserSubscriptionController');
	route::get('/user_subscriptionSearch','UserSubscriptionController@Search');
});