
<?php 
 if(!isset($_SESSION['SES_LOGIN'])){
	header('location:home');
 }
require_once "library/inc.connection.php";
require_once "library/inc.library.php";
opendb();
//cari data toko
   $qri = "SELECT * FROM nama_toko";
   $res = querydb($qri);
   $rec = arraydb($res);
   $namaToko = $rec['nm_toko'];
   $alamatToko = $rec['almt_toko'];
   $kota = $rec['kota'];
   $logoToko   = $rec['logo'];
   $telpToko   = $rec['tlp_toko'];
   $faxToko   = $rec['fax_toko'];
?>	
    
      <div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-cog"></i>
              <h3>Pengelolaan</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <br>
              <div class="shortcuts"> 
                <!-- <a href="?page=tambah_pagu" class="shortcut">
                  <i class="shortcut-icon icon-list-alt"></i>
                  <span class="shortcut-label">Tambah Pagu</span> 
                </a> -->
              
	//method digunakan sebagai akses untuk membuka menu penjualan maupun setoran 
		      
                <a href="?open=penjualan" class="shortcut">
                  <i class="shortcut-icon  icon-shopping-cart"></i>
                  <span class="shortcut-label">Penjualan</span> 
                </a>

                <a href="?open=setoran" class="shortcut">
                  <i class="shortcut-icon icon-table"></i>
                  <span class="shortcut-label">Setoran</span> 
                </a>

              </div>
              <!-- /shortcuts --> 
              <br>
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <!-- span -->
      </div>
      <!-- row -->


      
	
