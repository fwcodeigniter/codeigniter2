<?php

if (!defined('BASEPATH'))
    exit('Không cho phép điều hướng này');

/**
 * 
 */
class User extends My_Controller {

    function __construct() {
        //Gọi đến hàm khởi tạo của cha
        parent::__construct();
        //Kiểm tra quyền admin
        $this->checkadmin();
        //load model
        $this->load->model('user_model');
        //load Database
        $this->load->database();
    }

    //Hàm load trang chủ
    public function index() {
        $data['user'] = $this->user_model->get_list();
        $data['base_url'] = base_url();
        $this->load->view('layouts/headeradmin_View', $data);
        $this->load->view('admin/user_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }

    public function add() {
        $data['base_url'] = base_url();
        $data['user'] = $this->user_model->get_list();
        $dulieu = array('name' => $this->input->post('txtUser'),
            'pass' => $this->input->post('txtPass'),
            'email' => $this->input->post('txtEmail'),
            'phone' => $this->input->post('txtPhone'));
        // tạo quyền
        if (!empty($this->input->post['txtPermission'])) {
            $dulieu['permission'] = 1;
        } else {
            $dulieu['permission'] = 0;
        }
        // Kiểm tra Tên hiển thị
        if (empty($this->input->post('txtName'))) {
            $dulieu['dname'] = $this->input->post('txtUser');
        } else {
            $dulieu['dname'] = $this->input->post('txtName');
        }
        $isDouble = 0;
        foreach ($data['user'] as $key => $value) {
            if ($value->name == $dulieu['name']) {
                $isDouble = 1;
                break;
            }
        }
        if ($isDouble == 1) {
            $this->session->set_flashdata('fail', 'Tên đăng nhập đã tồn tại');
        } elseif ($this->user_model->create($dulieu)) {
            $this->session->set_flashdata('success', 'Tạo tài khoản thành công');
        } else {
            $this->session->set_flashdata('fail', 'Tạo tài khoản thất bại');
        }
        redirect($base_url . 'admin/user');
    }

    public function drop($id = '') {
        if ($id != '') {
            if ($this->user_model->delete($id)) {
                $data['result'] = 1;
            } else {
                $data['result'] = 0;
            }
        } else {
            $data['result'] = -1;
        }

        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/user');
    }

    public function update($id = '') {
        $data['base_url'] = base_url();
        $dulieu = array('pass' => $this->input->post('txtPass'),
            'email' => $this->input->post('txtEmail'),
            'phone' => $this->input->post('txtPhone'));
        // tạo quyền
        if (!empty($this->input->post['txtPermission'])) {
            $dulieu['permission'] = 1;
        } else {
            $dulieu['permission'] = 0;
        }
        // Kiểm tra Tên hiển thị
        if (empty($this->input->post('txtName'))) {
            $dulieu['dname'] = $this->input->post('txtUser');
        } else {
            $dulieu['dname'] = $this->input->post('txtName');
        }
        //Kiểm tra pass
        if (empty($dulieu['pass'])) {
            $dulieu['pass'] = $this->input->post('txtPass2');
        }
        if ($this->user_model->update($id, $dulieu)) {
            $data['result'] = TRUE;
        } else {
            $data['result'] = FALSE;
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/user');
    }

    public function changepass() {
        $oldpass = $this->input->post('txtOldPass');
        $id = $this->input->post('txtId');
        $dulieu = array('pass' => $this->input->post('txtPass'));
        echo $id;
        if (!empty($id)) {
            $data = $this->user_model->get_info($id);
            if ($oldpass == $data->pass) {
                if ($this->user_model->update($id, $dulieu)) {
                    $this->session->set_flashdata('success', 'Đổi mật khẩu thành công');
                } else {
                    $this->session->set_flashdata('fail', 'Đổi mật khẩu thất bại');
                }
            } else {
                $this->session->set_flashdata('fail', 'Sai mật khẩu');
            }
        } else {
            $this->session->set_flashdata('fail', 'Bạn chưa đăng nhập');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

?>