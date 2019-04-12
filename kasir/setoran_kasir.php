<?php
if(session_status()!==2)session_start();//>=php 5.4
if(!isset($_SESSION['SES_LOGIN'])){
	header('location:../home');
 }
//require_once "../library/inc.connection.php";
//require_once "../library/inc.library.php";
$user_id=$_SESSION['SES_LOGIN'];
opendb();



?>


<div class="main">  
  <div class="main-inner">
    <div class="container">
	<span id="alertMsg"></span>
    	<span id="dataTambahUbah"></span>

    		<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-copy"></i>
              <h3>Setoran Kasir</h3>

            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 

				<form class="form-inline" name="formKasirSetoran" id="formKasirSetoran">
							<div class="form-group">
								<label for="tgl awal">Tgl Awal :</label>
								<select class="form-control input-sm" name="tglAwal" id="tglAwal">
									<?php 
										for($i=1;$i<=31;$i++){
											if($i<10){$i="0".$i;}
											echo "<option value='".$i."'>".$i."</option>";
										}
									?>	
								</select>
								<select class="form-control input-sm" name="blnAwal" id="blnAwal">
									<?php 
										for($i=1;$i<=12;$i++){
											if($i<10){$i="0".$i;}
											echo "<option value='".$i."'>".$i."</option>";
										}
									?>	
								</select>
								<select class="form-control input-sm" name="thnAwal" id="thnAwal">
									<?php 
										for($i=2013;$i<=date('Y');$i++){
											if($i==date("Y")){$plh='selected';}	
											if($i<10){ $i="0".$i; }
											echo"<option value=".$i." ".$plh.">".$i."</option>";
										}
									?>
										
								</select>
							</div>
							<div class="form-group">
								<label for="tgl awal">Tgl Akhir :</label>
								<select class="form-control input-sm" name="tglAkhir" id="tglAkhir">
									<?php 
										for($i=1;$i<=31;$i++){
											if($i<10){$i="0".$i;}
											
											echo "<option value='".$i."'>".$i."</option>";
										}
									?>	
								</select>
								<select class="form-control input-sm" name="blnAkhir" id="blnAkhir">
									<?php 
										for($i=1;$i<=12;$i++){
											
											if($i<10){$i="0".$i;}
											if($i==date("m")){$plh='selected';}	
											echo "<option value='".$i."' ".$plh.">".$i."</option>";
										}
									?>	
								</select>
								<select class="form-control input-sm" name="thnAkhir" id="thnAkhir">
									<?php 
										for($i=2013;$i<=date('Y');$i++){
											if($i==date("Y")){$plh='selected';}	
											if($i<10){ $i="0".$i; }
											echo"<option value=".$i." ".$plh.">".$i."</option>";
										}
									?>
										
								</select>
							</div>
							
								<label for="tgl awal">User :</label>
								<input type="text" class="form-control input-sm" name="user" id="user" value="<?php echo $user_id?>" size="5">
							
							<button class="btn btn-info btn-sm" id="btnKasirSetoran">Cari</button>
						</form>
						<br>

						<div class="table-responsive">
							<span id="tblPlaceHolder">
								<table class="table table-bordered table-condensed">
									<tr>
										<th>No</th>
										<th>No. Faktur</th>
										<th>Tanggal</th>
										<th>Nilai Penjualan</th>
									</tr>
									<tr>
										<td colspan="3" align='center'><b>Total</b></td>
										<td></td>
									</tr>
								</table>	
							</span>
						</div>

              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <!-- span -->
      </div>
    	
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->


