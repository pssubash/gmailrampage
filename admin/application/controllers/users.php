<?php
class Users extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		$userrole = $this->data ['userrole'];
		if (empty ( $userrole ) || $userrole != 'admin') {
			if($this->router->fetch_method()!= 'add') {
				redirect ( '/login', 'refresh' );
			}
			
		}
		$this->load->model ( 'user' );
	}
	public function index() {
		$this->data ['success_message'] = $this->session->userdata ( 'success_message' );
		if ($this->data ['success_message'] != false) {
			$this->session->unset_userdata ( 'success_message' );
		}
		$this->data ['userlist'] = $this->user->getUsers ();
		$this->_renderView ( 'index', $this->data );
	}
	public function delete() {
		$id = $this->uri->segment ( 3 );
		if (! empty ( $id )) {
			$this->user->delete ( $id );
			$this->session->set_userdata ( 'success_message', "User Deleted Successfuly." );
			redirect ( '/users', 'refresh' );
		}
		print "You are not authoried to do this";
		exit ();
	}
	public function add() {
		$this->form_validation->set_rules ( 'usr_password', 'Password', 'required' );
		if ($this->data ['loggedin_userrole'] == 'admin') {
			$userid = $this->uri->segment ( 3, 0 );
		} else {
			$userid =$this->session->userdata ( 'userid' );
		}
		//echo "<pre>";print_r($this->session->all_userdata());exit;
		$this->data ['userdetail'] = array ();
		if ($userid > 0) {
			$this->data ['userdetail'] = $this->user->getUser ( $userid );
			$this->form_validation->set_rules ( 'usr_email', 'Email', 'required|valid_email|callback_customUserEmailIsUnique' );
		} else {
			$this->form_validation->set_rules ( 'usr_email', 'Email', 'required|valid_email|is_unique[users.usr_email]' );
		}
		$this->form_validation->set_error_delimiters ( '<p>', '</p>' );
		// echo "<pre>";var_dump($this->form_validation);exit;
		if ($this->form_validation->run () != FALSE) {
			$password = passwordGenerator ();
			$postParam = $this->input->post ();
			// echo "<pre>";print_r($this->data['userdetail']);exit;
			if (is_array ( $this->data ['userdetail'] ) && count ( $this->data ['userdetail'] ) > 0) {
				$updateArray = array ();
				$updateArray ['usr_email'] = $postParam ['usr_email'];
				$updateArray ['usr_password'] = $postParam ['usr_password'];
				$this->user->updateuser ( $updateArray, $this->data ['userdetail'] ['usr_id'] );
			} else {
				$insertArray = array ();
				$insertArray ['usr_email'] = $postParam ['usr_email'];
				// $insertArray['usr_password'] = $password;
				$insertArray['usr_password'] = $postParam ['usr_password'];
				$insertArray ['usr_role'] = 'user';
				$insertArray ['usr_created'] = date ( 'Y-m-d H:i:s' );
				//echo "<pre>";print_r($insertArray);exit;
				$this->user->adduser ( $insertArray );
				$this->email->clear ();
				
				$this->email->to ( $postParam ['usr_email'], 'underpricedhost@gmail.com' );
				$this->email->from ( $this->config->item ( 'from_email' ) );
				$this->email->subject ( "A new user account created" );
				$message = userCreateNotification ( $this->config->item ( 'dm_user_add_email_template' ), $postParam ['usr_email'], $postParam ['usr_email'], $postParam ['usr_password'] );

				
				$this->email->message ( $message );
				$this->email->set_mailtype ( "html" );
				@$this->email->send ();
			}
			if ($this->data ['userrole'] == 'admin') {
				redirect ( '/users/index', 'refresh' );
			}else {
				redirect ( '/gmailemail/emailbynum', 'refresh' );
			}
			
		} else {
			echo validation_errors ();
		}
		
		$this->_renderView ( 'add', $this->data );
	}
	
	public function loginasuser() {
		$userid = $this->uri->segment ( 3, 0 );
		$userDetails = $this->user->getUser ( $userid );
		//echo "<pre>";print_r($userDetails);exit;
		$sessionData['loggedin_useremail'] = $userDetails['usr_email'];
		$sessionData['loggedin_userrole'] = $userDetails['usr_role'];
		$this->session->set_userdata($sessionData);
		redirect ( '/gmailemail/emailbynum', 'refresh' );
	}
	public function customUserEmailIsUnique() {
		if ($this->data ['loggedin_userrole'] == 'admin') {
			$userid = $this->uri->segment ( 3, 0 );
		} else {
			$userid = $this->session->userdata ( 'userid' );
		}
		$useremail = $this->input->post ( 'usr_email' );
		return $this->user->customUserEmailIsUnique ( $useremail, $userid );
	}
	public function _renderView($page, $data = array()) {
		$this->load->view ( 'user/' . $page, $data );
	}
}