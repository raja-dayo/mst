<?php

	class AdminModel extends Ci_model{

		public function add_category_model($title){

			$data=array(

				"cat_name"				=>$title,
				//"c_de"			=>$des,
				"create_on"			=>time(),
				"create_by"		=>$_SESSION['data']['admin']['u_id'],
			);

			$result=$this->db->insert("categories",$data);
			
			return $result;
		}

		public function category_list_model(){

			$result=$this->db->get("categories");
			
			return $result->result_array();
		}

		public function brand_list_model(){

			$result=$this->db->get("brands");
			
			return $result->result_array();
		}

		public function pack_list_model(){

			$result=$this->db->get("packs");
			
			return $result->result_array();
		}

		
		public function dltCategory($id){
			
			$this->db->where('cat_id',$id);
			$result=$this->db->delete('categories');
			
			
			return $result;
		}
		public function add_product_model($title, $full_name, $pro_link, $category, $img, $short_des, $long_des, $brand)
		{                                 
			$data=array(
				"pro_name"						=>$title,
				"pro_full_name"					=>$full_name,
				"pro_link"						=>$pro_link,
				"pro_image"						=>$img,			
				"cat_id"						=>$category,
				"pro_short_des"					=>$short_des,
				"pro_long_des"					=>$long_des,
				//"p_keywords"					=>$meta_tag,
				'pro_create_on'					=>time(),
				'pro_create_by'					=>$_SESSION['data']['admin']['roll_id'],
				'pro_is_brand'					=>$brand,
			);

			$this->db->insert("products",$data);
			
			return $this->db->insert_id();
		}


		public function add_pro_variation($pro_id, $bra_id, $pak_id){

			$data=array(

				'pro_id'   => $pro_id,
				'b_id'   => $bra_id,
				'pak_id'   => $pak_id,
			);

			$this->db->insert("variations",$data);
			
			return $this->db->insert_id();
		}

		public function addPri($v_id, $qun, $pri){

			$data=array(

				"v_id"		=>$v_id,
				"p_qun"		=>$qun,
				"p_price"	=>$pri,
			);

			$result=$this->db->insert("product_price",$data);
			
			return $result;
		}
		public function addPriceModel($data){

			$result=$this->db->insert('prices',$data);
			
			return $result;
		}
		public function add_banner_model($title){

			$data=array(
				"title"	=>$title,
			);

			$result=$this->db->insert("banners",$data);
			
			return $result;
		}

		public function add_meta_tag($data){

			$data=array(

				"url"				=>$data['url'],
				"title"				=>$data['title'],
				"keywords"			=>$data['keywords'],
				"description"		=>$data['description'],
			);

			$result=$this->db->insert("meta_tags",$data);

			return $result;
		}

		public function get_banner_model(){

			$result=$this->db->get("banners");
			
			return $result->result_array();
		}
		public function product_list_model(){
			
			$result=$this->db->query("SELECT * FROM products,categories WHERE products.cat_id=categories.cat_id");
			
			return $result->result_array();
		}

		public function edit_product_model($p_id){

			$this->db->where("pro_id",$p_id);

			$result=$this->db->get("products");
			
			return $result->result_array();
		}

		public function get_product_price(){
			
			//$this->db->where("pro_id",$pro_id);

			$result=$this->db->query("SELECT * FROM variations, product_price 
				WHERE variations.v_id=product_price.v_id");
			
			return $result->result_array();
		}

		public function update_product_model($title, $category, $img, $short_des, $long_des, $p_id){

			$data=array(
				"pro_name"						=>$title,
				"pro_image"						=>$img,
				//"p_price"						=>$price,
				"cat_id"						=>$category,
				"pro_short_des"					=>$short_des,
				"pro_long_des"					=>$long_des,
				//"p_meta_title"					=>$meta_tag,
				//"p_meta_description"			=>$meta_des,
				//"p_quantity"					=>$quantity,
				"pro_update_on"					=>time(),
				//"pro_created_by"					=>$_SESSION['data']['admin']['u_id'],
			);

			$this->db->where("pro_id",$p_id);

			$result=$this->db->update("products",$data);
			
			return $result;
		}

		public function add_post_model($title, $des, $img, $category){

			$data=array(

				
				"cat_id"					=>$category,
				"name"						=>$title,
				"image"						=>$img,
				//"short_des"					=>$excerpt,
				"long_des"					=>$des,
				//"tag"						=>$tag,
				"create_on"					=>time(),
				"post_added_by"				=>$_SESSION['data']['admin']['u_id'],
			);

			$result=$this->db->insert("posts",$data);

			return $result;
		}

		public function updatePost($id, $data){

			$this->db->where('id',$id);

			$result=$this->db->update('posts',$data);
			
			return ($result ? true:false);
		}
		public function get_posts(){

			$result=$this->db->query("SELECT * FROM posts, users WHERE posts.post_added_by=users.u_id");
			
			return $result->result_array();
		}

		public function singlePost($id){

			$result=$this->db->query("SELECT * FROM posts, users Where posts.post_added_by=users.u_id AND posts.id='".$id."'");
			return $result->result_array();
		}

		public function newOrderModel(){

			$result=$this->db->query("SELECT * FROM orders, customers Where orders.od_customer_id=customers.cus_id Order By orders.od_id DESC");
			
			return $result->result_array();
		}

		public function order_view($order_id){

			$result=$this->db->query(
				"SELECT *  
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

		public function custoemsModel(){

			//$this->db->where('u_roll_id', 2);
			
			$result=$this->db->get('customers');
		
			return $result->result_array();
		}

		public function pageContent($page){

			$this->db->where('page_name',$page);
			
			$result=$this->db->get('meta_data');
			
			return $result->result_array();
		} 

		public function updateContent($id, $data){

			//$result=$this->db->query("UPDATE meta_data
			//	SET page_description = '".$data."'
			//	WHERE id='".$id."'");
			$this->db->set('page_description', $data);
			$this->db->where('id', $id);
			$result=$this->db->update('meta_data');
			/*$data=array(

				'page_description' =>$data,
			);
			$this->db->update('meta_data',$data);
			$result=$this->db->where('id',$id);*/
			return $result;
		}

		public function singlePageData($id)
		{
			$result=$this->db->query("SELECT * FROM pages WHERE p_id='".$id."' ");
			
			return $result->result_array();
		}

		public function updateProductPrice($pp_id, $qun, $pri){

			$data=array(
				"p_qun"			=>$qun,
				"p_price"		=>$pri,
			);

			$this->db->where('pp_id',$pp_id);

			$result=$this->db->update('product_price',$data);
			
			return $result;
		}
		public function addBankModel($data){

			$result=$this->db->insert('banks',$data);
			
			return $result;
		}
		public function getBanks(){

			$result=$this->db->get('banks');
			
			return $result->result_array();
		}

		public function updateBankStatus($bank_id, $status){

			$this->db->set('status', $status);
			$this->db->where('bank_id', $bank_id);
			$result= $this->db->update('banks');

			return $result;
		}
		
		public function deleteBankModel($id)
		{
		    $this->db->where('bank_id',$id);
		    
		    $result=$this->db->delete('banks');
		    
		    return $result;
		    
		}
		public function updateProductStatus($pro_id, $status){

			$this->db->set('pro_status', $status);
			$this->db->where('pro_id', $pro_id);
			$result= $this->db->update('products');

			return $result;
		}
		public function get_brand_pack($pp_id){
			
			$result=$this->db->query(
				"SELECT B.b_name, packs.pak_name
				 FROM variations AS V, brands AS B, packs, product_price AS PP
				 WHERE V.v_id=PP.v_id  AND V.b_id=B.b_id AND V.pak_id=packs.pak_id  AND PP.pp_id='".$pp_id."';
				"
			);
			return $result->result_array();
		}

		public function export_data($to, $from)
		{
			$result=$this->db->query("SELECT orders.od_id, orders.od_s_country, customers.cus_fname, customers.cus_lname, customers.cus_email, products.pro_full_name, customers.cus_phone, orders.od_total, orders.od_payment_type, orders.od_s_country, orders.od_create_on, product_price.p_qun,
				variations.b_id, variations.pak_id, order_detail.pro_id, products.pro_is_brand, variations.v_id

				FROM orders , order_detail , product_price ,  variations, products , customers 

				WHERE orders.od_id=order_detail.od_id AND order_detail.pro_id=product_price.pp_id AND product_price.v_id=variations.v_id AND variations.pro_id=products.pro_id AND orders.od_customer_id = customers.cus_id

				AND orders.od_create_on BETWEEN '".$from."' AND '".$to."';
			");

			return $result->result_array();
		}
		
		public function getMetaTagsList()
		{
		    $result=$this->db->get('meta_tags');
		    
		    return $result->result_array();    
		}
		
		public function mtag($id)
		{
		    $this->db->where('m_tag_id',$id);
		    
		    $result=$this->db->get('meta_tags');
		    
		    return $result->result_array();    
		}
		
		public function updateMetaTag($tag_id, $url, $title, $keywords, $description){

			$data=array(
				"url"			    =>$url,
				"title"		        =>$title,
				"keywords"			=>$keywords,
				"description"		=>$description,
			);

			$this->db->where('m_tag_id',$tag_id);

			$result=$this->db->update('meta_tags',$data);
			
			return $result;
		}
		public function updateOrdertStatus($od_id, $status){

			$this->db->set('od_status', $status);

			$this->db->set('update_on', date('d/m/Y h:i:s A',time()));
			
			$this->db->where('od_id', $od_id);
			
			$result= $this->db->update('orders');

			return $result;
		}
		
		public function get_currency(){
			
			$result=$this->db->get('currency');
			
			return $result->result_array();
		}
		
		public function dltMtag($id){
		    
		    $this->db->where('m_tag_id',$id);
		    
		    $result = $this->db->delete('meta_tags');
		
		    return $result;
		}
		
		public function getReviews(){

			$query=$this->db->select()
				->from('reviews')
				->order_by('rev_id','DESC')
				->get();
			
			return $query->result();
		}

		public function updateReviewStatus($rev_id, $status){

			$this->db->set('status', $status);

			//$this->db->set('update_on', date('d/m/Y h:i:s A',time()));
			
			$this->db->where('rev_id', $rev_id);
			
			$result= $this->db->update('reviews');

			return ($result? true:false);
		}
		public function add_reply($data){
			
			$result=$this->db->insert('review_reply',$data);
        	
        	return ($result ? true:false);
        }
		
		public function get_abd_cart(){

			$query=$this->db->query("SELECT abandon_cart.ac_id, abandon_cart.full_name, abandon_cart.ip, abandon_cart.email, abandon_cart.phone_number, products.pro_full_name, product_price.p_qun, abandon_cart.create_on
				FROM abandon_cart, product_price, variations, products
				WHERE abandon_cart.pro_price_id=product_price.pp_id 
				AND product_price.v_id=variations.v_id 
				AND variations.pro_id=products.pro_id Order By abandon_cart.ac_id DESC"
			);

			return $query->result();
		}
		public function abd_dlt_item($adb_id){

			$this->db->where('ac_id',$adb_id);

			$result=$this->db->delete('abandon_cart');
			
			return ($result ? true:false);
		}

		/*public function deleteProPrice($pp_id){

			$this->db->set('pr_status', 0);

			$this->db->Where('pp_id',$pp_id);

			$result=$this->db->update('product_price');
			
			return ($result ? true:false);
		}*/

		public function updateProductPriceStatus($pp_id, $status){

			$this->db->set('pr_status', $status);
			
			$this->db->where('pp_id', $pp_id);
			
			$result= $this->db->update('product_price');

			return ($result ? true:false);
		}


		public function updatePack($pak_id, $status){

			$this->db->set('pak_status', $status);

			$this->db->where('pak_id', $pak_id);
			
			$result= $this->db->update('packs');

			return ($result? true:false);
		}

		public function customerFilter($search){
			
			if($search['key_4']!="")
			{
				$this->db->WHERE($search['cons_1'],$search['key_1']);
				$this->db->WHERE($search['cons_2'],$search['key_2']);
				$this->db->WHERE($search['cons_3'],$search['key_3']);
				$this->db->WHERE($search['cons_4'],$search['key_4']);
				$result=$this->db->get('customers');
			}
			elseif ($search['key_3']!="") 
			{
				$this->db->WHERE($search['cons_1'],$search['key_1']);
				$this->db->WHERE($search['cons_2'],$search['key_2']);
				$this->db->WHERE($search['cons_3'],$search['key_3']);
				$result=$this->db->get('customers');
			}
			elseif ($search['key_2']!="")
			{
				$this->db->WHERE($search['cons_1'],$search['key_1']);
				$this->db->WHERE($search['cons_2'],$search['key_2']);

				$result=$this->db->get('customers');
				
			}
			else
			{
				$this->db->WHERE($search['cons_1'],$search['key_1']);

				$result=$this->db->get('customers');
			}
			 

			return $result->result_array();
		}

		public function cus_orders($cus_id){

			$result=$this->db->query("SELECT * FROM orders, customers Where orders.od_customer_id=customers.cus_id AND customers.cus_id='".$cus_id."' Order By orders.od_id DESC");
			
			return $result->result_array();
		}

		public function cusReview($cus_id){

			$this->db->where('cus_id',$cus_id);

			$result=$this->db->get('reviews');
			
			return $result->result_array();
		}

		public function cusPassResest($data){

			$this->db->where('cus_id',$data['cus_id']);

			$this->db->set('cus_pass',$data['pass']);

			$result=$this->db->update('customers');
			
			return ($result ? true:false);
		}

		public function update_user($data){

			$this->db->where('cus_id',$data['cus_id']);

			$result=$this->db->update('customers',$data);
			
			return ($result ? true: false);
		}

		public function banCus($id, $msg){

			$this->db->set('cus_id', $id);

			$this->db->set('message', $msg);
			
			$this->db->set('ban_on', date('Y-m-d H:i:s', time()));

			$this->db->insert('banned');

			$this->db->where('cus_id',$id);

			$this->db->set('cus_status', '1');

			$result=$this->db->update('customers');
			
			return ($result ? true:false);
		}

		public function unBanCus($id){

			$this->db->where('cus_id',$id);
			
			$this->db->set('ban_update', date('Y-m-d H:i:s', time()));

			$this->db->update('banned');
			
			$this->db->where('cus_id',$id);

			$this->db->set('cus_status', '0');

			$this->db->set('message', '');

			$result=$this->db->update('customers');
		}

		function cusBanHistory($cus_id){

			$this->db->where('cus_id',$cus_id);

			$result=$this->db->get('banned');
			
			return $result->result_array();
		}
	}

?>