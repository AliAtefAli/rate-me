<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        if ($subscription) {
            session()->flash('success', trans('dashboard.subscription.created successfully'));
        } else {
            session()->flash('success', trans('dashboard.subscription.error created'));
        }
        return redirect()->route('subscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        dd($subscription);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        return view('dashboard.subscriptions.edit', compact('subscription'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $deleted = $subscription->delete();
        if ($deleted) {
            session()->flash('success', trans('dashboard.subscription.deleted successfully'));
        } else {
            session()->flash('error', trans('dashboard.subscription.error deleted'));
        }

        return redirect()->route('subscription.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $updated = $subscription->update($request->all());

        if ($updated) {
            session()->flash('success', trans('dashboard.subscription.updated successfully'));
        } else {
            session()->flash('error', trans('dashboard.subscription.error updated'));
        }

        return redirect()->route('subscription.index');

    }
}
