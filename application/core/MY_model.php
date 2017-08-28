<?php 
	if (!defined('BASEPATH')) exit('Đường dẫn không hợp lệ');
	/**
	* 
	*/
	class MY_Model extends CI_Model
	{
		var $table;
		
		function create($data)
		{
			if ($this->db->insert($this->table, $data)) 
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function update($id, $data)
		{
			if (!$id) 
			{
				return FALSE;
			}
			$where = array();
			$where['id']=$id;
			return $this->update_rule($where,$data);
		}
		function update_rule($where, $data)
		{
			if (!$where) {
				return FALSE;
			}
			$this->db->where($where);
			if ($this->db->update($this->table, $data)) {
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function delete($id)
		{
			if (!$id) {
				return FALSE;
			}
			if (is_numeric($id)) {
				$where = array('id' => $id);
			}
			else
			{
				$where = "id IN (".$id.")";
			}
			return $this->del_rule($where);
		}
		function del_rule($where)
		{
			if (!$where) {
				return FALSE;
			}
			$this->db->where($where);
			if ($this->db->delete($this->table)) {
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		//Lấy thông tin 1 dữ liệu
		function get_info($id)
		{
			if (!$id) {
				return FALSE;
			}
			$where = array();
			$where['id']=$id;
			return $this->get_info_rule($where);
		}
		function get_info_rule($where = array())
		{
			$this->db->where($where);
			$query = $this->db->get($this->table);
			if ($query->num_rows()) {
				return $query->row();
			}
			return FALSE;
		}

		//Lấy danh sách dữ liệu
		function get_list($input = array())
		{
			$this->get_list_set_input($input);
			$query = $this->db->get($this->table);
			return $query->result();
		}
		function get_list_set_input($input)
		{
			if (isset($input['select'])) {
				$this->db->select($input['select']);
			}
			if ((isset($input['where'])) && $input['where']) {
				$this->db->where($input['where']);
			}

			if (isset($input['order'][0]) && isset($input['order'][1])) 
			{
				$this->db->order_by($input['order'][0], $input['order'][1]);
			}
			else
			{
				$this->db->order_by('id','ASC');
			}

			if (isset($input['limit'][0]) && isset($input['limit'][1])) {
				$this->db->limit($input['limit'][0], $input['limit'][1]);
			}
		}
		//Lấy tổng số
		function get_total($input = array())
		{
			$this->get_list_set_input($input);
			$query = $this->db->get($this->table);
			return $query->num_rows();
		}
	}
 ?>