<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;

class PaymentsController extends Controller
{

    public function index(Payment $payment)
    {

        $payments = Payment::where('user_id', auth()->id())->with('package')->get();

        return view('payments.index', compact('payments'));

    }

    public function store(Request $request)
    {

    	//If the payment goes trough, create a record
    	Payment::create([
            'user_id' => auth()->id(),
    		'package_id' => request('package_id'),
    		'amount' => request('amount'),
    		'listing_count' => !request('count') ?: 1
    	]);

        flash('You can now post your job listing');

    	return redirect('home');

    }
}
