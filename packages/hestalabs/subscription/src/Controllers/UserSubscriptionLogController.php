<?php

namespace Hestalabs\Subscription\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSubscriptionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subscription::user_subscription');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSubscriptionLog  $userSubscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function show(UserSubscriptionLog $userSubscriptionLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSubscriptionLog  $userSubscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSubscriptionLog $userSubscriptionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSubscriptionLog  $userSubscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSubscriptionLog $userSubscriptionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSubscriptionLog  $userSubscriptionLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSubscriptionLog $userSubscriptionLog)
    {
        //
    }
}
