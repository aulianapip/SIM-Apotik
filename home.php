<link href="css/pages/dashboard.css" rel="stylesheet">

<div class="main">	
	<div class="main-inner">
    <div class="container">


      <?php 
    switch($levelAkses){
      case "Admin":
        include"menu_admin.php";
        break;
      case "Kasir":
        include"menu_kasir.php";
        break;
      default:
        include"menu_all.php";
    }
      ?>


      <!-- row -->

    </div> <!-- /container -->
	</div> <!-- /main-inner -->
</div> <!-- /main -->


