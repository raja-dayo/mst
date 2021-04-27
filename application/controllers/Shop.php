<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	
	error_reporting(0);
	
	class Shop Extends Ci_controller
	{
		public function __construct(){
		
			parent::__construct();

			$this->load->library('cart');

			$this->load->model("ShopModel",'Shop');

			$this->load->model("LoginModel",'Login');

			$this->load->helper('form');

			$this->load->helper('string');

			$data=$this->Shop->metaTag(basename($_SERVER['REQUEST_URI']));

			$page_data=$this->Shop->page_data(basename($_SERVER['REQUEST_URI']));
			
			$this->session->set_flashdata('metatag', $data);

			$this->session->set_flashdata('page_data', $page_data);

			$data['products']=$this->Shop->get_product();

			$data['categories']=$this->Shop->get_category();

			$data['posts']=$this->Shop->posts();

			$data['pages']=$this->Shop->all_pages();

			for ($i=0; $i <count($data['categories']) ; $i++) { 
				
				foreach ($data['products'] as $key => $pro) {
					
					if($data['categories'][$i]['cat_id']==$pro['cat_id'])
					{
						$data['categories'][$i]['products'][$key]['pro_id']=$pro['pro_id'];
						$data['categories'][$i]['products'][$key]['pro_name']=$pro['pro_name'];
						$data['categories'][$i]['products'][$key]['pro_d_link']=$pro['pro_main'];
						$data['categories'][$i]['products'][$key]['pro_full_name']=$pro['pro_full_name'];
						$data['categories'][$i]['products'][$key]['pro_is_brand']=$pro['pro_is_brand'];
						$data['categories'][$i]['products'][$key]['pro_link']=$pro['pro_link'];

					}  	
				}  
			}

			$_SESSION['data']['links']=$data['categories'];
			$_SESSION['data']['posts']=$data['posts'];
			$_SESSION['data']['pages']=$data['pages'];
		}


		public function index()
		{
			 

			//echo "<pre>";
			//print_r($_SESSION['data']['pages']);

			
			//((isset($_SESSION['bit_discount']) ? unset($_SESSION['bit_discount']) : unset($_SESSION['bank_discount']));
			$this->load->view("page/index",$data);
		}

		/*public function page($url){

			echo $url;
			//$this->load->view('page/page');
		}*/

		public function buy_valium_online(){

			$this->load->view('page/buy-valium-online');
		}

		public function product_details($pro_link){
			

			//echo $pro_link;
			//die;
			
			if(!isset($_SESSION['sign'])){

				$_SESSION['sign']= '£';
				$_SESSION['rate']=  1;
			}
			
            $data['product']=$this->Shop->single_product($pro_link);
			
			$data['prices'] =$this->Shop->get_product_prices($pro_link);
			
			if(count($data['product'])==0)
            {
                $this->load->view('errors/html/error_404');
                
            }
            else
            {
                if($data['product'][0]['pro_is_brand']==1)
                {

				    $data['brands']=$this->Shop->pro_brand($data['product'][0]['pro_id']);
				
				    $data['packs']=$this->Shop->pro_pack($data['product'][0]['pro_id']);
				
				    $this->load->view("page/product",$data);
			    }
			    else
			    {
				    $this->load->view("page/product",$data);	
			    }        
            }
		}
		
		public function login(){

			$this->load->view('page/login');
		}

		public function forgot_password(){

			$this->load->view('page/forgotPass');
		}

		public function password_reset(){

			
			$data['result']=$this->Login->check_email($_REQUEST['email']);

			
			//echo "<pre>";
			//print_r($result);
			//echo $result[0]['cus_fname'];
			
			//echo "sb sai aa <br> ok aa";
			//die;
			if(count($data['result'])==1){

				$code= random_string('alnum',8);
			
				$_SESSION['otp'] = $code;
				
				$_SESSION['u_email'] = $_REQUEST['email'];

				$this->session->mark_as_temp('u_email', 700);

				$this->session->mark_as_temp('otp', 700);

				$this->load->library('phpmailer_lib');

				$mail = $this->phpmailer_lib->load();
      
       			$mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ));
				// SMTP configuration
		       $mail->IsSMTP(); // enable SMTP
		       $mail->Host  = 'ssl://smtp.gmail.com'; // enable SMTP
		        //$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
		        $mail->SMTPAuth = true;  // authentication enabled
		        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		        $mail->SMTPAutoTLS = false;
		        $mail->Port = 465;
		        $mail->Username = 'no-reply@mysleepingtabs.com';
		        $mail->Password = 'IIwrtgaf786!@';
		        $mail->setFrom('no-reply@mysleepingtabs.com', 'no-reply');
	        	
	        	// Add a recipient
		        $mail->addAddress($data['result'][0]['cus_email']);
					        
		        // Add cc or bcc 
		       
		        
		        // Email subject
		        $mail->Subject = 'MySleepingTabs account password reset';
		        
		        // Set email format to HTML
		        $mail->isHTML(true);
		        
		        // Email body content
		        $mailContent = $this->load->view('page/recoveryPasswordTemplate', $data, True);
		        
		        $mail->Body = $mailContent;
					        
		        // Send email
		        if($mail->send()){

		        	$this->session->set_flashdata('class', 'success');
		        	$this->session->set_flashdata('msg', 'OTP send check your email inbox or spam');
		    		$this->load->view('page/pass_reset');
			    }
				
			}
			else
			{
				$this->session->set_flashdata('msg',"Email not matched");

				return redirect('forgot_password');		
			}
		}

		public function check_otp(){

			if($_REQUEST['otp']==$_SESSION['otp']){

				return redirect('create/new_password');
			}else
			{
				$this->session->set_flashdata('class', 'danger');
				$this->session->set_flashdata('msg', 'Invalid OPT');
				$this->load->view('page/pass_reset');
			}
		}
		
		public function create_password(){

			$this->load->view('page/create_password');
		}

		public function update_pass(){

			//echo $_REQUEST['password'];

			$result=$this->Login->new_password_model($_SESSION['u_email'],$_REQUEST['password']);
			
			if($result){

				$this->session->set_flashdata('msg', 'Password updated');
				
				return redirect('login');
			}else{

				echo "Something wrong";
				//return redirect('login');
			}
		}
		public function about_us()
		{	
			$this->load->view("page/about");	
		}

		public function bitcoin(){
			$this->load->view('page/buy-bitcoin-with-credit-card');
		}
		
		public function delivery()
		{
			$this->load->view("page/delivery-information");	
		}
		
		public function faqs()
		{
			$this->load->view("page/faqs");	
		}

		public function blog(){
			
			//echo $this->Shop->get_post();
			//die;
			$this->load->library('pagination');
			
			$config=[
				//'base_url' 			=>base_url()."blog/",
				
				//'uri_segment'		=>3,
				'base_url'			=>	base_url('blog/'),
				'per_page'			=>	6,
				'total_rows'		=>	$this->Shop->get_post(),
				
				'full_tag_open'		=>"<ul class='pagination justify-content-center'>",
				'full_tag_close'	=>"</ul>",
				'first_link'		=>'First',
				
				'first_tag_open' 	=> "<li class='page-item'>",
				'first_tag_close' 	=> "</li>",
				
				'next_tag_open'		=>"<li class='page-item'>",
				'next_tag_close'	=>"</li>",
				
				'prev_tag_open'		=>"<li class='page-item'>",
				'prev_tag_close'	=>"</li>",
				
				'num_tag_open'		=>"<li class='page-item'>",
				'num_tag_close'		=>"</li>",
				
				'cur_tag_open'		=>"<li class='page-item active'><a class='page-link'>",
				'cur_tag_close'		=>"</a></li>",
				'last_link'			=>'Last',
				'last_tag_open' 	=> "<li class='page-item'>",
				'last_tag_close' 	=> "</li>",
				
				
				//'use_page_numbers' => true,
				
				//'first_link' 		=> false,
				//'last_link' 		=> false,

			];

			$this->pagination->initialize($config);
			
			$data['posts']=$this->Shop->postList($config['per_page'],$this->uri->segment(2));
			
			
			$this->load->view("page/blog",$data);
		}
		
		public function contact_us()
		{
			echo basename($_SERVER['REQUEST_URI']);
			//$this->load->view("page/contact");	
		}
		
		public function category($cat_name){

			$arr     	=explode("-",$cat_name);
            $cat_name 	=implode(" ",$arr);
			
			$data["products"]=$this->Shop->products_with_category($cat_name);
					
			$this->load->view("page/category",$data);
		}
		
		public function products(){
			
			$data['products']=$this->Shop->get_product();

			$this->load->view("page/shop",$data);
		}

		public function refund_policy(){
		
			$this->load->view("page/refund-policy");
		
		}

		public function terms_conditions()
		{
			$this->load->view("page/term_condition");	
		}

		public function privacy_policy(){

			$this->load->view("page/privacy-policy");	
		}
		
		public function blog_details($name){

			
			$name= explode('-', $name);
                                
            $name = implode(' ', $name);
			
			$data['post']=$this->Shop->singlePost($name);
			
			if($data['post'])
			{
				$this->load->view("page/blog-detail",$data);
			}
			else
			{
				echo "Page Not Found error 404";
			}
			
		}

		public function add_cart(){
            
            $product=$this->Shop->single_product_prices($_POST['pro']);

			if($product[0]['pro_is_brand']==0){

				$data=array(
					'id'			=>$product[0]['pp_id'],
					'qty'			=>1,
					'price'			=>number_format($product[0]['p_price']*$_SESSION['rate']),
					'name'			=>$product[0]['pro_name'],
					'image'			=>$product[0]['pro_image'],
					'num'			=>$product[0]['p_qun'],
				);
                
                if(!isset($_SESSION['ss_id']))
				{
                    $_SESSION['ss_id']	= rand();
				}
				
				$this->Shop->add_abadan_card($_SESSION['ss_id'], $product[0]['pp_id'], 1);
			
			    $this->cart->insert($data);
			    
			    return redirect('shop/cart');	
			}
			else
			{
				//echo "product have brand";
				$product=$this->Shop->single_product_brand_prices($_POST['pro']);
				
				$data=array(
					'id'			=>$product[0]['pp_id'],
					'qty'			=>1,
					'price'			=>number_format($product[0]['p_price']*$_SESSION['rate']),
					'name'			=>$product[0]['pro_name'],
					'image'			=>$product[0]['pro_image'],
					'num'			=>$product[0]['p_qun'],
					'brand'			=>$product[0]['b_name'],
					'pack'			=>$product[0]['pak_name'],
				);

				$this->cart->insert($data);
				return redirect('shop/cart');
			}
		}

		public function cart(){

			$data['cart_data']=$this->cart->contents();
			
			$this->load->view('page/cart',$data);
		}


		public function update(){

			$rowid= $_POST['id'];
			$qty=$_POST['qty'];

			if(!empty($rowid) && !empty($qty)){
				$data=array(
					'rowid'	=>$rowid,
					'qty'	=>$qty,
				);

				$flag=$this->cart->update($data);

				if($flag){

					return redirect('shop/cart');
				}
			}
		}

		public function delete_item(){

			$this->cart->remove($_GET['id']);
			
			return redirect('shop/cart');
		}

		public function checkout(){

			$cart=$this->cart->contents();
			
			if(count($cart)==0){
            	
            	return redirect('');   
            }
            
			$data['countries']=$this->Shop->get_country();
			
			$data['items']=$this->cart->contents();
			
			$this->load->view("page/checkout",$data);
			
		}
		
		public function login_process()
		{
		    $result=$this->Login->cus_login_new($_REQUEST['email']);
		
			if($result)
			{
				if($_REQUEST['password']==$result[0]['cus_pass'] && $_REQUEST['email']==$result[0]['cus_email'])
				{
						
					$_SESSION['data']['customer']=$result[0];

					return redirect('shop/checkout');		
				}
				else
				{
					echo "Invalid email or password";
				}	
			}
			else
			{
				echo "Invalid email";
			}
		}

		public function logout(){

			session_destroy();

			return redirect();
		}

		public function getPack(){

			$packs=$this->Shop->getPack($_POST['pro_id'], $_POST['brand']);
			
            if(isset($packs[0]['pak_id'])){
                ?>
                    <li>
                        <label>
                            <input type="radio"  id="a" class="pack" name="packs" value="<?php echo $packs[0][v_id]?>">
                            <span><?php echo strtoupper($packs[0]['pak_name']);?></span>
                        </label>
                    </li>
                <?php
            }
            if(isset($packs[1]['pak_id'])){
                ?>
                    <li>
                        <label>
                            <input type="radio"  class="pack" name="packs" value="<?php echo $packs[1][v_id];?>">
                            <span><?php echo strtoupper($packs[1]['pak_name']);?></span>
                        </label>
                    </li>
                <?php
            }
                                                    
		}

		public function getPrice(){
			
			$data=$this->Shop->ajax_single_product_prices($_POST['v_id']);

            foreach ($data as $key => $pro) {
                ?>
                    <tr>
                    	<td><?php echo $pro['p_qun']?></td>
                    	<td><?php echo '£'.round($pro['p_price']/$pro['p_qun'],2)?></td>
                    	<!--<td><b><?php //echo '£'.$pro['p_price']?></b></td>-->
                    	<td><?php echo $_SESSION['sign'].number_format($pro['p_price']*$_SESSION['rate'])?></td>
                    	<td>
                        	
                        	<form method="POST" action="<?php echo base_url('shop/add_cart');?>">
                            	<button name="pro" class="sbt" <?php if ($pro['pak_status']=='0'){ ?> disabled <?php   } ?> value="<?php echo $pro['pp_id']?>"><?=($pro['pak_status']=='1') ? 'Buy Now' : 'Out Of Stock'?></button>
							</form>
                             
                    	</td>
                    </tr>
                <?php
            }
                                            
		}
        
        public function bitcoin_permotion(){

			/*if($_REQUEST['id']=='pm_bit')
			{
				$_SESSION['bit_discount']=$this->cart->total()*15/100;
				
				$dis = $this->cart->total()-($this->cart->total()*15/100);	
				
				$_SESSION['cart_contents']['cart_total']= $dis;
			}
			else
			{
				if(isset($_SESSION['bit_discount']))
				{
					
					$actual= $this->cart->total()+($_SESSION['bit_discount']);
					
					$_SESSION['cart_contents']['cart_total']=$actual;		
					
					unset($_SESSION['bit_discount']);
				}
				else
				{
					$this->cart->total()*1/1;	
				}
			}*/
			if($_REQUEST['id']=='pm_bit')
			{
				if(isset($_SESSION['bank_discount']))
				{
					$bank_dis = $_SESSION['bank_discount'];

					unset($_SESSION['bank_discount']);
				}
				else
				{
					$bank_dis = 0;
				}
				
				$_SESSION['bit_discount']=($this->cart->total()+$bank_dis)*20/100;
				
				$dis = ($this->cart->total()+$bank_dis-$_SESSION['bit_discount']);	
				
				$_SESSION['cart_contents']['cart_total']= $dis;
			}
			else
			{
				if(isset($_SESSION['bit_discount']))
				{
					$bit_dis = $_SESSION['bit_discount'];		
					
					unset($_SESSION['bit_discount']);
				}
				else
				{
					$bit_dis = 0;
				}

				$_SESSION['bank_discount']=($this->cart->total()+$bit_dis)*10/100;
				
				$dis = ($this->cart->total()+$bit_dis-$_SESSION['bank_discount']);   //-($this->cart->total()*10/100);	
				
				$_SESSION['cart_contents']['cart_total']= $dis;

				/*if(isset($_SESSION['all_discount']))
				{
					
					$actual= $this->cart->total()+($_SESSION['all_discount']);
					
					$_SESSION['cart_contents']['cart_total']=$actual;		
					
					unset($_SESSION['all_discount']);
				}
				else
				{
					$this->cart->total()*1/1;	
				}*/
			}
		}
		
		public function order_submit()
		{
            if($_REQUEST['b_fname']=='' || $_REQUEST['b_lname']=='' || $_REQUEST['b_add']=='' || $_REQUEST['b_city']=='' || $_REQUEST['b_state']=='' || $_REQUEST['b_country']=='' || $_REQUEST['b_zipcode']=='' || $_REQUEST['b_email']==''  || $_REQUEST['pm']=='' || $_REQUEST['b_number']==''){

				return redirect('checkout');
			}
			else if($this->cart->total()==0){
			    
			    $this->cart->destroy();
			    
			    return redirect('');
			} 
			
			$_REQUEST['b_info']['cus_fname']		=$_REQUEST['b_fname'];
			$_REQUEST['b_info']['cus_lname']		=$_REQUEST['b_lname'];
			$_REQUEST['b_info']['cus_email']		=$_REQUEST['b_email'];
			$_REQUEST['b_info']['cus_number']		=$_REQUEST['b_number'];
			$_REQUEST['b_info']['cus_country']		=$_REQUEST['b_country'];
			$_REQUEST['b_info']['cus_state']		=$_REQUEST['b_state'];
			$_REQUEST['b_info']['cus_city']			=$_REQUEST['b_city'];
			$_REQUEST['b_info']['cus_zipcode']		=$_REQUEST['b_zipcode'];
			$_REQUEST['b_info']['cus_add']			=$_REQUEST['b_add'];

			if($_REQUEST['s_fname']!='' && $_REQUEST['s_lname']!='' && $_REQUEST['s_email']!='' && $_REQUEST['s_add']!='')
			{
				$_REQUEST['shi_info']['cus_fname']		=$_REQUEST['s_fname'];
				$_REQUEST['shi_info']['cus_lname']		=$_REQUEST['s_lname'];
				$_REQUEST['shi_info']['cus_email']		=$_REQUEST['s_email'];
				$_REQUEST['shi_info']['cus_number']		=$_REQUEST['s_number'];
				$_REQUEST['shi_info']['cus_country']	=$_REQUEST['s_country'];
				$_REQUEST['shi_info']['cus_state']		=$_REQUEST['s_state'];
				$_REQUEST['shi_info']['cus_city']		=$_REQUEST['s_city'];
				$_REQUEST['shi_info']['cus_zipcode']	=$_REQUEST['s_zipcode'];
				$_REQUEST['shi_info']['cus_add']		=$_REQUEST['s_add'];

			}
				
			$_REQUEST['shi_info'] = (isset($_REQUEST['shi_info'])) ? $_REQUEST['shi_info'] : $_REQUEST['b_info'];

			$result=$this->Shop->addCustomer($_REQUEST['b_info']);
			
			$_SESSION['cus']['info']=$result[0];
			
			if($_SESSION['cus']['info']['cus_status']==1){

				unset($_SESSION['bit_discount']);
					
				unset($_SESSION['ss_id']);
				
				$this->cart->destroy();

				$this->session->set_flashdata('msg','acb');

				return redirect('');
			}
			else
			{
				$link=random_string('alnum', 64);
			
				$data=array(
					'od_customer_id' 		=>$_SESSION['cus']['info']['cus_id'],
					'od_payment_type'		=>$_REQUEST['pm'],
					'od_discount'			=> (isset($_SESSION['bit_discount']) ? $_SESSION['bit_discount']:'0'),
					'od_d_charge'			=>$this->cart->order_ship(),
					'od_total'				=>$this->cart->total(),
					'od_link'				=>$link,
					'od_s_fname'			=>$_REQUEST['shi_info']['cus_fname'],
					'od_s_lname'    		=>$_REQUEST['shi_info']['cus_lname'],
					'od_s_email'			=>$_REQUEST['shi_info']['cus_email'],
					'od_s_num'				=>$_REQUEST['shi_info']['cus_number'],
					'od_s_country'			=>$_REQUEST['shi_info']['cus_country'],
					'od_s_state'			=>$_REQUEST['shi_info']['cus_state'],
					'od_s_city'				=>$_REQUEST['shi_info']['cus_city'],
					'od_s_zipcode'			=>$_REQUEST['shi_info']['cus_zipcode'],
					'od_s_add'				=>$_REQUEST['shi_info']['cus_add'],

					//'od_create_on'			=>time(),
					'od_create_on'			=>date('d/m/Y',time()),
				);
				
				unset($_SESSION['bit_discount']);
				
				$od_id=$this->Shop->add_order($data);
				
				$items=$this->cart->contents();
				
				foreach ($items as $key => $item) {
					
					$this->Shop->order_detail($od_id, $item['id'], $item['price'], $item['qty']);
				}
	 			
				$this->cart->destroy();

				$data['orderInfo']=$this->Shop->od_info($od_id);
				foreach ($data['orderInfo'] as $key => $od) {
					
					if($od['b_id']!=0 && $od['pak_id']!=0){

						//echo 'Brand '.$od['b_id']."  pack".$od['pak_id'];
						//echo "<br>";	
						$brands=$this->Shop->brand($od['b_id']);
						
						$packs=$this->Shop->pack($od['pak_id']);
						
						foreach ($brands as $brand) {
							
							$data['orderInfo'][$key]['b_name']=$brand['b_name'];						
						}

						foreach ($packs as $pack) {
							
							$data['orderInfo'][$key]['pack_name']=$pack['pak_name'];						
						}
					} 
				}
	            $data['banks']=$this->Shop->getBanks();
				$this->load->library('phpmailer_lib');

				$mail = $this->phpmailer_lib->load();

				$mail->SMTPOptions = array(
	                'ssl' => array(
	                'verify_peer' => false,
	                'verify_peer_name' => false,
	                'allow_self_signed' => true
	                ));
				// SMTP configuration
		       $mail->IsSMTP(); // enable SMTP
		       $mail->Host  = 'ssl://smtp.gmail.com'; // enable SMTP
		        //$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
		        $mail->SMTPAuth = true;  // authentication enabled
		        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		        $mail->SMTPAutoTLS = false;
		        $mail->Port = 465;
		        $mail->Username = 'no-reply@mysleepingtabs.com';
		        $mail->Password = 'IIwrtgaf786!@';
		        $mail->setFrom('no-reply@mysleepingtabs.com', 'Mysleepingtabs Order');
		        $mail->addReplyTo($_REQUEST['b_info']['cus_email'], $_REQUEST['b_info']['cus_fname']." ".$_REQUEST['b_info']['cus_lname']);
		        
		        // Add a recipient
		        $mail->addAddress('no-reply@mysleepingtabs.com');
		        
		        // Add cc or bcc 
		       
		        
		        // Email subject
		        $mail->Subject = 'New Order'." ".$od_id;
		        
		        // Set email format to HTML
		        $mail->isHTML(true);
		        
		        // Email body content
		        $mailContent = $this->load->view('page/admin_email',$data, TRUE);
		        $mail->Body = $mailContent;

				if(!$mail->send()){

		        	return redirect('');
				}
				else
				{
		           	return redirect("shop/success/?id=$link");
				}
			}
		}

		public function success()
		{

			$id=$_GET['id'];
			
			$result['data']=$this->Shop->orderConfirm($id);
			
			$fname 		=$result['data'][0]['cus_fname'];
			
			$email 		=$result['data'][0]['cus_email'];
			
			$orderNo 	=$result['data'][0]['od_id'];
			
			$data['orderInfo']=$this->Shop->od_info($orderNo);
			
			foreach ($data['orderInfo'] as $key => $od) 
			{
				
				if($od['b_id']!=0 && $od['pak_id']!=0)
				{

					//echo 'Brand '.$od['b_id']."  pack".$od['pak_id'];
					//echo "<br>";	
					$brands=$this->Shop->brand($od['b_id']);
					$packs=$this->Shop->pack($od['pak_id']);
					
					foreach ($brands as $brand) {
						
						$data['orderInfo'][$key]['b_name']=$brand['b_name'];						
					}

					foreach ($packs as $pack) {
						
						$data['orderInfo'][$key]['pack_name']=$pack['pak_name'];						
					}
				} 
			}
			$data['banks']=$this->Shop->getBanks();
			if($result)
			{
				$this->load->library('phpmailer_lib');

				$mail = $this->phpmailer_lib->load();
      
				$mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        ));
					// SMTP configuration
			    $mail->IsSMTP(); // enable SMTP
		       	$mail->Host  = 'ssl://smtp.gmail.com'; // enable SMTP
		        //$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
		        $mail->SMTPAuth = true;  // authentication enabled
		        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		        $mail->SMTPAutoTLS = false;
		        $mail->Port = 465;
		        $mail->Username = 'no-reply@mysleepingtabs.com';
		        $mail->Password = 'IIwrtgaf786!@';
		        $mail->setFrom('no-reply@mysleepingtabs.com', 'Mysleepingtabs.com');
		        $mail->addReplyTo('no-reply@mysleepingtabs.com', 'Mysleepingtabs.com');
		        
		        // Add a recipient
		        $mail->addAddress($email);
					        
		        // Add cc or bcc 
		       
		        
		        // Email subject
		        $mail->Subject = '[Mysleepingtabs.com]: New Order # '.$orderNo;
		        
		        // Set email format to HTML
		        $mail->isHTML(true);
		        
		        // Email body content
		        $mailContent = $this->load->view('page/mst_email',$data, TRUE);
		        $mail->Body = $mailContent;
					        
				// Send email
		        if(!$mail->send()){

		        	return redirect('');

		        }
		        else
				{
					$data['order_info']=$this->Shop->od_info($orderNo);
	        		
	        		foreach ($data['orderInfo'] as $key => $od) 
	        		{
				
						if($od['b_id']!=0 && $od['pak_id']!=0)
						{

							//echo 'Brand '.$od['b_id']."  pack".$od['pak_id'];
							//echo "<br>";	
							$brands=$this->Shop->brand($od['b_id']);
							$packs=$this->Shop->pack($od['pak_id']);
							
							foreach ($brands as $brand) {
								
								$data['orderInfo'][$key]['b_name']=$brand['b_name'];						
							}

							foreach ($packs as $pack) {
								
								$data['orderInfo'][$key]['pack_name']=$pack['pak_name'];						
							}
						} 
					}
                    
                    $this->Shop->dtl_abd_card($_SESSION['ss_id']);
					
					unset($_SESSION['bit_discount']);
					
					unset($_SESSION['ss_id']);
	        		
	        		$this->load->view('page/success',$data);
	        	}
			
			}
			//$this->load->view('page/success',$data);
		}

		public function form_submit(){
            
            
			if($_POST){

				 $this->load->library('phpmailer_lib');

			$mail = $this->phpmailer_lib->load();
      
        $mail->SMTPOptions = array(
                                'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                                ));
        					// SMTP configuration
					       $mail->IsSMTP(); // enable SMTP
					       $mail->Host  = 'ssl://smtp.gmail.com'; // enable SMTP
					        //$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
					        $mail->SMTPAuth = true;  // authentication enabled
					        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
					        $mail->SMTPAutoTLS = false;
					        $mail->Port = 465;
					        $mail->Username = 'no-reply@mysleepingtabs.com';
					        $mail->Password = 'IIwrtgaf786!@';
					        $mail->setFrom('no-reply@mysleepingtabs.com', 'Contact Us MySleepingTabs');
					        $mail->addReplyTo('no-reply@mysleepingtabs.com', 'Contact Us MySleepingTabs');
					        
					        // Add a recipient
					        $mail->addAddress('no-reply@mysleepingtabs.com');
					        
					        // Add cc or bcc 
					       
					        
					        // Email subject
					        $mail->Subject = 'Contact Request Received';
					        
					        // Set email format to HTML
					        $mail->isHTML(true);
					        
					        // Email body content
					        $mailContent = "<label>Name : </label><span> $_POST[name]</span><br>
								        		<label>Email : </label><span> $_POST[email]</span><br>
								        		<label>Phone : </label><span> $_POST[number]</span><br>
								        		<label>Message : </label><span> $_POST[message]</span>
								        	";
					        $mail->Body = $mailContent;
					        
					        // Send email
					        if(!$mail->send()){
					            return redirect('');
					            
					        }else
					        {
					           
					           	$this->session->set_flashdata('msg',"Message sent successfully");
                            
                                $this->session->set_flashdata('class',"success");
                	
				                return redirect('contact-us');
					        }


			
			}
		}
		
		public function store(){
		    
		    $data['products']=$this->Shop->store_data();
			
		    $this->load->view('page/store',$data);
		}
		
		public function currency_converter()
		{

			if( strtolower($_REQUEST['code'])=='us')
			{
				if(!(isset($_SESSION['sign'])) || $_SESSION['sign'] != '$')
				{
					$_SESSION['sign']= '$';

					$cur='gbp_usd';
					
					$result=$this->Shop->getCurrecny($cur);
					
					$_SESSION['rate']=$result[0]['rate'];

					$data=$this->cart->contents();
					foreach ($data as $key => $cart) 
					{
						$new_data=array(

							'rowid'	=>$cart['rowid'],
							'price'	=>number_format($cart['price']*$result[0]['rate']),
						);

						$this->cart->update($new_data);
					}
				}
				$_SESSION['cart_contents']['order_ship']=50;
				$_SESSION['currency']='US Doller';
			}
			else if(strtolower($_REQUEST['code'])=='uk')
			{
				
				if(isset($_SESSION['sign']) && $_SESSION['sign'] != '£'){
					
					$_SESSION['sign']= '£';
				
					$cur='usd_gbp';
					
					$result=$this->Shop->getCurrecny($cur);
					
					$_SESSION['rate']= 1;
					
					$data=$this->cart->contents();
					
					foreach ($data as $key => $cart) 
					{
						$new_data=array(

							'rowid'	=>$cart['rowid'],
							'price'	=>number_format($cart['price']*$result[0]['rate']),
						);

						$this->cart->update($new_data);
					}
				}
				$_SESSION['cart_contents']['order_ship']=0;
				
				$_SESSION['currency']='UK Pound';	
			}
		}
		public function ship_type(){

			if($_REQUEST['abc']=='option2')
			{
				$_SESSION['cart_contents']['order_ship'] = 15;

				
			}
			/*else if($_REQUEST['abc']=='option3')
			{
				$_SESSION['cart_contents']['order_ship'] = 50;
			}*/
			else
			{
				$_SESSION['cart_contents']['order_ship'] = 0;	
				
			
			}
		}
		
		    
		public function review(){

			$result['data'] = $this->Shop->get_reviews();

			foreach ($result['data'] as $key => $review) {
					
				$reply =$this->Shop->get_review_reply($review['rev_id']);
			}

			foreach ($result['data'] as $key => $review) {
				
				foreach ($reply as $key_2 => $rep) {
					
					if ($review['rev_id'] == $rep['rev_id']) {
						
						$result['data'][$key]['rep'][]=$reply[$key_2];
					}
				}
			}
			/*echo "<pre>";
			print_r($reply);
			print_r($result);
			die;*/
			$this->load->view('page/reviews',$result);
		}
		
		public function write_review(){
		    
		    if(!isset($_SESSION['data']['customer'])){

				return redirect('login');
			}
			else
			{
				$this->load->view('page/write-review-page');	
			}
		}
		
		public function add_review(){

			if(!isset($_REQUEST['star-selector'])){

				$this->session->set_flashdata('msg', 'Please select rating star');

				$this->session->set_flashdata('class', 'danger');

				return redirect('write-review');
			}
			
			//echo "<pre>";
			//print_r($_REQUEST);
			//die;
			$data = array(

				"cus_id"		=> $_SESSION['data']['customer']['cus_id'],
				"nick_name"		=> $_REQUEST['nick_name'],
				"title"			=> $_REQUEST['title'],
				"review"		=> $_REQUEST['review'],
				"od_id"			=> $_REQUEST['od_id'],
				"rating"		=> $_REQUEST['star-selector'],
				"create_on"		=> date('d-M-Y',time()),

			);

			$result = $this->Shop->add_review($data);
			
			if($result){

				$this->session->set_flashdata('msg', 'Your review add successfully...!');
				
			    $this->session->set_flashdata('class',"success");
				
				return redirect('write-review/');
			}
			else
			{

				$this->session->set_flashdata('msg', 'Something wrong!');
				
			    $this->session->set_flashdata('class',"warning");
				
				return redirect('write-review/');
			}
		}
		public function update_db_card(){

			extract($_REQUEST);

			$result=$this->Shop->update_abd_card($_SESSION['ss_id'], $email, $full_name, $p_number);
			
			echo $result;
		}
	}
?>