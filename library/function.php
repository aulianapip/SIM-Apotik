<?php
	class opname{
		function tampil_obat(){
		include "koneksi/koneksi.php";
		$QuerySql = "SELECT * FROM obat";

		$tampil = mysqli_query($konek, $QuerySql);

		foreach ($tampil as $key) {
				echo "<tr>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[Stok_Obat]</td>
						<td>$key[tanggal_input]</td>
				</tr>";
                	
				} 
	}
	function tampil_opname(){
		include "koneksi/koneksi.php";

		$QuerySql = "SELECT opname.kode_obat AS kode_obat,opname.status_obat AS status_obat,-1*(obat_kurang-obat.Stok_Obat) as stok_nyata,obat.nama_obat AS nama_obat FROM opname INNER JOIN obat WHERE opname.kode_obat=obat.kode_obat";

		$tampil = mysqli_query($konek, $QuerySql);

		foreach ($tampil as $key) {
				echo "<tr>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[status_obat]</td>
						<td>$key[stok_nyata]</td>
				</tr>";
                	
				} 	
	}

	} 
 ?>