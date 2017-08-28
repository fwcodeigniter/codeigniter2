<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class MY_Controller extends CI_Controller
	{
		var $data = array();

		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
			//xử lý controller
			$control = $this->uri->segment(1);
			$control = strtolower($control);
			switch ($control) {
				case 'admin':
					# code...
					break;
				
				default:
					# code...
					break;
			}
		}
                function checkadmin()
                {
                    $base_url = base_url();
                    $user = $this->session->userdata['activeuser'];
                    if ((!isset($user))||($user['permission']!=0)) {
                        $this->session->set_flashdata('fail','Bạn cần đăng nhập quyền admin');
                        redirect($base_url.'admin/login');
                    }
                }
	}
 ?>