<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('afa110_brand', $options);
		return $this->db->insert_id();
	}	

	public function get_all($limit = NULL, $offset = NULL)
	{
		$query = $this->db->get('afa110_brand', $limit , $offset);
		return $query->result();
	}
	public function count_all()
	{
		$query = $this->db->get('afa110_brand');
		return $query->num_rows();
	}
	public function get_by($brand_id)
	{
		$this->db->where('id',$brand_id);
		$query = $this->db->get('afa110_brand');
		return $query->row();
	}
	public function update($brand_id,$options)
	{
		$this->db->where('id',$brand_id);
		$this->db->update('afa110_brand',$options);
		return $this->db->affected_rows();
	}
	public function remove($brand_id)
	{
		$this->db->where('id',$brand_id);
		$this->db->delete('afa110_brand');
		return $this->db->affected_rows();
	}
}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */