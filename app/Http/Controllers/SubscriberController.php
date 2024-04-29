<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;

class SubscriberController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriberRequest $request)
    {
        Subscriber::create($request->validated());
        return back()->with('status', 'subscribed successfully');
    }

   
}
