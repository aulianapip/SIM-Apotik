<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>
</head>		
<body bgcolor="lightblue">
<h1>Keuntungan Tahun 2017	</h1>

<- Fitur POS, fitur untuk menjalankan fungsi kasir dan operasional penjualan apotik ->

// Nama  : Haykal Eka Putra Gultom
// NIM   : 1700018226
// Kelas : E

// fungsi untuk pencarian berdasar tanggal


// inputan tanggal awal dan akhir
tanggal awal  : <input type="date" name="date1">
tanggal akhir : <input type="date" name="date2">




<?php 

// mengambil data dari hasil inputan

$date1=$_POST['date1'];
$date2=$_POST['date2'];

	$QueryString = "SELECT penjualan.tgl_penjualan AS Tanggal_beli, penjualan.no_transaksi AS Invoice, penjualan_detail.kd_barang AS Kode_Barang, nama_obat.nm_barang AS Nama_barang, penjualan_detail.harga AS Harga_satuan, penjualan_detail.jumlah AS Quantity, penjualan_detail.sub_total AS Sub_total FROM penjualan,penjualan_detail,nama_obat WHERE (penjualan.tgl_penjualan BETWEEN $date1 AND $date2) AND penjualan.id=penjualan_detail.id AND nama_obat.kd_barang=penjualan_detail.kd_barang;"  // kode sql between untuk memunculkan data dari tanggal awal dan akhir

	$SQL = mysqli_query($connect,$QueryString); ?>

	<table border="1">
		<tr>
			<th>Harga Barang</th>
			<th>Tanggal Beli</th>
			<th>Invoice</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Harga Barang</th>
			<th>Quantity</th>
			<th>Sub Total</th>
		</tr>
<?php
	foreach ($SQL as $data) {
				echo "
					<tr>
						<td>$data[Harga_barang]</td>
						<td>$data[Tanggal_beli]</td>
						<td>$data[Invoice]</td>
						<td>$data[Kode_barang]</td>
						<td>$data[Nama_barang]</td>
						<td>$data[Harga_barang]</td>
						<td>$data[Quantity]</td>
						<td>$data[Sub_total]</td>
					</tr>
				";
			}
?>
</table>
</body>
</html>