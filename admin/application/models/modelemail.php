<?php
class ModelEmail extends CI_Model {
	public function __construct() {
		parent::__construct ();
	}
	public function getValidEmailsCount($num, $search = false) {
		$select = array ();
		$select [] = "count(id) as counttotal";
		$from = "validemail_" . $num;
		$this->db->select ( $select );
		$this->db->from ( $from );
		if ($search !== false) {
			$this->db->like ( 'email', $search, 'after' );
		}
		$result = $this->db->get ();
		if (! $result) {
			return 0;
		} else {
			$r = $result->row_array ();
			return $r ['counttotal'];
		}
	}
	public function getValidEmails($num, $page, $offset = 1000, $search = false) {
		$select = array ();
		$select [] = "email";
		$from = "validemail_" . $num;
		$this->db->from ( $from );
		if ($search !== false) {
			$this->db->like ( 'email', $search, 'after' );
		}
		// $page = $page*1000;
		$this->db->limit ( $offset, $page );
		$result = $this->db->get ();
		// print $this->db->last_query();exit;
		return $result->result_array ();
	}
	public function getTotalPermutaion($num, $search = false) {
		$select = array ();
		$select [] = "count(id) as counttotal";
		$from = "emailgmail_" . $num;
		$this->db->select ( $select );
		$this->db->from ( $from );
		if ($search !== false) {
			$this->db->like ( 'email', $search, 'after' );
		}
		$result = $this->db->get ();
		// echo $this->db->last_query();exit;
		if (! $result) {
			return 0;
		} else {
			$r = $result->row_array ();
			return $r ['counttotal'];
		}
	}
	public function getInvalidEmailsCount($num, $search = false) {
		$select = array ();
		$select [] = "count(id) as counttotal";
		$from = "invalidemail_" . $num;
		$this->db->select ( $select );
		$this->db->from ( $from );
		if ($search !== false) {
			$this->db->like ( 'email', $search, 'after' );
		}
		$result = $this->db->get ();
		if (! $result) {
			return 0;
		} else {
			$r = $result->row_array ();
			return $r ['counttotal'];
		}
	}
	public function updateDownloadCounter($type) {
		$select = array (); 
		
		$select[] = "dc_id";
		$select[] = "dc_count";
		$this->db->select($select);
		$this->db->from('downloadcounter');
		$this->db->where('dc_type',$type);
		$result = $this->db->get();
		
		if ($result->num_rows () <= 0) {
			$inArray = array ();
			$inArray['dc_count'] =  1;
			$inArray['dc_type'] =  $type;
			$this->db->insert('downloadcounter',$inArray);
		} else {
			$r = $result->row_array ();
			$upArray = array ();
			$upArray['dc_count'] =  $r['dc_count'] + 1;
			
			$this->db->where ( 'dc_id',  $r['dc_id'] );
			$this->db->update ( 'downloadcounter', $upArray );
		}
		
		
	}
	
	public function getDownloadCounter($type) {
		
		$select = array ();
		
		$select[] = "dc_id";
		$select[] = "dc_count";
		$this->db->select($select);
		$this->db->from('downloadcounter');
		$this->db->where('dc_type',$type);
		$result = $this->db->get();
		
		if ($result->num_rows () <= 0) {
			return 0;
		}else {
			$r = $result->row_array ();
			return $r['dc_count'];
		}
	}
}