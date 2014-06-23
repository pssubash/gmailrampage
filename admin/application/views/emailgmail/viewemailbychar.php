<?php $this->load->view('layout/header');?>
<!--  <script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>-->
<div id="main">




	<div class="full_w">
		<div class="h_title">Emails By Permutation</div>


		<div class="entry">
		
		<div class="pagination">
						<b>Number of records per page</b>
						
						<a href="<?php echo base_url()?>index.php//gmailemail/viewemail/ec/<?php echo $chartype?>/50">50</a>
						<a href="<?php echo base_url()?>index.php//gmailemail/viewemail/ec/<?php echo $chartype?>/100">100</a>
						<a href="<?php echo base_url()?>index.php//gmailemail/viewemail/ec/<?php echo $chartype?>/500">500</a>
						
						
					</div>
			<div class="sep"><?php echo $chartype." Character Valid Email Addresses";?></div>
		</div>
		<div id=''>
					<?php
					if (count ( $emailList ) > 0) {
						$str = "<table>";
						$str .= "<thead>";
						$str .= "<tr>";
						$str .= "<th scope='col'>Slno</th>";
						$str .= "<th scope='col'>Email</th>";
						
						$str .= "</tr>";
						$str .= "</thead>";
						$slno = $total_rows;
						if ($page > 0) {
							//$slno = (($pageno-1)*ADMIN_ROWS_PER_PAGE) + 1;
							$slno = ($total_rows-($page));
						}else {
							//$slno = 1;
							$slno = $total_rows;
						}
						foreach ( $emailList as $elist ) {
							$str .= "<tr>";
								$str .= "<td>".$slno--."</td>";
								$str .= "<td>".$elist['email']."</td>";
							$str .= "</tr>";
						}
						$str .= "</table>";
						print $str;
					}
					
					?>
				</div>
<div class="entry">				
<?php print $pagelink;?>
</div>
		<!--  <div class="entry">
					<div class="pagination">
						<span>« First</span>
						<span class="active">1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<span>...</span>
						<a href="">23</a>
						<a href="">24</a>
						<a href="">Last »</a>
					</div>
					<div class="sep"></div>		
					<a class="button add" href="">Add new page</a> <a class="button" href="">Categories</a> 
				</div>-->
	</div>
</div>

<?php $this->load->view('layout/footer');?>