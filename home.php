
<link href="css/pages/dashboard.css" rel="stylesheet">
<!--NAMA : FALAKH BURHANUDDIN S
//NIM : 1700018227
//KELAS : PRPL -E

//Fitur POS, fitur untuk menjalankan fungsi kasir dan operasional penjualan apotik 
-->
<div class="main">	
	<div class="main-inner">
    <div class="container">


      <?php 
    //digunakan untuk membedakan akses tiap akun
    switch($levelAkses){
      case "Admin":
        include"menu_admin.php";// menuju akses admin
        break;
      case "Kasir":
        include"menu_kasir.php";// menuju akses kasir
        break;
      default:
        include"menu_all.php";// menuju akses umum
    }
      ?>


      <!-- row -->

    </div> <!-- /container -->
	</div> <!-- /main-inner -->
</div> <!-- /main -->


