<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Stripe;
use Session;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Request  $request){ 
        $payment=auth()->user()->payment;  
        return view('payment',compact('payment'));
    }
  
    public function makePayment(Request  $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge=Stripe\Charge::create ([
                "amount" =>  (1500),
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "pay and chill"
            ]);
        if($charge->paid){
            $desc = $charge->description;
                $payment = [
                    'payment_id'=> $charge->id,
                    'payer_email'=>auth()->user()->email,
                    'amount'=>($charge->amount),
                    'currency'=>$charge->currency,
                    'payment_status'=>$charge->status,
                    'user_id'=>auth()->user()->id,
                    
                ];
            payment::create($payment);
        }
        return redirect()
                 ->route('home')
                 ->with('success','Payment successfully made.');
    }

}
