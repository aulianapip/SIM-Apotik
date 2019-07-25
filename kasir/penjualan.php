//Nama	: Nurul Ika praptiwi
//Nim	: 1700018254
//Kelas	: E

//Kelas ini digunakan sebagai tampilan dasar dari menu penjualannya

<?php
if(session_status()!==2)session_start();//>=php 5.4
if(!isset($_SESSION['SES_LOGIN'])){
	header('location:../home');
 }
	$user_id=$_SESSION['SES_LOGIN'];


	$tgl = date("d-m-Y");

	//hitung total penjualan saat ini	
	$ttlJual = ttlJual($user_id);
	
	//buat no faktur
	$thn = date("y");
	$bln = date("m");
	$hri = date("d");


	$qri = "SELECT MAX(no_faktur) AS no_faktur FROM penjualan";
	$hsl = querydb($qri);
	$rek = arraydb($hsl);
		$noFaktur1 = substr($rek['no_faktur'],6);
		$noFaktur2 = $noFaktur1 + 1;
		if(strlen($noFaktur2)<5){
			$noFaktur3 = sprintf("%05s",$noFaktur2);
		}
		$noFaktur4 = $thn.$bln.$hri.$noFaktur3;	
			

	//cari data user
	$qri2 = "SELECT * FROM nama_user WHERE id_user='$user_id'";
	$hsl2 = querydb($qri2);
	$rek2 = arraydb($hsl2);
		$namaLengkap = $rek2['nm_lengkap'];
		$username    = $rek2['nm_user'];
		$akses		 = $rek2['akses'];
	


?>


<div class="main">  
  <div class="main-inner">
    <div class="container">
	<span id="alertMsg"></span>
    	<span id="dataTambahUbah"></span>
<br>
    		<div class="row">
    			
     
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-copy"></i>
              <h3>Form Kasir</h3>

            </div>
//method untuk menginputkan data member
 <form  method="POST" action="page.php?open=penjualan">

  	Member : <input type="text" name="inpMember"  data-toggle="tooltip" data-placement="bottom" title="Isi 'ID' jika ada, isi '0' jika tidak ada">
  	&nbsp;<input type="submit" name="submit" class="btn btn-xs btn-info" value="submit">




//method digunakan sebagai pencari data member
  	<?php 
  	$iden=0;
  	$nama1='';


  						if (isset($_POST['inpMember'])) {
  							$inpIdMember=$_POST['inpMember'];
  							$qri3="SELECT Nama, ID,tipe from pelanggan where ID='$inpIdMember' ";
							$hsl3=querydb($qri3);
							while($rek3=arraydb($hsl3)){
								
								
								


								$iden=$rek3['ID'];
								$Member=$rek3['tipe'];
							}

  						}
					

							
	?>

   	</form>


	<?php 
	$idmember=$iden;
	$qri3="SELECT Nama, ID,tipe from pelanggan where ID='$idmember' ";
							$hsl3=querydb($qri3);
							while($rek3=arraydb($hsl3)){
								
								


								$iden=$rek3['ID'];
								$nama1=$rek3['Nama'];
								$Member=$rek3['tipe'];
							}

	 ?>


            <div class="row1">
  <div class="column" style="background-color:#fff;">
    <div class="panel panel-primary alert-info" id="panelPenjualan1">
			<div class="panel-body">
				<form class="form-horizontal" name="formNoFaktur" method="POST" action="penjualan.php">
					
					<p>Invoice&nbsp;&nbsp;: <input type="text" value="<?php echo $noFaktur4?>" name="inpNoFaktur" id="inpNoFaktur" readonly="readonly"></p>
					<p>Member&nbsp;&nbsp;: <input type="text" value="<?php echo $iden?>" name="inpMember" id="inpMember" readonly="readonly"></p>
					<p>Kode Barang&nbsp;&nbsp;&nbsp;: <input type="text" name="inpKodeBarang" id="inpKodeBarang" data-toggle="tooltip" data-placement="right" title="isi kode barang lalu tekan ENTER" ></p>
					<!-- <p>Jumlah&nbsp;&nbsp;&nbsp;: <input type="text" name="inpJumlahBeli" id="inpJumlahBeli" data-toggle="tooltip" data-placement="right" title="isi jumlah barang"></p> -->
				</form>
			</div>
		</div><!-- /panel -->
  </div>


  <div class="column" style="background-color:#fff;">
    <div class="table-responsive">
				<table class="table table-bordered table-condensed table-hover" style="background:#fff;" id="tblPembelian">
						<tr>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Harga<br>(Rp)</th>
							<th>Jumlah<br>(Item)</th>
							<th>Sub Total<br>(Rp)</th>
							<th></th>
						</tr>



						<?php 
							//$jmlbeli=$_POST['inpJumlahBeli'];
							$ttlItem=0;$ttlJual=0;
							$qri="SELECT a.*,b.nama_obat from penjualan_tmp a left join obat b on b.kode_obat = a.kode_obat left join barcode c on c.kode_obat = b.kode_obat where a.user='$user_id'";
							$hsl=querydb($qri);
							while($rek=arraydb($hsl)){
								echo "<tr>";
								echo "<td>".$rek['kode_barcode']."</td>";
								echo "<td>".$rek['nama_obat']."</td>";
								echo "<td align='center'>".number_format($rek['harga'],0,",",".")."</td>";
								echo "<td align='center'>".$rek['jumlah']."</td>";
								echo "<td align='right'>".number_format($rek['sub_total'],0,",",".")."</td>";
								echo "<td align='center'><button class=\"btn btn-danger btn-xs btnHapusJual\" data-val=\"$rek[id]\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Hapus Data\" ><span class=\"shortcut-icon icon-remove\"></span></button></td>";
								echo "</tr>";

								
								$ttlItem = $ttlItem + $rek['jumlah'];
								$ttlJual = $ttlJual + $rek['sub_total'];
							}
						?>

						<?php  

						$m='m';
						$i = strlen($nama1);
						
						if ($ttlJual>30000 && $i>0 ) {
										$ttlJual=($ttlJual-($ttlJual*0.2));
									 }
									else {
										$ttlJual=$ttlJual;
									}

							// if($tipe=='m' and  $ttlItem >= 50000){
							// 	 $ttlItem= $ttlItem-( $ttlItem *0.2);
							//  //hitung kembalian	
							// }
						if(isset($_POST['cash'])){
							
							$m='m';
							$cash=$_POST['cash'];
							$i = strlen($nama1);
							
							if ($ttlJual>30000 && $i>0) {
										$kembali=$cash-($ttlJual-($ttlJual*0.2));
										echo "masuk";
									 }
									else {
										$kembali=$cash-$ttlJual;
										echo "tidak masuk";
									}
										
							}			
						else{
							$kembali=0;	
						}
						 ?>

				</table>
				<div class="table-responsive">
					



				<table class="table table-condensed" id="tblKasir">
					<tr>
						<td><h3>TOTAL</h3></td>
						<td align="right"><h3>Rp</h3></td>

						<td align="right"><h3><?php echo number_format($ttlJual,0,",",".")?></h3></td>
					</tr>
					<tr>
						<td><h3>KEMBALI</h3></td>
						<td align="right"><h3>Rp</h3></td>
						<td align="right"><h3><div id="kembalian"></h3></td>
					</tr>
				</table>
				</div>
				<form name="formKembali" id="formKembali" action="" method="POST">
				Cash <input type="text" name="cash" id="cash" onkeyup="hitung();" />&nbsp;<input type="submit" name="btnKembali" id="btnKembali" class="btn btn-xs btn-info" value="hitung">
				</form>
				<input type="button" value="Print Nota" id="btnCetakFaktur" class="btn btn-xs btn-info" onclick="popup()">&nbsp;&nbsp;<input type="button" value="Selesai" name="btnJualSimpan" id="btnJualSimpan" class="btn btn-xs btn-primary">
				<br>
				<br>

	    //Nama	: Harun Setiaji
	    //Nim	: 1700018271
	    //Kelas	: E
	    
	    //Kelas ini digunakan untuk menampilkan tampilan utama dari kasir 
	    
	    //method ini digunakan sebagai penampil dari data user
				<table class="table table-condensed" id="tblKasir">
					<tr>
						<td>ID User</td>
						<td>:</td>
						<td align="left"><?php echo $user_id?></td>
					</tr>
					<tr>
						<td>Nama User</td>
						<td>:</td>
						<td><?php echo $username?></td>
					</tr>
					<tr>
						<td>Tanggal Akses</td>
						<td>:</td>
						<td><?php echo $tgl?></td>
					</tr>
					<tr>
						<td>Hak Akses</td>
						<td>:</td>
						<td><?php echo $akses?></td>
					</tr>
				</table>
              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
  </div>
</div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
		
        <!-- span -->
      </div>
    	
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->

<script type="text/javascript">
var mywin; 
function popup(){
mywin=window.open("kasir/faktur_penjualan.php?no_faktur=<?php echo $noFaktur4; ?>&cash=<?php echo $cash; ?>","_blank",	"toolbar=yes,location=yes,menubar=yes,copyhistory=yes,directories=no,status=no,resizable=no,width=500, height=400"); mywin.moveTo(100,100);}
</script>

<script>
function hitung() {
      var total = "<?php echo ($ttlJual)?>";
      var cash = document.getElementById('cash').value;
      var result = parseInt(cash) - parseInt(total);
      if (!isNaN(result)) {
         document.getElementById('kembalian').innerHTML= result;
      }
}
</script>
