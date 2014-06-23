<?php
$config = array ();

/*
 * Login Validation
 */

$config['login/index'] = array ();

$username = array(
		'field' => 'usr_email',
		'label' => 'Username',
		'rules' => 'required'
);
$password = array(
		'field' => 'usr_password',
		'label' => 'Password',
		'rules' => 'required'
);

array_push($config['login/index'] , $username);
array_push($config['login/index'] , $password);

/*
 * User Add
 */


$config['users/add'] = array ();

$email = array(
		'field' => 'usr_email',
		'label' => 'Email',
		'rules' => 'required|valid_email|is_unique[users.usr_email]'
);
$email = array(
		'field' => 'usr_password',
		'label' => 'Password',
		'rules' => 'required'
);


array_push($config['users/add'] , $email);

