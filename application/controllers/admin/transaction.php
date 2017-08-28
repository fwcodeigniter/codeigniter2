<?php

if (!defined('BASEPATH'))
    exit('Không cho phép điều hướng này');

/**
 * 
 */
class transaction extends My_Controller {

    function __construct() {
        //Gọi đến hàm khởi tạo của cha
        parent::__construct();
        //Kiểm tra quyền admin
        $this->checkadmin();
        //load model
        $this->load->model('transaction_model');
        $this->load->model('order_model');
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('user_model');
        //load Database
        $this->load->database();
    }

    //Hàm load trang chủ$total_rows = $this->transaction_model->get_total();

    public function index() {
        $this->load->library('pagination');
        $config = array();

        $config['base_url'] = base_url(); //link hien thi ra danh sach san pham
        $config['per_page'] = 1; //so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        $transaction = $this->transaction_model->get_list($input);
        $this->data['transaction'] = $transaction;
        $data['transaction'] = $this->transaction_model->get_list();
        $data['order'] = $this->order_model->get_list();
        $data['product'] = $this->product_model->get_list();
        $data['user'] = $this->user_model->get_list();
        $data['base_url'] = base_url();
        $this->load->view('layouts/headeradmin_View', $data);
        $this->load->view('admin/transaction_View', $data);
        $this->load->view('layouts/footer_View', $data);
        //lay tong so luong ta ca cac san pham trong website
    }

    public function add() {
        $dulieu = array('name' => $this->input->post('txtName'));
        if ($this->transaction_model->create($dulieu)) {
            $this->session->set_flashdata('success', 'Thêm thành công');
        } else {
            $this->session->set_flashdata('fail', 'Thêm thất bại');
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/transaction');
    }

    public function drop($id = '') {
        if ($id != '') {
            if ($this->transaction_model->delete($id)) {
                $this->session->set_flashdata('success', 'Xóa thành công');
            } else {
                $this->session->set_flashdata('fail', 'Xóa thất bại');
            }
        } else {
            $data['result'] = -1;
        }

        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/transaction');
    }

    public function update($id = '') {
        $dulieu = array('name' => $this->input->post('txtName'));
        if ($this->transaction_model->update($id, $dulieu)) {
            $this->session->set_flashdata('success', 'Sửa thành công');
        } else {
            $this->session->set_flashdata('fail', 'Sửa thất bại');
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/transaction');
    }
    public function order()
    {
        $data['order'] = $this->order_model->get_order_group_pro();
        $data['product'] = $this->product_model->get_list();
        $data['user'] = $this->user_model->get_list();
        $data['base_url'] = base_url();
        $this->load->view('layouts/headeradmin_View', $data);
        $this->load->view('admin/order_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }
}

?>