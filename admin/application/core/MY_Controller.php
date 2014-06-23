<?php
Class MY_Controller extends CI_Controller {
	protected $data = array ();
	protected $noSessionClass = array ('login');
	public function __construct() {
		parent::__construct ();
		
		$role = $this->session->userdata('userrole');
		$this->data['userrole'] = $role;
		$this->data['loggedin_userrole'] = $this->session->userdata('loggedin_userrole');
		
		$currentClass =  $this->router->fetch_class();
		if(!in_array($currentClass, $this->noSessionClass)) {
			if(!$this->session->userdata('useremail')) {
				redirect('/login','refresh');
			}
		}
	}
}

?>