<?php

class ValidateForm extends MY_Controller{
	private $b_Check = false;
	
	public function __construct(){
		parent::__construct();
		#Tải thư viện  và helper của Form trên CodeIgniter
		
	}
	
	public function index(){
		$data['base_url'] = base_url();
		$this->load->view('layouts/header_View',$data);
		$this->load->view('validateForm-template');
		$this->load->view('layouts/footer_View',$data);
	}
	
	public function formValidate(){
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('username', 'lang:username', 'callback_username_check|trim|required|min_length[1]|max_length[12]');
		$this->form_validation->set_rules('password', 'lang:password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'lang:passconf', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                                                     $this->form_validation->set_rules('phone', 'lang: phone', 'trim|min_length[5]|numeric');
		
		#Kiểm tra điều kiện validate
		if($this->form_validation->run() == TRUE){
			$this->b_Check = true;
		}
		$data['b_Check']= $this->b_Check;
		$this->load->view('validateForm-template', $data);
		
	}
	
	# Lời gọi hàm callback giúp kiểm tra thêm điều kiện mà ta tự định nghĩa.
	public function username_check($str = ''){
		# Kiểm tra trường tên nhập vào phải khác từ 'damn'
		if($str && $str == 'damn'){
			$this->form_validation->set_message('username_check', 'Trường \'%s\' không được phép là từ \'test\'');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

