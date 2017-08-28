<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Signin extends My_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
			//load model
			$this->load->model('user_model');
			//load Database
			$this->load->database();
		}
		//Hàm check user/pass
		public function index()
		{
			$data['base_url'] = base_url();
			$data['user'] = $this->user_model->get_list();
			$dulieu = array('name'=>$this->input->post('txtUser'),
							'pass'=>$this->input->post('txtPass'));
			$isLogin = 0;

			
			foreach ($data['user'] as $key => $value) {
				if (($value->name == $dulieu['name'])&&($value->pass == $dulieu['pass'])) {
					$isLogin = 1;
					$activeuser = array('id' => $value->id,
											'name' => $value->name,
											'pass' => $value->pass,
											'dname' => $value->dname,
											'phone' => $value->phone,
											'address' => $value->address,
											'email' => $value->email,
											'permission' => $value->permission);
					$this->session->set_userdata('activeuser',$activeuser);
					break;
				}
				if (($value->name == $dulieu['name'])&&($value->pass != $dulieu['pass'])) {
					$isLogin = 2;
					
					break;
				}
			}
			if ($isLogin == 1) {
				if ($this->session->userdata['activeuser']['permission']) {
					redirect($data['base_url'].'home');
				}
				else
				{
					redirect($data['base_url'].'admin/dashboard');
				}
			}
			else if ($isLogin == 2) {
				redirect($data['base_url'].'admin/login/fail/0');
			}
			else
			{
				redirect($data['base_url'].'admin/login/fail/1');
			}
		}
		//Đăng xuất
		public function signout()
		{
			$data['base_url'] = base_url();
			$this->session->unset_userdata('activeuser');
			// var_dump($this->session->userdata['activeuser']);
			//Load view trang chủ lên
			redirect($data['base_url']);
		}
		public function add()
		{
			$data['base_url'] = base_url();
			$data['user'] = $this->user_model->get_list();
			$dulieu = array('name'=>$this->input->post('txtUser'),
							'pass'=>$this->input->post('txtPass'),
							'email'=>$this->input->post('txtEmail'),
							'phone'=>$this->input->post('txtPhone'),
							'dname'=>$this->input->post('txtUser'),
							'permission'=> 1);
			$isDouble = 0;
			foreach ($data['user'] as $key => $value) {
				if ($value->name == $dulieu['name']) {
					$isDouble = 1;
					break;
				}
			}
			if ($isDouble == 1) {
				redirect($data['base_url'].'admin/login/fail/2');
			}
			if ($this->user_model->create($dulieu)) {
				redirect($data['base_url'].'admin/login/success');
			}
			else
			{
				redirect($data['base_url'].'admin/login/fail/3');
			}
			
			
		}
	}