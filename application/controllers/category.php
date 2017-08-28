<?php 
	if (!defined('BASEPATH')) exit ('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Category extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function getall($catId = 0){
			$data = array(	'data' => array(	array('pro_id' => 1, 
											'pro_name' => 'Samsung S8',
											'pro_price' => 18000000,
											'pro_catid' => 1,
											'pro_description' => 'Samsung S8 là điện thoại của hãng Samsung Hàn Quốc',
											'pro_image' => 'samsungs8.jpg'),
											array(	'pro_id' => 2, 
											'pro_name' => 'iPhone 7S',
											'pro_price' => 19000000,
											'pro_catid' => 1,
											'pro_description' => 'iPhone 7S là điện thoại của hãng Apple Mỹ',
											'pro_image' => 'iphone7.jpg')));
			$this->load->view('categorys/category',$data);

		}
	}
 ?>