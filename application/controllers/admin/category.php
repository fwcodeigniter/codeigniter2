<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Category extends My_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
                        //Kiểm tra quyền admin
                        $this->checkadmin();
			//load model
			$this->load->model('category_model');
			//load Database
			$this->load->database();
		}
		//Hàm load trang chủ
		public function index()
		{
			$data['category'] = $this->category_model->get_list();
			$data['base_url'] = base_url();
			$this->load->view('layouts/headeradmin_View',$data);
			$this->load->view('admin/category_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
		public function add()
		{
			$dulieu = array('name'=>$this->input->post('txtName'));
			if ($this->category_model->create($dulieu)) {
				$this->session->set_flashdata('success','Thêm Nhóm hàng thành công');
			}
			else
			{
				$this->session->set_flashdata('fail','Thêm Nhóm hàng thất bại');
			}
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/category');
		}
		public function drop($id = '')
		{
			if ($id!='') {
				if ($this->category_model->delete($id)) {
					$this->session->set_flashdata('success','Xóa Nhóm hàng thành công');
				}
				else
				{
					$this->session->set_flashdata('fail','Xóa Nhóm hàng thất bại');
				}
			}
			else
			{
				$data['result'] = -1;
			}
			
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/category');
		}
		public function update($id = '')
		{
			$dulieu = array('name'=>$this->input->post('txtName'));
			if ($this->category_model->update($id, $dulieu)) {
				$this->session->set_flashdata('success','Sửa Nhóm hàng thành công');
			}
			else
			{
				$this->session->set_flashdata('fail','Sửa Nhóm hàng thất bại');
			}
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/category');
		}
	}
 ?>