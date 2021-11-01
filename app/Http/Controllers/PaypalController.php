<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sold_Item;
use App\Customer_Order;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrder;
use App\Mail\OrderConfirmation;
use Carbon\Carbon;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ShippingAddress;
use PayPal\Api\PayerInfo;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{



    public function payment(Request $request){ 

    require 'vendor/autoload.php';


    $clientId = env('PAYPAL_CLIENT_ID');
    $clientSecret = env('PAYPAL_SECRET_ID');

    $environment = new SandboxEnvironment($clientId, $clientSecret);
    $client = new PayPalHttpClient($environment);

    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');

    $item_list = [];

    foreach(session('cart.shopping_cart') as $sku => $details){
    
    $item = [
        "name"=>$details['name'],
        "unit_amount"=>[
            "value"=>$details['cad_price'],
            "currency_code"=>'CAD',
        ],
        "quantity"=>'1',
        "sku"=>$details['sku']
    ];

    array_push($item_list,$item);

    if (isset($details['stone'])) {
    

    $item = [
        "name"=>$details['stone']['stone_sku']." ".$details['stone']['name']." with ring",
        "unit_amount"=>[
            "value"=>$details['stone']['cad_price'],
            "currency_code"=>'CAD',
        ],
        "quantity"=>'1',
        "sku"=>$details['stone']['stone_sku']
    ];

    array_push($item_list,$item);

    }


    }
       
        $request->body = [
         "application_context"=>[
            "brand_name"=>'Excel Jewellers',
            "shipping_preference"=>'SET_PROVIDED_ADDRESS'
        ],
         "intent" => "CAPTURE",
         "purchase_units" => [[
             "reference_id" => "test_ref_id1",
             "amount" => [
                 "value" => session('cart.shopping_cart_detail')['total_cost'],
                 "currency_code" => 'CAD',
                 "breakdown" => [
                     "item_total"=>["value"=>session('cart.shopping_cart_detail')['subtotal'],"currency_code"=>'CAD'],
                     "tax_total"=>["value"=>session('cart.shopping_cart_detail')['estimate_total_tax'],"currency_code"=>'CAD'],
                     "shipping"=>["value"=>session('cart.shopping_cart_detail')['shipping_amount'],"currency_code"=>'CAD'],
                 ],
             ],

             "items"=>$item_list,
             "shipping"=> [
                "address"=> [
                    "address_line_1"=>session("cart.address")["address"],
                    "address_line_2"=>session("cart.address")["line2"],
                    "admin_area_2"=>session("cart.address")["city"],
                    "admin_area_1"=>session("cart.address")["spr"],
                    "postal_code"=>session("cart.address")["zipcode"],
                    "country_code"=>'CA'
                ]
            ],
         ]],
         "application_context" => [
              "cancel_url" => "http://localhost/newexcel/shopcart",
              "return_url" => "http://localhost/newexcel/process"
         ] 
     ];



    try {
        // Call API with your client and get a response for your call
        $response = $client->execute($request);

        
        // If call returns body in response, you can get the deserialized version from the result attribute of the response

        return redirect($response->result->links[1]->href);

    }catch (HttpException $ex) {
        echo $ex->statusCode;
        print_r($ex->getMessage());
    }

    return 3; 




          if (!session('address') && !session('cart')) {
            return back()->withErrors(['error','Error Please Retry']);
        }else{
        
            
                $apiContext = new \PayPal\Rest\ApiContext(
                  new \PayPal\Auth\OAuthTokenCredential(
                    env('PAYPAL_CLIENT_ID'),
                    env('PAYPAL_SECRET_ID')
                  )
                );


                $apiContext->setConfig(
                    array(
                        'mode' => env('PAYPAL_MODE'),
                        'log.LogEnabled' => true,
                        'log.FileName' => 'PayPal.log',
                        'log.LogLevel' => 'FINE', // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                        'cache.enabled' => true,
                         'validation.level' => 'log'

                    )
                );

                $payer = new Payer();
                $payer->setPaymentMethod("paypal");


                $shippingAddress = new ShippingAddress();
                $shippingAddress
                  ->setLine1('111 First Street')
                  ->setCity('Saratoga')
                  ->setState('CA')
                  ->setPostalCode('95070')
                  ->setCountryCode('US');

                $payerInfo = new PayerInfo();
                $payerInfo->setShippingAddress($shippingAddress);


                $payer->setPayerInfo($payerInfo);

                // Set redirect URLs
                $redirectUrls = new RedirectUrls();
                // $redirectUrls->setReturnUrl('https://www.exceljewellers.com/process')
                //   ->setCancelUrl('https://www.exceljewellers.com/shopcart');

                $redirectUrls->setReturnUrl('http://localhost/newexcel/process')
                  ->setCancelUrl('http://localhost/newexcel/shopcart');

                $k = 1;
                $paypal_item = array();

                foreach(session('cart.shopping_cart') as $sku => $cart_item){

                    $k = new Item();
                    $paypal_item[] = $k->setName($cart_item['sku']." ".$cart_item['name']) /** item name **/
                    ->setCurrency('CAD')
                    ->setQuantity(1)
                    ->setPrice($cart_item['cad_price']); /** unit price **/
                    $k++;
                    
                    if (isset($cart_item['stone'])) {
                    
                        $k = new Item();
                        $paypal_item[] = $k->setName($cart_item['stone']['stone_sku']." ".$cart_item['stone']['name']) /** item name **/
                        ->setCurrency('CAD')
                        ->setQuantity(1)
                        ->setPrice($cart_item['stone']['cad_price']); /** unit price **/
                        $k++;

                    }

                }

                // dd($paypal_item);

                $item_list = new ItemList();
                $item_list->setItems($paypal_item);
                $shipping_cost = session('cart.shopping_cart_detail')['shipping_amount'];
                $tax = session('cart.shopping_cart_detail')['estimate_total_tax'];
                $subtotal = session('cart.shopping_cart_detail')['subtotal'];
                //session('address')['tax'] = 10;
                $total = session('cart.shopping_cart_detail')['total_cost'];

                if ($total != ($shipping_cost+$tax+$subtotal)) {
                    abort(404);
                }

                    $details = new Details();
                    $details->setShipping($shipping_cost)
                        ->setTax($tax)
                        ->setSubtotal($subtotal);
                
                    $amount = new Amount();
                    $amount->setCurrency("CAD")
                        ->setTotal($total)
                        ->setDetails($details);
                
                // Set transaction object
                
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Purchasing Jewelry');
                // Create the full payment object

                $payment = new Payment();
                $payment->setIntent('sale')
                  ->setPayer($payer)
                  ->setRedirectUrls($redirectUrls)
                  ->setTransactions(array($transaction));

                try {
                  $payment->create($apiContext);
                  // Get PayPal redirect URL and redirect the customer
                  $approvalUrl = $payment->getApprovalLink();
               //   $approvalUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
                  return redirect($approvalUrl);

                  // Redirect the customer to $approvalUrl
                } catch (PayPal\Exception\PayPalConnectionException $ex) {
                  echo $ex->getCode();
                  echo $ex->getData();
                  die($ex);
                } catch (Exception $ex) {
                  die($ex);
                }

        

        }
    }


public function process(Request $request){

        $order_num = 'I' . str_random(4) . now()->timestamp . Auth::id();

        foreach(session('cart.shopping_cart') as $sku => $item){

            $sold = new Sold_Item;
            $sold->order_num = $order_num;
            $sold->user_id = (Auth::id() or 0);
            $sold->item_sku = $item['sku'];
            $sold->img = $item['default_img'];
            $sold->item_style = $item['name'];
            $sold->sold_price = $item['cad_price'];
            $sold->tax = $item['price']*session('cart.shopping_cart_detail.tax_rate');
            $sold->size = $item['size'];
            $sold->engraving = $item['engraving'];
            $sold->returns = $item['return'];
            if (isset($item['stone'])) {
                $sold->diamond_id=$item['stone']['stone_sku'];
                $sold->diamond_name=$item['stone']['name'];
                $sold->diamond_shape=$item['stone']['shape'];
                $sold->diamond_price=$item['stone']['cad_price'];
            }
            $sold->save();

            if (isset($item['stone'])){

                $stone = [
                    "diamond_id" =>$item['stone']['stone_id'],
                    "diamond_sku" =>$item['stone']['stone_sku'],
                    "name"=>$item['stone']['name'],
                    "default_img"=>$item['stone']['default_img'],
                    "shape" =>$item['stone']['shape'],
                    "size" =>$item['stone']['size'],
                    "color" =>$item['stone']['color'],
                    "clarity" =>$item['stone']['clarity'],
                    "carat" =>$item['stone']['carat'],
                    "price" =>$item['stone']['cad_price'],
                    "cert_num"=>$item['stone']['cert_num'],
                    "url"=>$item['stone']['url']
                ];

            }else{
                $stone = null;
            }

            $order[] = [
                'order_num'=>$order_num,
                'item_sku'=>$item['sku'],
                'item_name'=>$item['name'],
                'price'=>$item['cad_price'],
                'size'=>$item['size'],
                'brand'=>$item['brand'],
                'engraving'=>$item['engraving'],
                'link'=>$item['link'],
                'img'=>$item['default_img'],
                'stone'=>$stone
            ];

        }

        $cus_ord = new Customer_Order;
        $cus_ord->user_id = (Auth::id() or 0);
        $cus_ord->order_num = $order_num;
        $cus_ord->total_price = session('cart.shopping_cart_detail.subtotal');
        $cus_ord->shipping_cost = session('cart.shopping_cart_detail.shipping_amount');
        $cus_ord->tax = session('cart.shopping_cart_detail.estimate_total_tax');
        $cus_ord->discount = session('cart.coupon_code_applied.discount');
        $cus_ord->payment_method = "PayPal";
        $cus_ord->contact_name = session('cart.address.contact_name');
        $cus_ord->phone_number = session('cart.address.phone_number');
        $cus_ord->email_address = session('cart.address.email_address');
        $cus_ord->address = session('cart.address.address');
        $cus_ord->unit = session('cart.address.unit');
        $cus_ord->country = session('cart.address.country');
        $cus_ord->spr = session('cart.address.spr');
        $cus_ord->city = session('cart.address.city');
        $cus_ord->zipcode = session('cart.address.zipcode');
        $cus_ord->save();

        $ip = file_get_contents("http://ipecho.net/plain");
        $url = 'http://ip-api.com/json/'.$ip;
        $tz = file_get_contents($url);
        $tz = json_decode($tz,true)['timezone'];

        $data = [
            'customer'=>[
                'user'=>Auth::id(),
                'contact_name'=>session('cart.address.contact_name'),
                'phone_number'=>session('cart.address.phone_number'),
                'email'=>session('cart.address.email_address'),
                'address'=>session('cart.address.address'),
                'country'=>session('cart.address.country'),
                'spr'=>session('cart.address.spr'),
                'city'=>session('cart.address.city'),
                'zipcode'=>session('cart.address.zipcode'),
                'subtotal'=>session('cart.shopping_cart_detail.subtotal'),
                'shipping'=>session('cart.shopping_cart_detail.shipping_amount'),
                'tax'=>session('cart.shopping_cart_detail.estimate_total_tax'),
                'discount'=>session('cart.coupon_code_applied.discount'),
                'total'=>session('cart.shopping_cart_detail.total_cost'),
                'time'=>carbon::now($tz)->addDays(30)->format('Y/m/d')
            ],
            'order'=>$order
        ];

Mail::to('brandonsanghuynh123@gmail.com')->send(new SendOrder($data));
Mail::to('brandonsanghuynh123@gmail.com')->send(new OrderConfirmation($data));
// Mail::to('sales@exceljewellers.com')->send(new SendOrder($data));
// Mail::to('order@exceljewellers.com')->send(new SendOrder($data));
Mail::to(session('cart.address.email_address'))->send(new OrderConfirmation($data));


Session::forget('cart');
session()->put('order_num',$order_num);

    }

}
