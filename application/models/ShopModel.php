<?php

	class ShopModel extends Ci_model{

		public function all_pages(){

			$this->db->where('show',1);
			$result=$this->db->get('pages');

			return $result->result_array();
		}
		public function singlePost($name){

			$result=$this->db->query("SELECT * FROM posts, users Where posts.post_added_by=users.u_id AND posts.name='".$name."'");
			return $result->result_array();
		}
		//new
		//insert transaction data
    	public function storeTransaction($data = array()){
        	
        	$insert = $this->db->insert('payments',$data);
        
        	return $insert?true:false;
    	}
    	
    	public function get_banner_model(){

			$result=$this->db->get("banners");
			
			return $result->result_array();
		}

		public function get_product(){
			
			$result=$this->db->query("SELECT * FROM products");
			
			return $result->result_array();
		}

		public function get_category(){

			$result=$this->db->get("categories");
			
			return $result->result_array();
		}
		
		public function metaTag($url){

			$this->db->where('url',$url);
			
			$result=$this->db->get('meta_tags');
			
			return $result->result_array();
		}

		public function page_data($url){

			$this->db->where('page_url',$url);
			
			$result=$this->db->get('pages');
			
			return $result->result_array();
		}

		public function single_product($pro_name){

			$result=$this->db->query("SELECT * FROM products WHERE pro_link='".$pro_name."'");
			
			return $result->result_array();
		}
		

		public function get_product_prices($name){
			
			$result=$this->db->query(
				"SELECT p.pro_id, v.v_id, p_pri.p_qun, p_pri.p_price, p_pri.pp_id
					FROM products AS p, variations AS v, product_price AS p_pri
 					WHERE p.pro_id=v.pro_id AND v.v_id=p_pri.v_id AND p_pri.pr_status=1 AND p.pro_link='".$name."';
				"				
			);
			return $result->result_array();
		}

		public function single_product_prices($id){
			
			/*$result=$this->db->query(
				"SELECT *
				 FROM products, prices 
				 Where  products.pro_id=prices.pro_id AND prices.pri_id='".$id."'
				"				
			);*/

			$result=$this->db->query(
				"SELECT P.pro_name, P.pro_image,  P.pro_is_brand, PP.p_qun, PP.p_price , PP.pp_id, V.v_id
				 FROM products AS P, variations AS V, product_price AS PP
			 	 WHERE P.pro_id=V.pro_id AND V.v_id=PP.v_id AND PP.pp_id='".$id."'
				"
			);
			return $result->result_array();
		}

		public function single_product_brand_prices($id){
			
			/*$result=$this->db->query(
				"SELECT *
				 FROM products, prices 
				 Where  products.pro_id=prices.pro_id AND prices.pri_id='".$id."'
				"				
			);*/

			$result=$this->db->query(
				"SELECT P.pro_name, B.b_name, packs.pak_name, P.pro_image,  P.pro_is_brand, PP.p_qun, PP.p_price , PP.pp_id, V.v_id
					FROM products AS P, variations AS V, product_price AS PP, brands AS B, packs
					WHERE P.pro_id=V.pro_id AND V.v_id=PP.v_id AND V.b_id=B.b_id AND V.pak_id=packs.pak_id  AND PP.pp_id='".$id."';
				"
			);
			return $result->result_array();
		}

		public function ajax_single_product_prices($id){
			
			/*$result=$this->db->query(
				"SELECT *
				 FROM products, prices 
				 Where  products.pro_id=prices.pro_id AND prices.pri_id='".$id."'
				"				
			);*/

			$result=$this->db->query(
				"SELECT P.pro_name, P.pro_image, PP.p_qun, PP.p_price , PP.pp_id, V.v_id, Pc.pak_status
				 FROM products AS P, variations AS V, product_price AS PP, packs AS Pc
			 	 WHERE P.pro_id=V.pro_id AND V.v_id=PP.v_id AND V.pak_id=Pc.pak_id AND V.v_id='".$id."'
				"
			);
			return $result->result_array();
		}

    	public function postList($limit,$offset){
			$q=$this->db->select()
			->from('posts, users')
			->where('posts.post_added_by=users.u_id')
			->limit($limit,$offset)
			->order_by('posts.id', 'DESC')
			->get();

			return $q->result_array();
		}
		public function get_post(){

			$result=$this->db->get('posts');
			//$result=$this->db->query("SELECT * FROM posts, users WHERE posts.post_added_by=users.u_id ORDER BY  posts.id DESC");
			
			return $result->num_rows();	
		}
        public function posts(){

			$result=$this->db->query("SELECT * FROM posts, users WHERE posts.post_added_by=users.u_id ORDER BY  posts.id DESC");
			
			return $result->result_array();
		}
		
		public function get_product_detail($id){

			$this->db->where("pro_id",$id);

			$result=$this->db->get("products");
			//$result=$this->db->query("SELECT * FROM products WHERE p_id='".$id."'");
			
			return $result->result_array();
		}

		public function pro_brand($pro_id){

			$result=$this->db->query("
				SELECT b.b_id, b.b_name, b.b_image FROM products AS p, variations AS v, brands AS b
				WHERE p.pro_id=v.pro_id AND v.b_id=b.b_id AND p.pro_id='".$pro_id."'
			");

			return $result->result_array();

		}

		public function pro_pack($pro_id){

			$result=$this->db->query("
				SELECT pk.pak_id, pk.pak_name, pk.pak_status FROM products AS p, variations AS v, packs AS pk
				WHERE p.pro_id=v.pro_id AND v.pak_id=pk.pak_id AND p.pro_id='".$pro_id."'
			");

			return $result->result_array();

		}

		public function get_country(){

			$this->db->where('status','1');

			$result=$this->db->get("countries");
			
			//$result=$this->db->query("SELECT * FROM countries");

			return $result->result_array();
		}

		public function products_with_category($cat_name){

			$result=$this->db->query("SELECT *
				FROM  products p
				RIGHT JOIN categories c
				ON c.cat_id = p.cat_id
				WHERE c.cat_name='".$cat_name."'");
			
			return $result->result_array();
		}

		/*public function states($country_id){

			$result=$this->db->query("SELECT * FROM states WHERE c_id='".$country_id."'");

			return $result->result_array();	
		}*/

		public function addCustomer($data){
			$data=array(

				'cus_fname'  		=>$data['cus_fname'],
				'cus_lname'  		=>$data['cus_lname'],
				'cus_pass'  		=>$data['cus_fname'],
				'cus_email'  		=>$data['cus_email'],
				'cus_phone'  		=>$data['cus_number'],
				'cus_add'  			=>$data['cus_add'],
				'cus_city'  		=>$data['cus_city'],
				'cus_state'  		=>$data['cus_state'],
				'cus_country'  		=>$data['cus_country'],
				'cus_zipcode'  		=>$data['cus_zipcode'],
				'cus_create_on'  	=>date('Y-m-d H:i:s',time()),

			);

			$this->db->select('*');
			
			$this->db->where('cus_email',$data['cus_email']);
			
			$result=$this->db->get('customers');

			$result=$result->result_array(); 
			
			if(count($result)>0){

				//return $result->cus_id;
				$email 	 =$data['cus_email'];
				$p_data  =$data['cus_create_on'];
				unset($data['cus_email'], $data['cus_pass'], $data['cus_create_on']);

				$data['cus_update_on'] = date('Y-m-d H:i:s',time());

				$this->db->where('cus_email', $email);

				$flag=$this->db->update('customers',$data);
				
				if($flag)
				{
					$this->db->select('*');
			
					$this->db->where('cus_email', $email);
					
					$result=$this->db->get('customers');

					return	$result->result_array(); 
				}
			}
			else
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
		        $mail->setFrom('no-reply@mysleepingtabs.com', 'Mysleepingtabs Order');
		        $mail->addReplyTo('no-reply@mysleepingtabs.com', 'Mysleepingtabs Order');
		        
		        // Add a recipient
		        $mail->addAddress($data['cus_email']);
				
		        // Email subject
		        $mail->Subject = 'MST Password';
		        // Set email format to HTML
		        $mail->isHTML(true);
		        
		        // Email body content
		        $mailContent = "Yous MST login pass word ".$data['cus_fname'];
				$mail->Body = $mailContent;
					        
		        // Send email
		        if($mail->send())
		        {
		            $this->db->insert("customers",$data);
			
				    $id=$this->db->insert_id();
				
			    	$this->db->where('cus_id',$id);
    
				    $result=$this->db->get('customers');
					
				    return $result->result_array();
		            
		        }
				
			}
		}
		public function add_order($data){

			$this->db->insert("orders",$data);
			
			return $this->db->insert_id();
		}
		
		public function order_detail($od_id, $pro_id, $pro_pri, $qty){

			$data=array(

				'od_id'					=>$od_id,
				'pro_id'				=>$pro_id,
				'pro_price'				=>$pro_pri,
				'qty'					=>$qty,
				"odt_create_on"		    =>time(),
			);
			$result=$this->db->insert("order_detail",$data);
			
			return $result;
		}
		
		/*public function addCardInfo($data){

			$data =array(

				"order_id"						=>$data['result'],
				"cardHolderName"				=>$data['cardname'],
				"cardName"						=>$data['cardnumber'],
				"cardNo"						=>$data['chkoutprocess'],
				"cvvNumber"						=>$data['cvv'],
				"cardExpiryMonth"				=>$data['cardexpmonth'],
				"cardExpiryYear"				=>$data['cardexpyear'],
			);
			$result=$this->db->insert("card_info",$data);
			
			return $result;
		}*/

		public function order_view($u_id, $order_id){

			$result=$this->db->query("SELECT * FROM orders, order_detail, products, countries where orders.order_u_id='".$u_id."' AND orders.order_id='".$order_id."' AND order_detail.order_p_id=products.p_id AND orders.order_country=countries.co_id AND orders.order_id=order_detail.order_id");
			
			return $result->result_array();
		}

		public function order_view_2($u_id){

			$result=$this->db->query("SELECT * FROM orders, order_detail, products, countries where orders.order_u_id='".$u_id."' AND orders.order_id=order_detail.order_id AND order_detail.order_p_id=products.p_id AND orders.order_country=countries.co_id AND orders.order_id=order_detail.order_id");
			
			return $result->result_array();
		}

		public function get_customer_order($customer_id){

			$result=$this->db->query("SELECT * FROM orders, order_detail, products WHERE order_detail.order_p_id=products.p_id AND orders.order_u_id='".$customer_id."' AND orders.order_id=order_detail.order_id");
			
			return $result->result_array();
		}

		public function orderConfirm($id){

			
			$result=$this->db->query("SELECT * FROM orders, customers WHERE orders.od_customer_id=customers.cus_id AND orders.od_link ='".$id."'");
			
			return $result->result_array();
		}

		public function getPack($pro_id, $b_id){

			$result=$this->db->query("
				SELECT p.pro_id,p.pro_name, b.b_id, b.b_name, pc.pak_id, pc.pak_name, v.v_id 
				FROM products AS p, variations AS v, brands AS b, packs AS pc
				WHERE p.pro_id=v.pro_id 
				AND v.b_id=b.b_id 
				AND v.pak_id=pc.pak_id 
				AND p.pro_id='".$pro_id."' 
				AND b.b_id='".$b_id."'
			");

			return $result->result_array();
		}

		public function getPrice($v_id){
			
			$result=$this->db->query("SELECT * FROM product_price WHERE v_id='".$v_id."'");
			
			return $result->result_array();
		} 

		public function od_info($order_id){

			$result=$this->db->query(
				"SELECT */*orders.od_id, products.pro_full_name, product_price.p_qun, product_price.p_price, order_detail.qty*/  
				FROM orders, customers, order_detail, products, variations, product_price
				WHERE orders.od_id=order_detail.od_id
				AND orders.od_customer_id=customers.cus_id
				AND order_detail.pro_id=product_price.pp_id 
				AND product_price.v_id=variations.v_id 
				AND variations.pro_id=products.pro_id 
				AND orders.od_id='".$order_id."'"
			);
			
			return $result->result_array();
		}

		public function brand($id){

			$result=$this->db->query("SELECT b_name FROM brands WHERE b_id='".$id."'");
			
			return $result->result_array();
		} 

		public function pack($id){

			$this->db->where('pak_id',$id);

			$result=$this->db->get('packs');
			
			return $result->result_array();
		} 
		
		public function store_data(){

			$result=$this->db->get('products');
			
			return $result->result_array();
		}
		
		public function getBanks(){
			
			$this->db->where('status',1);
			
			$result=$this->db->get('banks');
			
			return $result->result_array();
        }
        public function getCurrecny($currency)
        {

        	$this->db->where('conversion', $currency);
        	
        	$result = $this->db->get('currency');
        	
        	return $result->result_array();
        }
        
        public function proDis($id){

        	$this->db->where('iso', $id);
        	
        	$result = $this->db->get('discounts');
        	
        	return $result->row();  //result_array();
        }
        public function get_reviews(){
            
            $query=$this->db->select()
				->from('reviews')
				->where('status=1')
				
				->order_by('rev_id', 'DESC')
				->get();
        	return $query->result_array();
        }
        
        public function get_review_reply(){

        	$result=$this->db->query("SELECT  review_reply.rev_id, review_reply.reply, review_reply.rep_create_on 
        		FROM review_reply, reviews
				WHERE reviews.`rev_id`=review_reply.rev_id");

        	return $result->result_array();
        }
        
        public function add_review($data){

        	$result=$this->db->insert('reviews',$data);
        	
        	return ($result ? true:false);
        }
         public function add_abadan_card($sess_id, $pp_id, $qty){

        	function getUserIpAddr(){
			    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			        //ip from share internet
			        $ip = $_SERVER['HTTP_CLIENT_IP'];
			    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			        //ip pass from proxy
			        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			    }else{
			        $ip = $_SERVER['REMOTE_ADDR'];
			    }
			    return $ip;
			}
                
            $ip =getUserIpAddr();
        	
        	$data=array(

        		'sess_id'			=>$sess_id,
        		'ip'				=>$ip,
        		'pro_price_id'		=>$pp_id,
        		'qty'				=>$qty,
        		'create_on'			=>date('d-M-Y h:i A',time()),
        	);

        	$this->db->insert('abandon_cart',$data);
        }

        public function update_abd_card($sess_id,$email,$name,$number){

        	$this->db->set('full_name', $name);

        	$this->db->set('email', $email);

        	$this->db->set('phone_number',$number);

        	$this->db->where('sess_id',$sess_id);

        	$query= $this->db->update('abandon_cart');
        	
        	return ($query ? true:false);
        }

        public function dtl_abd_card($id){

        	$this->db->where('sess_id',$id);

        	$result=$this->db->delete('abandon_cart');
        	
        	return ($result ? true:false);
        }
	}
?>