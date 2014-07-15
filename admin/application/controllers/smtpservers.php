<?php
class Smtpservers extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library ( 'pagination' );
		$this->load->library ( 'upload' );
	}
	public function index() {
		$this->load->model ( 'modelsmtp' );
		$page = $this->uri->segment ( 3, 0 );
		$this->data ['page'] = $page;
		$config ["uri_segment"] = 3;
		$config ['per_page'] = 100;
		$this->data ['per_page'] = $config ['per_page'];
		$config ['first_link'] = 'First';
		
		$config ['full_tag_open'] = "<div class='pagination'>";
		$config ['full_tag_close'] = "</div>";
		
		$config ['num_links'] = 5;
		$this->data['smtps'] = $this->modelsmtp->getAllSmtp($page,$config ['per_page']);
		//echo "<pre>";print_r($smtps);exit;
		$this->data ['pagelink'] = $this->pagination->create_links ();
		$this->_renderView ( 'index', $this->data );
	}

	public function importbulk() {
		$config ['upload_path'] = './uploads/';
		$config ['allowed_types'] = 'csv|CSV|text/comma-separated-values|application/csv|application/excel|application/vnd.ms-excel|application/vnd.msexcel|text/anytext';
		$config ['max_size'] = '2048';
		$config ['overwrite'] = true;
		$this->upload->initialize ( $config );
		// echo "<pre>";print_r($_FILES['upload_csv']);
		if (isset ( $_FILES ['upload_csv'] )) {
			if (! $this->upload->do_upload ( 'upload_csv' )) {
				
				$this->data ['error'] = $this->upload->display_errors ();
				// var_dump($this->data['error']);exit;
			} else {
				$this->load->model ( 'modelsmtp' );
				$details = $this->upload->data ();
				
				chmod ( $details ['full_path'], 0777 );
				$filename = $details ['full_path'];
				$line = 0;
				if (($handle = fopen ( $filename, "r" )) !== FALSE) {
					while ( ($data = fgetcsv ( $handle, 1000, "," )) !== FALSE ) {
						if($line == 0) {
							continue; // avoiding header process
						}
						$num = count ( $data );
						//print $num;
						$insertArray = array ();
						if ($num === 7) {
							$insertArray ['smtp_name'] = $data [0];
							$insertArray ['smtp_host'] = $data [1];
							$insertArray ['smtp_port'] = $data [2];
							$insertArray ['smtp_login'] = $data [3];
							$insertArray ['smtp_password'] = $data [4];
							$smtp_secure = 0;
							if (strtolower ( $data [5] ) == 'yes' || strtolower ( $data [5] ) == 'y' || strtolower ( $data [5] ) == 1) {
								$smtp_secure = 1;
							}
							$insertArray ['smtp_secure'] = $smtp_secure;
							$insertArray ['smtp_sender'] = $data [6];
							//echo "<pre>";print_r($insertArray);exit;
							$this->modelsmtp->addSmtp($insertArray);
						}
					}
					fclose ( $handle );
				}else {
					die("Fle Open error :".error_get_last());
				}
				unlink($filename);
			}
		}
		
		$this->_renderView ( 'importbulk', $this->data );
	}
	public function edit($id=0) {
        $this->load->model ( 'modelsmtp' );

        $this->form_validation->set_rules ( 'smtp_name', 'Smtp Name', 'required' );
        $this->form_validation->set_rules ( 'smtp_host', 'Smtp Host', 'required' );
        $this->form_validation->set_rules ( 'smtp_port', 'Smtp Port', 'required|integer' );
        $this->form_validation->set_rules ( 'smtp_login', 'Smtp Login', 'required' );
        $this->form_validation->set_rules ( 'smtp_password', 'Smtp Password', 'required' );
        $this->form_validation->set_rules ( 'smtp_sender', 'Smtp Verified Sender', 'required' );
		$this->form_validation->set_error_delimiters ( '<p>', '</p>' );
		if ($this->form_validation->run () != FALSE) 
		{
			$postParam = $this->input->post ();
			if(isset($postParam['smtp_id']) && $postParam['smtp_id'] > 0)
			{
				$smtp_id = $postParam['smtp_id'];
				unset($postParam['smtp_id']);
				$this->modelsmtp->updateSmtp($postParam,$smtp_id);
			}else {
				$this->modelsmtp->addSmtp($postParam);
			}
			redirect ( '/smtpservers/index', 'refresh' );
		}
		if($id > 0) {
			$this->data['smtpdetails'] = $this->modelsmtp->getSmtpById($id);
		}
        
		$this->_renderView ( 'edit', $this->data );
	}
	public function generatecsvtemplate() {
		generateCreateNewSmtpCsvTemplate ();
	}
	public function _renderView($page, $data = array()) {
		$this->load->view ( 'smtpservers/' . $page, $data );
	}
}