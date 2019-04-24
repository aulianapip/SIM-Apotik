<?php 
    include('conect.php');

    
   if (isset($_POST['Cari'])) {

  if(isset($_GET['pesan'])){
    $pesan=$_GET['pesan'];
    if($pesan=="Hapus"){
      echo "<center>
        Berhasil dihapus !
      </center>";
    }
    else if($pesan=="Edit"){
      echo "
      <center>
      Berhasil diupdate !
      </center>
      ";

    }
  }
    include 'fungsi_indotgl.php';
    $tgl_awal= $_POST['tgl_awal'];
    $tgl_akhir= $_POST['tgl_akhir'];


  $q1="SELECT * from pelanggan where tgl_daftar between '$tgl_awal' and '$tgl_akhir'";
  $SQL=mysqli_query($connect,$q1);
  
  }
  else if(isset($_POST['Refresh'])){
    echo "<meta http-equiv='refresh' content='1 url=pelanggan.php'>";
  }
  else{

  if(isset($_GET['pesan'])){
    $pesan=$_GET['pesan'];
    if($pesan=="Hapus"){
      echo "<center>
        Berhasil dihapus !
      </center>";
    }
    else if($pesan=="Edit"){
      echo "
      <center>
      Berhasil diupdate !
      </center>
      ";

    }
  }

  $SQL = mysqli_query($connect, "SELECT * FROM pelanggan ORDER BY Nama DESC");
    
  }

?>
<!DOCTYPE html>
<html>
  <head>
  <script type="text/javascript">
          $(document).ready(function(){
            $("tgl_awal").datepicker({
              altFormat:"dd MM yy",
              changeMonth : true,
              changeYear : true
            });
            $("#tgl_awal").change(function() {
              $("#tgl_awal").datepicker("option","dateFormat","yy-mm-dd");
            });
          });
        </script>
        <script type="text/javascript">
          $(document).ready(function(){
            $("tgl_akhir").datepicker({
              altFormat:"dd MM yy",
              changeMonth : true,
              changeYear : true
            });
            $("#tgl_awal").change(function() {
              $("#tgl_akhir").datepicker("option","dateFormat","yy-mm-dd");
            });
          });
          //line 4-26 dibuat rizka
        </script>

    <title>CRM APOTEK</title>
    <!--link boostrap-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="description" content="Demo project with jQuery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
 

<!-- untuk bagian UI dikerjakan Aditiya Aziz saputra 17000182233 dan Alfian Noor 1700018233 -->

 <!-- ini merupakan fungsi dan query membuat bagian Navbar -->
body{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; 
  border-collapse: collapse;
  width: 100%;
}

 td {
  border: 1px solid #ddd;
  padding: 8px;
  
  text-align: left;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: pink;
    border-color: pink;
}

label {
    display: inline-block;
    margin-top: 1rem;
    margin-bottom: .5rem;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}


}
}

</style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
<!-- Mengatur Layout Dengan CSS -->
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: black;
    background-color: pink;
    background-image: none; <!-- untuk menentukan waran back ground -->
    border-color: #ddd; <!-- untuk warna pebatas-->
}
<!-- ini merupakan fungsi dan query membuat bagian Navbar -->
.header {
  overflow: hidden;
  background-color: pink;
  padding: 20px 10px;
}
.header a {   <!-- fungsi untuk bagian header tampilan-->
  float: left;
  color: black; <!-- untuk bagian  warna : hitam-->
  text-align: center; <!-- untuk perataan texs : tengah -->
  padding: 12px;    
  text-decoration: none; <!-- untuk teks-dekorasi : tidak ada-->
  font-size: 18px;  <!-- untuk ukuran huruf-->
  line-height: 25px;  <!-- garis tinggi-->
  border-radius: 4px; <!-- batas-rasius-->
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active [type=submit]:hover {
  background-color: pink;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
  </head>
  <body>

<!-- kepala -->
<div class="header">
  <a href="#default" class="logo">CRM APOTEK</a>
  <div class="header-right">
    <a class="active" href="index.php">Home</a>
    <a href="inputdata.php">Input Data</a>
<div>
</div>
</div>
</div>

    <!-- Badan -->
    <div>
       <form method="post" action="index.php">
  <div>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <div class="dropdown">
    <button class="btn btn-primary "  data-toggle="dropdown">Cari Berdasarkan rentang tanggal
    <span class="caret"></span></button>
    <ul class="dropdown-menu" >
      <li>
      <label for="tgl_awal">Dari Tanggal</label>
      <input type="date" id="tgl_awal" name="tgl_awal">&nbsp;
      <label for="tgl_akhir">Sampai Tanggal</label>
      <input type="date" id="tgl_akhir" name="tgl_akhir"> 
      </li>
      
        <ul>
      <input type="submit" name="Cari" value="Cari" class="button"> <!--dibuat  carto -->
      </ul>
      <ul>
      <a href="index.php"><input type="submit"  value="Refresh" class="button"></input></a><!-- dibuat carto -->  
      </ul>
    </ul>  
 
 </div>
 <br>
<a href="selectdelete.php">PILIH</a>
  <!-- line 138-142 dibuat rizka -->
  
  
 </div>
  </form>
    </div>
    <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="1 ">
        <thead>
            <tr>
                <td width="10%">Tanggal Terdaftar</td>
                <td width="10%">ID</td> 
                <td width="10%">Nama</td>
                <td width="10%">Jk</td>
                <td width="10%">NoHp</td>
                <td width="10%">Email</td>
                <td width="30%">Alamat</td>
                <td width="10%">Opsi</td>
            </tr>
        </thead>
        
        <tbody>
            <?php   while($data = mysqli_fetch_array($SQL)){ ?>
                <tr>
                    <td><?= $data['tgl_daftar'] ?></td>
                    <td><?= $data['ID'] ?></td>
                    <td><?= $data['Nama'] ?></td>
                    <td><?= $data['Jk'] ?></td>
                    <td><?= $data['NoHp'] ?></td>
                    <td><?= $data['Email'] ?></td>
                    <td><?= $data['Alamat'] ?></td>
                    <td><a href='formedit.php?ID=<?php echo $data['ID']; ?>'><input type="image" src="edit.png" width="20" height="20"/></a>
                    <a href='hapus.php?ID=<?php echo $data['ID']; ?>'><input type="image" src="delete.png" width="20" height="20"/></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>

    
  </body>
</html>