<?php 
	/**
	* 
	*/
	class Product_model extends MY_Model
	{
		public $table = 'product';
		function get_pro_count_by_brand()
		{
			$query = $this->db->query('SELECT brand_id, COUNT(*) as num FROM product GROUP BY brand_id');
			return $query->result_array();
		}
	}
 ?>