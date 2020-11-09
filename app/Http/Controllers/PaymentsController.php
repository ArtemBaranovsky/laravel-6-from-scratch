<?php

namespace App\Http\Controllers;

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
//        Mail::to();
//        Notification::send(request()->user());
//        Notification::send(request()->user(), new PaymentReceived());
        request()->user()->notify(new PaymentReceived());
        return redirect('payments.create');
    }
}
