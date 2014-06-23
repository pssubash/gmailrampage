<?php $this->load->view('layout/header');?>
		<div id="main">
			
			
		
			
			<div class="full_w">
				<div class="h_title">Manage Users</div>
				
				
				<div class="entry">
					<div class="sep">
						<?php if($success_message) { 
							echo "<p class='success_message'>$success_message</p>";
						}?>
					</div>
				</div>
				<table>
					<thead>
						<tr>
							<th scope="col">Slno</th>
							<th scope="col">Email</th>
							<th scope="col">Password</th>
							<th scope="col">User</th>
							<th scope="col">Created Date</th>
							
							<th scope="col" style="width: 165px;">Modify</th>
						</tr>
					</thead>
						<?php //print_r($userlist);exit;?>
					<?php if($userlist != false && count($userlist) > 0 ) { ?>
					<tbody>
						<?php $slno = count($userlist);?>
						<?php foreach ($userlist as $usrlist) { ?>
							<?php 
								echo "<tr>";
									echo "<td class='align-center'>".$slno--."</td>";
									echo "<td>".$usrlist['usr_email']."</td>";
									echo "<td>".$usrlist['usr_password']."</td>";
									echo "<td>".$usrlist['usr_role']."</td>";
									echo "<td>".$usrlist['usr_created']."</td>";
									echo "<td>";
										echo "<a href='". base_url()."index.php/users/add/".$usrlist['usr_id']."' class='table-icon edit' title='Edit'></a> ";
										echo "<a href='". base_url()."index.php/users/delete/".$usrlist['usr_id']."'' class='table-icon delete' title='Delete'></a> ";
										echo "<a href='". base_url()."index.php/users/loginasuser/".$usrlist['usr_id']."'' class='table-icon loginas' target='_blank' title='Login As User'></a> ";
									echo "</td>";
								echo "</tr>";
							?>
						<?php } ?>
						</tbody>
					<?php } ?>
				
				</table>
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