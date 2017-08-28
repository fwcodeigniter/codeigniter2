<?php

Class Cart extends MY_Controller {

    function __construct() {
        parent::__construct();
        //load model
        $this->load->library('cart');
        $this->load->model('transaction_model');
        $this->load->model('order_model');
        //load Database
        $this->load->database();
    }

    function add() {
        //   lay ra san pham muon them vao gio hang
        $this->load->model('product_model');
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if (!$product) {
            $carts = array(array('id' => 1,
                    'qty' => 5,
                    'price' => 6290000,
                    'name' => 'Laptop Asus E402SA '),
                array('id' => 2,
                    'qty' => 2,
                    'price' => 6390000,
                    'name' => 'Laptop Acer Aspire 3467'),
            );
            //goi phương thức thêm vào giỏ hàng
            $this->cart->insert($carts);
        }
        //tong so san pham
        $qty = 1;
        $price = $product->price;
        if ($product->discount > 0) { //neu co phan giam gia
            $price = $product->price - $product->discount;
        }

        //thong tin them vao gio hang
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = url_title($product->name);
        $data['price'] = $price;
        $this->cart->insert($data);

        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }

    //hien thi danh san pham trong gio hang
    function index() {
        $this->data['base_url'] = base_url();
        //Kiểm tra user đã đăng nhập hay chưa
        $this->data['user'] = $this->session->userdata('activeuser');
        //Nếu đã đăng nhập thì load thông tin giỏ hàng lên
        if (isset($this->data['user'])) {
            $this->load->model('product_model');
            $id = $this->uri->rsegment(3);
            $id = $this->product_model->get_info($id);
            $carts = $this->cart->contents();
            $this->data['carts'] = $carts;
            $total_items = $this->cart->total_items();
            $this->data['total_items'] = $total_items;
            // load view
            $this->data['temp'] = 'site/cart/index';
            $this->data['temp'] = 'site/order/checkout';
            $this->load->view('layouts/header_View', $this->data);
            $this->load->view('site/checkout_View', $this->data);
            $this->load->view('layouts/footer_View', $this->data);
        }
        //trường hợp chưa đăng nhập thì chuyển tới trang đăng nhập
        else {
            redirect($this->data['base_url'] . 'admin/login');
        }
    }

    function update() {

        // load ra danh sach san pham trong thu vien
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row) {
            $data['rowid'] = array();
            $data['rowid'] = $key;
            $data['qty'] = $this->input->post('qty_' . $row['id']);
            $this->cart->update($data);
        }
        redirect(base_url('cart'));
    }

    function del() {

        $id = $this->uri->rsegment('3');
        $id = intval($id);
        // load ra sanh sach san pham
        $carts = $this->cart->contents();
        if ($id > 0) {
            foreach ($carts as $key => $row) {
                if ($row['id'] == $id) {
                    $data['rowid'] = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        } else {
            $this->cart->destroy();
        }
        redirect(base_url('cart'));
    }

    //Ghi thông tin từ giỏ hàng vào database
    function checkout() {
        //Ghi thông tin lên transaction
        $transaction = array();
        $transaction['id_user'] = $this->input->post('txtId');
        $transaction['name'] = $this->input->post('txtName');
        $transaction['email'] = $this->input->post('txtEmail');
        $transaction['phone'] = $this->input->post('txtPhone');
        $transaction['address'] = $this->input->post('txtAddress');
        $transaction['amount'] = floor($this->input->post('txtTotal'));
        $transaction['payment'] = $this->input->post('txtPayment');
        $transaction['message'] = $this->input->post('txtMessage');
        $transaction['created'] = date('Y-m-d');
        $transaction['trac_id'] = date('Ymdhis');
        if ($this->transaction_model->create($transaction)) {
                $this->session->set_flashdata('success','Thêm thành công');
        }
        else
        {
                $this->session->set_flashdata('fail','Thêm thất bại');
        }
        //Ghi thông tin lên bảng order
        $cart = $this->cart->contents();
        foreach ($cart as $value)
        {
            $order = array();
            $order['id_transaction'] = $transaction['trac_id'];
            $order['id_product'] = $value['id'];
            $order['qty'] = $value['qty'];
            $order['price'] = $value['price'];
            $order['amount'] = $value['price']*$value['qty'];
            if ($this->order_model->create($order)) {
                $this->session->set_flashdata('success','Thêm thành công');
                //Hủy bỏ giỏ hàng
                $this->cart->destroy();
        }
        else
        {
                $this->session->set_flashdata('fail','Thêm thất bại');
        }
        }
        
        redirect(base_url());
    }

}
