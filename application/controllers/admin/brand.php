<?php

if (!defined('BASEPATH'))
    exit('Không cho phép điều hướng này');

/**
 * 
 */
class Brand extends My_Controller {

    function __construct() {
        //Gọi đến hàm khởi tạo của cha
        parent::__construct();
        //load model
        $this->load->model('brand_model');
        $this->checkadmin();
        //load Database
        $this->load->database();
    }

    //Hàm load trang chủ
    public function index() {
        $data['brand'] = $this->brand_model->get_list();
        $data['base_url'] = base_url();
        $this->load->view('layouts/headeradmin_View', $data);
        $this->load->view('admin/brand_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }

    public function add() {
        $dulieu = array('name' => $this->input->post('txtName'));
        if ($this->brand_model->create($dulieu)) {
            $this->session->set_flashdata('success', 'Thêm thành công');
        } else {
            $this->session->set_flashdata('fail', 'Thêm thất bại');
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/brand');
    }

    public function drop($id = '') {
        if ($id != '') {
            if ($this->brand_model->delete($id)) {
                $this->session->set_flashdata('success', 'Xóa thành công');
            } else {
                $this->session->set_flashdata('fail', 'Xóa thất bại');
            }
        } else {
            $data['result'] = -1;
        }

        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/brand');
    }

    public function update($id = '') {
        $dulieu = array('name' => $this->input->post('txtName'));
        if ($this->brand_model->update($id, $dulieu)) {
            $this->session->set_flashdata('success', 'Sửa thành công');
        } else {
            $this->session->set_flashdata('fail', 'Sửa thất bại');
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/brand');
    }

}

?>