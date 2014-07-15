<?php
class ModelSmtp extends CI_Model {
	
	public function __construct() {
		parent::__construct();	
	}
	
	public function getAllSmtp ($page=1,$offset = 100) {
		$select = array ();
		$select[] = '*';
		$this->db->select($select);
		$this->db->from('smtpservers');
		$this->db->limit ( $offset, $page );
		$result = $this->db->get ();
		// print $this->db->last_query();exit;
		return $result->result_array ();
	}
	
	public function addSmtp($data) {
		$this->db->insert("smtpservers",$data);
	}
    public function getSmtpById($id) {
        $select[] = '*';
        $this->db->select($select);
        $this->db->from('smtpservers');
        $this->db->where ( 'smtp_id', $id );
        $result = $this->db->get ();
        // print $this->db->last_query();exit;
        return $result->row_array ();
    }
	public function updateSmtp($data, $id) {
		$this->db->where ( 'smtp_id', $id );
		$this->db->update ( 'smtpservers', $data );
		//print $this->db->last_query();
	}
}