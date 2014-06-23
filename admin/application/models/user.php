<?php
class User extends CI_Model {
	public function __construct() {
	}
	public function validateLogin($email, $password) {
		$select = array ();
		$select [] = "usr_email";
		$select [] = "usr_role";
		$select [] = "usr_id";
		$this->db->select ( $select );
		
		$this->db->from ( 'users' );
		
		$this->db->where ( 'usr_email', $email );
		$this->db->where ( 'usr_password', trim($password) );
		
		$result = $this->db->get ();
		//print $this->db->last_query();exit;
		$return = array ();
		if ($result->num_rows () > 0) {
			$return ['error'] = false;
			$return ['data'] = $result->row_array ();
		} else {
			$return ['error'] = true;
			$return ['data'] = "The username or password you entered is incorrect.";
		}
		
		return $return;
	}
	public function getUser($userid) {
		$select = array ();
		$select [] = "usr_id";
		$select [] = "usr_email";
		$select [] = "usr_password";
		$select [] = "usr_role";
		$select [] = "usr_created";
		$this->db->select ( $select );
		
		$this->db->from ( 'users' );
		
		$this->db->where ( 'usr_id', $userid );
		
		$result = $this->db->get ();
		if ($result->num_rows () > 0) {
			return $result->row_array ();
		} else {
			return '';
		}
	}
	public function getUsers($role = 'user') {
		$select = array ();
		$select [] = "usr_id";
		$select [] = "usr_email";
		$select [] = "usr_password";
		$select [] = "usr_role";
		$select [] = "usr_created";
		$this->db->select ( $select );
		
		$this->db->from ( 'users' );
		
		$this->db->where ( 'usr_role', $role );
		
		$this->db->order_by ( "usr_id", "desc" );
		$result = $this->db->get ();
		if ($result->num_rows () > 0) {
			return $result->result_array ();
		} else {
			return false;
		}
	}
	public function adduser($data) {
		$result = $this->db->insert ( 'users', $data );
		if ($result) {
			return $this->db->insert_id ();
		} else {
			return false;
		}
	}
	public function updateuser($data, $id) {
		$this->db->where ( 'usr_id', $id );
		$this->db->update ( 'users', $data );
		//print $this->db->last_query();
	}
	public function updateuserByEmail($data, $email) {
		$this->db->where ( 'usr_email', $email );
		$this->db->update ( 'users', $data );
		//print $this->db->last_query();
	}
	public function delete($id) {
		$this->db->delete ( 'users', array (
				'usr_id' => $id 
		) );
	}
	
	public function customUserEmailIsUnique ($email,$id) {
		//print "I am here ".$email;exit;
		$this->db->select ( '*' );
		
		$this->db->from ( 'users' );
		
		$this->db->where ( 'usr_email', $email );
		$this->db->where ( 'usr_id !=', $id );
		$query =  $this->db->get ();
		//print $this->db->last_query();exit;
		return $query->num_rows() === 0;
	}
	
	public  function isEmailReg($email) {
		$this->db->select ( '*' );
		
		$this->db->from ( 'users' );
		
		$this->db->where ( 'usr_email', $email );
		
		$query =  $this->db->get ();
		//print $this->db->last_query();exit;
		if($query->num_rows() > 0) 
			return true;
		return false;
	}
}