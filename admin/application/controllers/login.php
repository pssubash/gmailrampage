<?php
class Login extends MY_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('user');
	}
	
	public function index ()
	{
		
		
		$this->form_validation->set_error_delimiters('<p>', '</p>');
		if ($this->form_validation->run() != FALSE) 
		{
			$paramArray = $this->input->post();
			$validateuser = $this->user->validateLogin($paramArray['usr_email'],$paramArray['usr_password']);
			//echo "<pre>";print_r($validateuser);exit;
			if($validateuser['error'] === false) {
				$sessionData = array();
				$sessionData['useremail'] = $validateuser['data']['usr_email'];
				$sessionData['userrole'] = $validateuser['data']['usr_role'];
				$sessionData['userid'] = $validateuser['data']['usr_id'];
				$sessionData['loggedin_useremail'] = $validateuser['data']['usr_email'];
				$sessionData['loggedin_userrole'] = $validateuser['data']['usr_role'];
				//$sessionData['fullname'] = $validateuser['data']['firstname']. " ".$validateUser['data']['lastname'];
				//$sessionData['gender'] = $validateuser['data']['gender'];
				$this->session->set_userdata($sessionData);
				if($validateuser['data']['usr_role'] == 'admin'){
					redirect('/users/index', 'refresh');
				}else {
					redirect('/gmailemail/emailbynum', 'refresh');
				}
				
			} else {
				
			}
				
			
		}
		$this->_renderView('index');
	}
	public function forgot() {
		$this->load->model('user');
		
		$this->form_validation->set_error_delimiters('<p>', '</p>');
		$this->form_validation->set_rules('usr_email', 'Email', 'required|callback_isEmailReg');
		if ($this->form_validation->run() != FALSE)
		{
			$password = passwordGenerator ();
			$useremail = $this->input->post('usr_email');
			$updateArray = array();
			
			$updateArray['usr_password'] = $password;
			$this->user->updateuserByEmail($updateArray,$useremail);
			
			$this->email->clear();
				
			$this->email->to($useremail);
			$this->email->from($this->config->item('from_email'));
			$this->email->subject("Forgot Password");
			$message = userCreateNotification($this->config->item('dm_user_forgot_email_template'),
					$useremail,
					$useremail,
					$password
						
			);
			$this->email->message($message);
			$this->email->set_mailtype("html");
			$this->email->send();
			$this->session->set_flashdata('sucess_message', 'Password successfully sent to your registered email address');
			redirect('/login/index', 'refresh');
		}
		$this->_renderView('forgot');
	}
	public function isEmailReg() {
		
		$useremail = $this->input->post('usr_email');
		//var_dump($this->user->isEmailReg($useremail));exit;
		return $this->user->isEmailReg($useremail);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/login/index', 'refresh');
	}
	public function _renderView ($page,$data = array())
	{
		$this->load->view('login/'.$page,$data);
	}
	
}