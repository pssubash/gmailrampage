<?php
class GmailEmail extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		$userrole = $this->data ['userrole'];
		if (empty ( $userrole )) {
			redirect ( '/login', 'refresh' );
		}
	}
	public function emailbynum() {
		$this->load->model ( 'modelemail' );
		
		$starLetter = $this->config->item ( 'start_letter_count' );
		
		$endLetter = $this->config->item ( 'end_letter_count' );
		$str = "<table>";
		$str .= "<thead>";
		$str .= "<tr>";
		$str .= "<th scope='col'>Permutaion</th>";
		$str .= "<th scope='col'>Total Permutaions</th>";
		$str .= "<th scope='col'>Total Invalid</th>";
		$str .= "<th scope='col'>Total Valid</th>";
		$str .= "<th scope='col'>Cost per email address</th>";
		$str .= "<th scope='col'>Total Cost</th>";
		$str .= "<th scope='col'>Options</th>";
		$str .= "</tr>";
		$str .= "</thead>";
		$vtotalcount = 0;
		$vtotalcost = 0;
		
		$incount = 0;
		$totalPermutaion = 0;
		$totalPermutaionAll = 0;
		$itotalcount = 0;
		$str .= "<tbody>";
		for($lettercount = $starLetter; $lettercount <= $endLetter; $lettercount ++) {
			$vcount = $this->modelemail->getValidEmailsCount ( $lettercount );
			
			$totalPermutaion = $this->modelemail->getTotalPermutaion ( $lettercount );
			$totalPermutaionAll += $totalPermutaion;
			$vtotalcount += $vcount;
			$vcost = COST_PER_VALID_EMAIL;
			$vtotalcost += $vcost;
			$incount = $this->modelemail->getInvalidEmailsCount ( $lettercount );
			$itotalcount += $incount;
			$str .= "<tr>";
			$str .= "<td>" . $lettercount . " Character </td>";
			$str .= "<td>" . number_format ( $totalPermutaion, 0 ) . "</td>";
			$str .= "<td>" . number_format ( $incount, 0 ) . "</td>";
			$str .= "<td>" . number_format ( $vcount, 0 ) . "</td>";
			$str .= "<td>$" . $vcost . "</td>";
			$str .= "<td>$" . number_format ( $vcount * $vcost, 4, '.', ',' ) . "</td>";
			$str .= "<td><a href='viewemail/en/" . $lettercount . "' target='_blank'>View </a>  | ";
			$str .= "<a href='downloademail/en/" . $lettercount . "' target='_blank'>Download </a></td>";
			$str .= "</tr>";
			
		}
		
		$vcost = COST_PER_VALID_EMAIL;
		$str .= "<tr class='totalvalues'>";
		$str .= "<td><strong>Total</strong></td>";
		$str .= "<td>" . number_format ( $totalPermutaionAll, 0 ) . "</td>";
		$str .= "<td>" . number_format ( $itotalcount, 0 ) . "</td>";
		$str .= "<td>" . number_format ( $vtotalcount, 0 ) . "</td>";
		
		$str .= "<td>$" . number_format ( $vcost, 4, '.', ',' ) . "</td>";
		$str .= "<td>$" . number_format ( $vcost * $vtotalcount, 4, '.', ',' ) . "</td>";
		$str .= "<td> ";
		$str .= "<a href='downloademail/en/all/1' target='_blank'>Download </a></td>";
		$str .= "</tr>";
		$str .= "</tbody>";
		$str .= "</table>";
		$this->data ['payplaemail'] = $this->config->item ( 'paypal_email' );
		$this->data ['tbl_emailbynum'] = $str;
		if ($this->input->is_ajax_request ()) {
			print $this->data ['tbl_emailbynum'];
		} else {
			$this->_renderView ( 'emailbynum', $this->data );
		}
	}
	public function emailbychar() {
		$this->load->model ( 'modelemail' );
		$str = "<table>";
		$str .= "<thead><tr>";
		$str .= "<th scope='col'>Permutaion</th>";
		$str .= "<th scope='col'>Total Permutaions</th>";
		$str .= "<th scope='col'>Total Invalid</th>";
		$str .= "<th scope='col'>Total Valid</th>";
		$str .= "<th scope='col'>Cost per email address</th>";
		$str .= "<th scope='col'>Total Cost</th>";
		$str .= "<th scope='col'>Options</th>";
		$str .= "</tr></thead>";
		// print $str;exit;
		$vtotalcount = 0;
		$vtotalcost = 0;
		$itotalcount = 0;
		$totalPermutaionAll = 0;
		$charArray = array ();
		foreach ( range ( 'a', 'z' ) as $letter ) {
			$charArray [] = $letter;
		}
		foreach ( range ( 0, 9 ) as $letter ) {
			$charArray [] = $letter;
		}
		$str .= "<tbody>";
		for($search = 0; $search < count ( $charArray ); $search ++) {
			$vcost = 0;
			$vcount = 0;
			$incount = 0;
			$totalPermutaion = 0;
			for($lettercount = $this->config->item ( 'start_letter_count' ); $lettercount <= $this->config->item ( 'end_letter_count' ); $lettercount ++) {
				
				$vcount += $this->modelemail->getValidEmailsCount ( $lettercount, $charArray [$search] );
				$incount += $this->modelemail->getInvalidEmailsCount ( $lettercount, $charArray [$search] );
				$totalPermutaion += $this->modelemail->getTotalPermutaion ( $lettercount, $charArray [$search] );
			}
			$totalPermutaionAll += $totalPermutaion;
			$vcost = COST_PER_VALID_EMAIL;
			$vtotalcount += $vcount;
			$vtotalcost += $vcost;
			$itotalcount += $incount;
			
			$str .= "<tr>";
			$str .= "<td>" . $charArray [$search] . " Character </td>";
			$str .= "<td>" . number_format ( $totalPermutaion ) . "</td>";
			$str .= "<td>" . number_format ( $incount ) . "</td>";
			$str .= "<td>" . number_format ( $vcount ) . "</td>";
			$str .= "<td>$" . $vcost . "</td>";
			$str .= "<td>$" . number_format ($vcost * $vcount, 4, '.', ',' ) . "</td>";
			// $str .= "<td><input type='image' class='class_buynow_char'
			// id='buynow_" . $vcount . "_" . $lettercount . "_" . $vcost . "_"
			// . $charArray [$search] . "'
			// src='http://dangerousmailer.com/images/paypal_buy.gif' border='0'
			// name='I1' alt='Make payments with PayPal - it\'s fast, free and
			// secure!' width='137' height='57'>
			// <img alt='' border='0'
			// src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1'
			// height='1'></td>";
			
			$str .= "<td><a href='viewemail/ec/" . $charArray [$search] . "' target='_blank'>View </a>  | ";
			$str .= "<a href='downloademail/ec/" . $charArray [$search] . "' target='_blank'>Download </a></td>";
			$str .= "</tr>";
			//print  (double)COST_PER_VALID_EMAIL;exit;
			
		}
		
		$vcost = COST_PER_VALID_EMAIL;
		$str .= "<tr class='totalvalues'>";
		$str .= "<td ><strong>Total</strong></td>";
		$str .= "<td>" . number_format ( $totalPermutaionAll ) . "</td>";
		$str .= "<td>" . number_format ( $itotalcount ) . "</td>";
		$str .= "<td>" . number_format ( $vtotalcount ) . "</td>";
		$str .= "<td>$" . number_format ( $vcost, 4, '.', ',' ) . "</td>";
		$str .= "<td>$" . number_format ( $vtotalcount * $vcost, 4, '.', ',' ) . "</td>";
		$str .= "<td>View | Download</td>";
		$str .= "</tr>";
		$str .= "</tbody>";
		$str .= "</table>";
		
		$this->data ['payplaemail'] = $this->config->item ( 'paypal_email' );
		$this->data ['tbl_emailbychar'] = $str;
		if ($this->input->is_ajax_request ()) {
			print $this->data ['tbl_emailbychar'];
		} else {
			$this->_renderView ( 'emailbychar', $this->data );
		}
	}
	
	/*
	 * Download Option
	 */
	public function downloademail() {
		$this->load->model ( 'modelemail' );
		/*
		 * en - email number ec - email char
		 */
		
		$type = $this->uri->segment ( 3 ); // Type
		/*
		 * Character/ num
		 */
		$chartype = $this->uri->segment ( 4 );
		$isall = $this->uri->segment ( 5 ); // Download All
		$filename = $chartype . "_character_gmail_addresses.txt";
		// print $filename;exit;
		switch ($type) {
			case 'en' :
				
				if ($isall == 1) {
					$starLetter = $this->config->item ( 'start_letter_count' );
					
					$endLetter = $this->config->item ( 'end_letter_count' );
					$this->modelemail->updateDownloadCounter('PA');
				} else {
					$starLetter = $endLetter = $chartype;
					$this->modelemail->updateDownloadCounter(strtoupper($chartype.'P'));
				}
				$totalcount = 0;
				for($lettercount = $starLetter; $lettercount <= $endLetter; $lettercount ++) {
					
					$totalcount = $this->modelemail->getValidEmailsCount ( $lettercount );
					if ($isall == 1) {
						$filename = "all_character_gmail_addresses.txt";
					} else {
						$filename = $chartype . "_character_gmail_addresses_" . $totalcount . ".txt";
					}
					$totalpages = round ( $totalcount / 1000 );
					
					for($pageindex = 0; $pageindex <= $totalpages; $pageindex ++) {
						$emailList = $this->modelemail->getValidEmails ( trim ( $lettercount ), $pageindex * 1000 );
						$handler = fopen ( $filename, "a" );
						if ($handler === false) {
							print "Can't able to export at this time. Please try again later";
							exit ();
						}
						if (count ( $emailList ) > 0) {
							foreach ( $emailList as $item ) {
								fwrite ( $handler, $item ['email'] . "\r\n" );
							}
						}
						
						fclose ( $handler );
					}
				}
				
				header ( 'Content-type: text/plain' );
				header ( 'Content-Disposition: attachment; filename=' . $filename );
				readfile ( $filename );
				unlink ( $filename );
				exit ();
				break;
			
			case 'ec' :
				$charArray = array ();
				$filename = "test.txt";
				if ($isall == 1) {
					$filename = "all_character_gmail_addresses.txt";
					foreach ( range ( 'a', 'z' ) as $letter ) {
						$charArray [] = $letter;
					}
					foreach ( range ( 0, 9 ) as $letter ) {
						$charArray [] = $letter;
					}
					$this->modelemail->updateDownloadCounter(strtoupper('CA'));
				} else {
					$filename = $chartype . "_character_gmail_addresses.txt";
					$charArray [] = $chartype;
					$this->modelemail->updateDownloadCounter(strtoupper($chartype.'C'));
				}
				// echo "<pre>";print_r($charArray);
				for($search = 0; $search < count ( $charArray ); $search ++) {
					for($lettercount = $this->config->item ( 'start_letter_count' ); $lettercount <= $this->config->item ( 'end_letter_count' ); $lettercount ++) {
						$totalcount = $this->modelemail->getValidEmailsCount ( $lettercount, $charArray [$search] );
						$totalpages = round ( $totalcount / 1000 );
						for($pageindex = 0; $pageindex <= $totalpages; $pageindex ++) {
							$emailList = $this->modelemail->getValidEmails ( $lettercount, $pageindex * 1000, 1000, $charArray [$search] );
							// echo "<pre>";print_r($emailList );exit;
							$handler = fopen ( $filename, "a" );
							if ($handler === false) {
								print "Can't able to export at this time. Please try again later";
								exit ();
							}
							if (count ( $emailList ) > 0) {
								foreach ( $emailList as $item ) {
									fwrite ( $handler, $item ['email'] . "\r\n" );
								}
							}
							
							fclose ( $handler );
						}
					}
				}
				header ( 'Content-type: text/plain' );
				header ( 'Content-Disposition: attachment; filename=' . $filename );
				readfile ( $filename );
				unlink ( $filename );
				exit ();
				break;
		}
	}
	public function viewemail() {
		$this->load->model ( 'modelemail' );
		$this->load->library ( 'pagination' );
		/*
		 * en - email number ec - email char
		 */
		
		$type = $this->uri->segment ( 3 ); // Type
		/*
		 * Character/ num
		 */
		$chartype = $this->uri->segment ( 4 );
		$this->data ['chartype'] = $chartype;
		$page = $this->uri->segment ( 6, 0 ); //
		$this->data ['page'] = $page;
		$config ["uri_segment"] = 6;
		$config ['per_page'] = $this->uri->segment ( 5, 20 );
		$this->data ['per_page'] = $config ['per_page'];
		$config ['first_link'] = 'First';
		
		$config ['full_tag_open'] = "<div class='pagination'>";
		$config ['full_tag_close'] = "</div>";
		
		$config ['num_links'] = 5;
		switch ($type) {
			case 'en' :
				$config ['base_url'] = base_url () . "index.php/gmailemail/viewemail/" . $type . "/" . $chartype . "/" . $config ['per_page'];
				$config ['total_rows'] = $this->modelemail->getValidEmailsCount ( $chartype );
				//print $config ['total_rows'] ;exit;
				$this->data ['total_rows'] = $config ['total_rows'];
				$this->pagination->initialize ( $config );
				$emailList = $this->modelemail->getValidEmails ( trim ( $chartype ), $page, $config ['per_page'] );
				$this->data ['emailList'] = $emailList;
				$this->data ['pagelink'] = $this->pagination->create_links ();
				$this->_renderView ( 'viewemailbynum', $this->data );
				
				break;
			
			case 'ec' :
				$config ['base_url'] = base_url () . "index.php/gmailemail/viewemail/" . $type . "/" . $chartype . "/" . $config ['per_page'];
				$charArray = array ();
				$filename = "test.txt";
				$filename = $chartype . "_character_gmail_addresses.txt";
				$charArray [] = $chartype;
				// echo "<pre>";print_r($charArray);
				$totalcount = 0;
				for($search = 0; $search < count ( $charArray ); $search ++) {
					for($lettercount = $this->config->item ( 'start_letter_count' ); $lettercount <= $this->config->item ( 'end_letter_count' ); $lettercount ++) {
						$totalcount += $this->modelemail->getValidEmailsCount ( $lettercount, $charArray [$search] );
					}
				}
				$config ['total_rows'] = $totalcount;
				$this->data ['total_rows'] = $config ['total_rows'];
				$this->pagination->initialize ( $config );
				$emailList = array ();
				for($search = 0; $search < count ( $charArray ); $search ++) {
					for($lettercount = $this->config->item ( 'start_letter_count' ); $lettercount <= $this->config->item ( 'end_letter_count' ); $lettercount ++) {
						
						$emailListTemp = $this->modelemail->getValidEmails ( $lettercount, $page, $config ['per_page'], $charArray [$search] );
						if (count ( $emailList ) == 0) {
							$emailList = $emailListTemp;
						} else if (count ( $emailListTemp ) == 0) {
							// Nothing do
						} else {
							$emailList = array_merge ( $emailList, $emailListTemp );
						}
					}
				}
				$this->data ['emailList'] = $emailList;
				$this->data ['pagelink'] = $this->pagination->create_links ();
				$this->_renderView ( 'viewemailbychar', $this->data );
				break;
		}
	}
	public function _renderView($page, $data = array()) {
		$this->load->view ( 'emailgmail/' . $page, $data );
	}
}

?>