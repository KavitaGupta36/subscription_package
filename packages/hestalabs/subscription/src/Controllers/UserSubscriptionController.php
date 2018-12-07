<?php

namespace Hestalabs\Subscription\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hestalabs\Subscription\Models\UserSubscription;
use Hestalabs\Subscription\Models\SubscriptionPlan;
use Hestalabs\Subscription\Models\UserSubscriptionLog;
use Hestalabs\Subscription\Requests\SubscriptionRequest;
use Hestalabs\Subscription\Transformers\UserSubscriptionTransformer as user_subscription;

class UserSubscriptionController extends Controller
{
    
    use user_subscription;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, SubscriptionPlan $subscription_plan, UserSubscription $user_subscription, UserSubscriptionLog $user_subscription_log)
    {
        $this->user = $user;
        $this->subscription_plan = $subscription_plan;
        $this->user_subscription = $user_subscription;
        $this->user_subscription_log = $user_subscription_log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_subscription = $this->user_subscription->paginate(2);
        return view('subscription::user_subscription', compact('user_subscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $user = $this->user->all();
            $subscription = $this->subscription_plan->all();
            return view('subscription::add_user_subscription', compact('user', 'subscription'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {            
            $input = $this->storeRequest($request);
            $this->user_subscription->create($input);
            $this->user_subscription_log->create($input);
            Session::flash('flash_message', 'Subscription successfully added!');
            return redirect('/user_subscription');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user_subscription = $this->user_subscription->find($id);
            $user = $this->user->find($user_subscription->user_id);
            $subscription = $this->subscription_plan->all();
            return view('subscription::edit_user_subscription', compact('user', 'subscription', 'user_subscription'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->storeRequest($request);
            $this->user_subscription->findorfail($id)->update($input);
            $this->user_subscription_log->findorfail($id)->update($input);
            Session::flash('flash_message', 'Subscription successfully updated!');
            return redirect('/user_subscription');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $subscription = $this->user_subscription->find($id)->delete();
            return redirect('/user_subscription');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Search by User and Subscription  name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request)
    {
        try {
            $search = $request->search;
            if(!empty($search)){
                $user_subscription = $this->user_subscription
                                    ->whereHas('user', function($query) use ($search){
                                          $query->whereRaw("name like '%$search%'");
                                      })->orWhereHas('subscription', function($query) use ($search){
                                          $query->whereRaw("title like '%$search%'");
                                      })->paginate(1);

                return view('subscription::user_subscription', compact('user_subscription'));
                $speakers->appends(['search' => $search]);
            }else{
                return redirect('/user_subscription');
            }
        } catch (Exception $e) {
            dd($e);
        }
        
    }
}
