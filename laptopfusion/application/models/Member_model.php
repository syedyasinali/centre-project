<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function create($options)
	{
		$this->db->insert('afa110_member', $options);
		return $this->db->insert_id();
	}	
}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */