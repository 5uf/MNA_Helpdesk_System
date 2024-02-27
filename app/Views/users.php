<?php
include "dbconn.php";  // Using database connection file here
$sql="select * from staff where aturan != '0' and bahagian = '29' order by aturan asc ";
$re = mysqli_query($dbconn, $sql);  // Use select query here ?>
<div class="row justify-content-md-center">
<div class="col col-md-6">
	<div class="table-responsive">
		<table class="table table-bordered table-sm table-data1" style="background: white;">
			<thead>
				<th>Nama Pengawai</th>
				<th>Tugasan</th>
			</thead>
			<tbody>
                 <div class="flex-column">
                 <?php while($data = mysqli_fetch_assoc($re)) {
                  echo "<tr><td>". $data['nama'] ."</a> - ". $data['jawatan'] ."</td>
                        <td><a href='". base_url() ."/staff/tasklist/". $data['id_staff'] ." '>Tugasan</a></td></tr>";
          }?> </div>
			</tbody>
		</table>
	</div>