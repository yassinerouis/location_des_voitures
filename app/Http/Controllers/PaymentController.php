<?php

namespace App\Http\Controllers;
use App\Payments;
use App\Reservations;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

/*le paiement des reservations est gere par ce controlleur*/

class PaymentController extends Controller
{
    private $apiContext;
    private $secret;
    private $clientId;
    
    public function __construct(){
        if(config('paypale.settings.mode')=='live'){
            $this->clientId=config('paypale.live_client_id');
            $this->secret=config('paypale.live_secret');
        }
        else{
            $this->clientId=config('paypale.sandbox_client_id');
            $this->secret=config('paypale.sandbox_secret');
        }
        $this->apiContext=new ApiContext(new OAuthTokenCredential($this->clientId,$this->secret));
        $this->apiContext->setConfig(config('paypale.settings'));
    }
    
    public function payment(Request $request)
    {
        
        $price=$request->input('prix');
        $name=$request->input('car');
        $id=$request->input('idr');
       

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item = new Item();

$item->setName($name)
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice($price);
    $itemList = new ItemList();
$itemList->setItems([$item]);
$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal($price); 
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Reservation de la voiture: $name");
    $redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://127.0.0.1:8000/status/$id/$price")
    ->setCancelUrl("http://127.0.0.1:8000/canceled");
    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));   
        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PPConnectionException $ex) {die($ex);
        }
        $payementlink=$payment->getApprovalLink();
        return redirect($payementlink);
}
public function cancel(){
    return redirect('reservations');
}
public function status(Request $request,$id,$price){
if(empty($request->input('PayerID') || $request->input('PayerID'))){
    die('Payment Failed');
}
$paymentId=$request->get('paymentId');
$payment = Payment::get($paymentId, $this->apiContext);
$execution = new PaymentExecution();
$execution->setPayerId($_GET['PayerID']);
$result = $payment->execute($execution, $this->apiContext);
if($result->getState()=='approved'){
    $pay=new Payments();
    $pay->payment_id=$paymentId;
    $pay->reservation_id=$id;
    $reservation=Reservations::find($id);
    $reservation->has_paid="oui";
    $reservation->save();
    $pay->total_price=$price;
    $pay->hash=$this->clientId;
   $pay->save();
    session()->flash('success','Payment bien éffectuer ! !');
    return redirect('reservations');
}
die('$result');
}
}
