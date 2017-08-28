<?php 
	/**
	* 
	*/
	class Order_model extends MY_Model
	{
            public $table = 'order';
            function get_order_group_pro()
            {
                $query = $this->db->query('SELECT id_product,SUM(qty) as TongSL,SUM(amount) as TongTT FROM `order` GROUP BY id_product');
                return $query->result_array();
            }
	}
 ?>