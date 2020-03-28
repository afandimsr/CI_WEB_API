<?php
/**
* 
*/
class M_liflowdata extends CI_Model
{
	
	function save($datasensor)
	{
		$this->db->insert('sensor', $datasensor);
		return TRUE;
	}

	function ambildata(){
		$this->db->select('*');
		$this->db->from('sensor');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}
}

?>