<?php $this->load->view('layout/header');?>
		<div id="main">
			
			
		
			
			<div class="full_w">
				<div class="h_title">Smtp List</div>
				
				
				<div class="entry">
					<div class="sep">
						<?php if(isset($success_message) && $success_message !== false) { 
							echo "<p class='success_message'>$success_message</p>";
						}?>
					</div>
				</div>
				<p>
					<a href="<?php echo base_url()."index.php/smtpservers/generatecsvtemplate";?>" target="_blank">Download CSV Template</a>&nbsp;|&nbsp;
					<a href="<?php echo base_url()."index.php/smtpservers/importbulk";?>" >Import Bulk</a>
				</p>
				<table>
					<thead>
						<tr>
							<th scope="col">Slno</th>
							<!--  <th scope="col">Smtp Id</th>-->
							<th scope="col">Server Name</th>
							<th scope="col">Host</th>
							<th scope="col">Port</th>
							<th scope="col">Verified Sender</th>
							
							<th scope="col" style="width: 165px;">Options</th>
						</tr>
					</thead>
					<?php 
						if(count($smtps) > 0 && $smtps !== false) {
							echo "<tbody>";
							$slno = 1;
							foreach ($smtps as $smtp) {
								echo "<tr>";
									echo "<td>";
										echo $slno++;
									echo "</td>";
									echo "<td>";
										echo $smtp['smtp_name'];
									echo "</td>";
									
									echo "<td>";
										echo $smtp['smtp_host'];
									echo "</td>";
									
									echo "<td>";
										echo $smtp['smtp_port'];
									echo "</td>";
									
									echo "<td>";
										echo $smtp['smtp_sender'];
									echo "</td>";
									echo "<td>";
										echo "<a class=\"table-icon edit\" title=\"Edit\" href='".base_url()."index.php/smtpservers/edit/".$smtp["smtp_id"]."'></a>";
									echo "</td>";
								echo "</tr>";
							}
							echo "</tbody>";
						}
					?>
						
				
				</table>
			<div class="entry">				
<?php print $pagelink;?>
</div>
			</div>
		</div>

<?php $this->load->view('layout/footer');?>