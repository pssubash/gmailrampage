<div id="nav">
			<ul>
				
				<li class="upp"><a href="#">Email List</a>
					<ul>
						<li>&#8250; <a href="<?php echo base_url()?>index.php/gmailemail/emailbynum">Email By Permutation</a></li>
						<li>&#8250; <a href="<?php echo base_url()?>index.php/gmailemail/emailbychar">Email By Character</a></li>
						
					</ul>
				</li>
				<?php if(!empty($userrole) && $userrole == 'admin') {?>
				<li class="upp"><a href="#">Users</a>
					<ul>
						<li>&#8250; <a href="<?php echo base_url()?>index.php/users/index">Show all uses</a></li>
						<li>&#8250; <a href="<?php echo base_url()?>index.php/users/add">Add new user</a></li>
						
					</ul>
				</li>
				<?php } ?>
				
			</ul>
</div>