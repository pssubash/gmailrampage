<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once 'Upload.php';

class MY_Upload extends CI_Upload{

	function Csvupload($props = array())
	{
		parent::CI_Upload($props);
	}

	function is_allowed_filetype()
	{
		$data = $this->data();
		return $data["file_ext"] == ".csv";
	}
}