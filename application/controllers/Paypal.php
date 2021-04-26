<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


	class Paypal Extends Ci_controller{

		function  __construct() {
        	
        	parent::__construct();
        	
        	$this->load->library('paypal_lib');
        	
    	}
		public function index(){
			echo "sai aa";
		}

		public function my_func(){
            //Set variables for paypal form
    			//echo "sai";
    			//die;
            $returnURL = base_url().'paypal/success'; //payment success url
            $cancelURL = base_url().'paypal/cancel'; //payment cancel url
            $notifyURL = base_url().'paypal/ipn'; //ipn url
          
           
            $userID = 1; //current user id
            $logo = base_url().'assets/images/test-logo.png';
            
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', 'Test Product');
            $this->paypal_lib->add_field('custom', $userID);
            $this->paypal_lib->add_field('item_number',  '1');
            $this->paypal_lib->add_field('amount',  '100');        
            $this->paypal_lib->image($logo);
            
            $this->paypal_lib->paypal_auto_form();
        }

        public function success(){
            //get the transaction data
            $paypalInfo = $this->input->request();
            
            echo "<pre>";
            print_r($paypalInfo);
          die;
            $data['item_number'] = $paypalInfo['item_number']; 
            $data['txn_id'] = $paypalInfo["tx"];
            $data['payment_amt'] = $paypalInfo["amt"];
            $data['currency_code'] = $paypalInfo["cc"];
            $data['status'] = $paypalInfo["st"];
        
            //pass the transaction data to view
            $this->load->view('paypal/success', $data);
        }
     
        public function cancel(){
            
            //echo "payment cancel"; 
            //$this->load->view('paypal/cancel');
            ?>
                <div class="container">

                    <div class="starter-template">
                        <h1>PayPal Payment</h1>
                        <p class="lead">Canceld order</p>
                    </div>

                    <div class="contact-form">

                        <div>
                            <h3 style="font-family: 'quicksandbold'; font-size:16px; color:#313131; padding-bottom:8px;">Dear Member</h3>
                            <span style="color:#D70000; font-size:16px; font-weight:bold;">We are sorry! Your last transaction was cancelled.</span>
                        </div>
                    </div>
                </div><!-- /.container -->
            <?php
        }
     
        public function ipn(){
            //paypal return transaction details array
            $paypalInfo    = $this->input->post();
     
            $data['user_id'] = $paypalInfo['custom'];
            $data['product_id']    = $paypalInfo["item_number"];
            $data['txn_id']    = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["mc_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status']    = $paypalInfo["payment_status"];
     
            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            
            //check whether the payment is verified
            if(preg_match("/VERIFIED/i",$result)){
                //insert the transaction data into the database
                $this->product->insertTransaction($data);
            }
        }    
	}
?>