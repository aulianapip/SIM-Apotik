<?php
 session_start();
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

 //cari data user 
 $_SESSION['SES_LOGIN'] ? $user_id = trim($_SESSION['SES_LOGIN']) : $user_id="";
 $_SESSION['USER_LEVEL'] ? $levelAkses = trim($_SESSION['USER_LEVEL']) : $levelAkses="";

 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title><?php echo $namaToko ?> - POS</title>
		
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>
  <header>
  <input type="checkbox" id="tag-menu"/>
  <label class="fa fa-bars menu-bar" for="tag-menu"></label>
      
 

  <div class="jw-drawer">

    <nav>
      <ul>
        
        <li><a href="?open=home"><i class="icon-dashboard"></i>&nbsp;&nbsp;Dashboard</a></li>
        <li><a href="#"><i class="icon-user"></i>&nbsp;&nbsp;Tingkat: <?php echo $_SESSION['USER_LEVEL']; ?></a></li>
        <?php 
        if($_SESSION['USER_LEVEL']=="Super"){
        ?>
        <li><a href="?open=user_data"><i class="icon-group"></i>&nbsp;&nbsp;Hak Akses</a></li>
        <?php 
      }
        ?>
        <li><a href="../SIM-Apotik-pos/CRM/index.php"><i class="icon-dashboard"></i>&nbsp;&nbsp;member</a></li>
        
      </ul>
    </nav>
  </div>

</header>
	<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">

		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="?page=dashboard">

				P.O.S <?php echo $namaToko ?>
			</a>
      <a class="brand" >
      <span style="display:inline-block; width: 250px;"></span>             
      
      
      <a class="brand" href="?page=dashboard">
       -<?php echo $_SESSION['USER_LEVEL']; ?>-
      </a>
			
			<div class="nav-collapse pull-right">
				<ul class="nav pull-right">			
					<li class="dropdown">						
						
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
						</ul>						
					</li>
          <li><a href="#"  style="color: red;"><i class="icon-user"></i><span> <?php echo $_SESSION['USERNAME']; ?></span>  </a> </li>
					<li><a href="#" id="bootbox-confirm" style="color: red;"><i class="icon-off"></i><span> Keluar</span> </a> </li>
				</ul>	
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
	</div> <!-- /navbar-inner -->
</div> <!-- /navbar -->	








        	<?php 
			include"page_control.php";
			?>




<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; <?php echo date('Y'); ?> || <a href="http://researchapps.net/cv/">Aulianapip</a> PRPL</div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--<script src="js/bootstrap-datepicker.js"></script>!-->

	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootbox.min.js"></script>
	<script type="text/javascript">
		jQuery(
		  function($) {
				$( "#bootbox-confirm" ).click(function() {
					bootbox.confirm("Apakah anda yakin ingin keluar?", function(result) {
						if(result) {
							window.location = 'logout.php';
						}
					});
				});
				$('[data-toggle="tooltip"]').tooltip(); 
			}
		  
		);

	
	</script>

	<script src="js/fungsi.js"></script>
</body>

</html>
