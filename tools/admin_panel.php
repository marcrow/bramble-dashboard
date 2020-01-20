<?php
if($_SESSION['is_admin']!=1){
	goto end;
}
?>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="section-block" id="cards">
		    <h3 class="section-title">Admin panel</h3>
		    <p>This panel is only accessible by admin user.</p>
		</div>
    </div>
	<!-- ============================================================== -->
	<!-- basic table -->
	<!-- ============================================================== -->
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
	    <div class="card">
			<h5 class="card-header">User table
				<a href="create_account.php" class="btn btn-space btn-light float-right">Create an user</a>
			</h5>
		<div class="card-body">

			<?php
				$mysqli = mysqli_connect("localhost", "web_agent", "password", "bramble");
				if(!$mysqli){
					echo "Error unable to connect to the database";
				}
				else{
				   	echo '<table class="table">
					<thead>
					    <tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Function</th>
						<th scope="col">Last connection</th>
					    </tr>
					</thead>
					<tbody>';
					$query = "SELECT name, is_admin FROM `auth`";
					$result = mysqli_query($mysqli,$query) or die($query . " - " . mysql_error());
					if(mysqli_num_rows($result) > 0 ){
						$i=0;
						while ($tab = mysqli_fetch_array($result)) {
							echo '<tr> <th scope="row">'.$i.'</th>';
							$i=$i+1;
							echo '<td>'.$tab['name'].'</td>';
							if($tab['is_admin']==1)
								echo '<td>Admin</td>';
							else
								echo '<td>User</td>'; 					 	
							$query_last_connection = "SELECT max(date) FROM log WHERE name='".$tab['name']."';";
							$last_connection = mysqli_query($mysqli,$query_last_connection);
							$result2 = mysqli_fetch_assoc($last_connection);
							echo '<td>'.$result2['max(date)'].'</td>';
							//echo '<td><a><i class="fas fa-times"></i></td></a>';
							echo '</tr>';
						}
						echo '</tbody></table>';
					}
				}
			?>
			</div>
		</div>
	</div>
	 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                        <h5 class="card-header">Bramble menu configuration</h5>
            <div class="card-body">
	<form name="menuConf" action="change_menu.php" method="post">
	<label class="custom-control custom-radio custom-control-inline">
        <?php
		$bPath = getenv('BRAMBLE_PATH');
		$cmd = "$bPath/option/src/changeLvl.sh --current";
		$mode = shell_exec($cmd);
	?>
	<input type="radio" name="menuConf" value="Classic" <?php if($mode==0) echo 'checked=""'?> class="custom-control-input"><span class="custom-control-label">Classic</span>
        </label>
        <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="menuConf" value="Light" <?php if($mode==1) echo 'checked=""'?> class="custom-control-input"><span class="custom-control-label">Light</span>
       </label>
		<button type="submit" class="btn btn-success btn-lg btn-block">Change</button>
	</form>
	</div>
	</div>

</div>
<?php
	end:
?>
