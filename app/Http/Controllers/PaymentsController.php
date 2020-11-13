<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        #core effects
        // process the payment using some billing provider
        // unlock the purchase

        // ProductPurchased event
        ProductPurchased::dispatch('toy');
//        event(new ProductPurchased('toy'));   // dispatching this event with a helper

        #side effects
        // listeners:
        // notify the user about the payment
        // award achievements   +
        // send shareable coupon to user +

//        Mail::to();
//        Notification::send(request()->user());
//        Notification::send(request()->user(), new PaymentReceived());
//        request()->user()->notify(new PaymentReceived());
        request()->user()->notify(new PaymentReceived(900));
//        return redirect('payments/create');
    }
}
