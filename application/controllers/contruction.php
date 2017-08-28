<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Contruction extends MY_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
		}
		//Hàm load trang chủ
		public function index()
		{
			$data['base_url'] = base_url();
			$this->load->view('errors/cli/error_contruction',$data);
		}
	}
 ?>