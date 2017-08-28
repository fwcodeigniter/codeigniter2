<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Login extends MY_Controller
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
			//Load view trang chủ lên
			$this->load->view('layouts/header_View',$data);
			$this->load->view('admin/login_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
		public function success()
		{
			$data['base_url'] = base_url();
			$data['fail'] = "Bạn đã đăng ký thành công, vui lòng đăng nhập";
			//Load view trang chủ lên
			$this->load->view('layouts/header_View',$data);
			$this->load->view('admin/login_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
		
		public function fail($status)
		{
			$data['base_url'] = base_url();
			switch ($status) {
				case 0:
					$data['fail'] = 'Mật khẩu chưa đúng, <a href="">Nhấp vào đây</a> nếu bạn quên mật khẩu';
					break;
				case 1:
					$data['fail'] = 'Bạn chưa có tài khoản, vui lòng đăng ký tài khoản';
					break;
				case 2:
					$data['fail'] = 'Tên đăng nhập đã tồn tại, <a href="">Nhấp vào đây</a> nếu bạn quên mật khẩu';
					break;
				case 3:
					$data['fail'] = 'Đăng ký không thành công, vui lòng thử lại';
					break;
			}
			//Load view trang chủ lên
			$this->load->view('layouts/header_View',$data);
			$this->load->view('admin/login_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
	}
 ?>