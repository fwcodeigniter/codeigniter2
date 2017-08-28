<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Dashboard extends My_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
                        //Kiểm tra quyền admin
                        $this->checkadmin();
		}
		//Hàm load trang chủ
		public function index()
		{
			$data['base_url'] = base_url();
			$this->load->view('layouts/headeradmin_View',$data);
			$this->load->view('admin/dashboard_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
	}
 ?>