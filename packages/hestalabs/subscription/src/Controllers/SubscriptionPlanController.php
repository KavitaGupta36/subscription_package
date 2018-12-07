<?php

namespace Hestalabs\Subscription\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hestalabs\Subscription\Models\SubscriptionPlan;
use Hestalabs\Subscription\Transformers\SubscriptionTransformer as subscription_transformer;

class SubscriptionPlanController extends Controller
{
    
    use subscription_transformer;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $subscription = $this->subscription_plan->paginate(2);
            return view('subscription::subscription', compact('subscription'));
        } catch (Exception $e) {
            dd($e);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscription::add_subscription');
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
            $this->uploadImage($request);
            $input = request()->all();
            $input['thumbnail'] = $request->image;
            $this->subscription_plan->create($input);
            //Session::flash('flash_message', 'Subscription successfully added!');
            //$flash_message = "Subscription successfully added!";
            return redirect('/subscription');
            //return redirect('/subscription')->with('flash_message');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $details = $this->subscription_plan->find($id);
            return view('subscription::edit_subscription', compact('details'));
        } catch (Exception $e) {
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->updateRequest($request, $id);
            //Session::flash('flash_message', 'Subscription successfully updated!');
            return redirect('/subscription');
        } catch (Exception $e) {
            dd($e);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $subscription = $this->subscription_plan->find($id)->delete();
            return redirect('/subscription');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Upload Image And store in folder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImage($request)
    {
        try {
            if($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $originalName = $image->getClientOriginalName();
                $destinationPath = public_path('/uploads/subscription');
                $imagePath = $destinationPath. "/".  $originalName;
                $image->move($destinationPath, $originalName);
                $request->thumbnail = $originalName;
            }
            return;
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Validate field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function validation($request)
    {
        $this->validate($request, [
            'title'          => 'required|min:3|max:50',
            'description'   => 'required',
        ]);
        return;
    }*/

    /**
     * Search Subscription by name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Search(Request $request)
    {
        try {
            $search = $request->search;
            if(!empty($search)){
                $subscription=$this->subscription_plan->whereRaw("title like '%$search%'")->paginate(2);
                return view('subscription::subscription', compact('subscription'));
                $subscription->appends(['search' => $search]);
            }else{
                Session::flash('flash_message', 'Search field will be not blank.');
                return redirect('/subscription');
            }  
        } catch (Exception $e) {
            dd($e);
        }
    }
}
