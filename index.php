<!-- fitur menampilkan semua data pelanggan yang tergabung dalam member, dan UI utama CRM menggantikan pelanggan.php-->


<?php 

    // query dan alert dikerjakan oleh rizka arnanda s 170001248 dan dimodify oleh carto ardiyanto 1700018283

    include('conect.php');  // memanggil file connect.php untuk terhubung kedalam database
   if (isset($_POST['Cari'])) {  // syntax post untuk mendapatkan data $tgl_awal dan $akhir yang nantinya digunakan untuk menampilkan data member berdasarkan rentang waktu terdaftar menjadi member

  if(isset($_GET['pesan'])){ // line 10-24 untuk mendapatkan pesan jika setelah ditampilkan berdasarkan rentang waktu lalu ada yang akan di edit/ dihapus, setelah selesai mengedit dan menghapusnya akan keluar alert Berhasil dihapus jika Hapus dan Berhasil diupdate jika edit 
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
    
    $tgl_awal= $_POST['tgl_awal']; // variable berisi method post mendapatkan data tgl_awal user yang dipilih
    $tgl_akhir= $_POST['tgl_akhir']; //variable berisi method post mendapatkan data tgl_akhir user yang dipilih


  $q1="SELECT * from pelanggan where tgl_daftar between '$tgl_awal' and '$tgl_akhir'"; //query menampilkan data member berdasarkan rentang waktu
  $SQL=mysqli_query($connect,$q1); // sebuah function untuk menjalankan query tsb
  
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
    <title>CRM APOTEK</title>
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

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: black;
    background-color: pink;
    background-image: none;
    border-color: #ddd;
}
.header {
  overflow: hidden;
  background-color: pink;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
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

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> <!-- memanggil bootsrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- line  192-192 pemanggilan jquery -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <div class="dropdown"> <!-- bootsrap untuk pop up dropdown -->
    <button class="btn btn-primary "  data-toggle="dropdown">Cari Berdasarkan rentang tanggal 
    <span class="caret"></span></button> <!-- button dengan bootsrap -->
    <ul class="dropdown-menu" > <!--  bootsrap menu (pop up) -->
      <li>
      <label for="tgl_awal">Dari Tanggal</label>      
      <input type="date" id="tgl_awal" name="tgl_awal">&nbsp; <!-- input untuk data dari tanggal (mulai tanggal rentang) -->
      <label for="tgl_akhir">Sampai Tanggal</label>
      <input type="date" id="tgl_akhir" name="tgl_akhir"> <!-- input data sampai tanggal rentang -->
      </li>
      
        <ul>
      <input type="submit" name="Cari" value="Cari" class="button">  <!-- button submit  -->
      </ul>
      <ul>
      <a href="index.php"><input type="submit"  value="Refresh" class="button"></input></a> <!-- sebuah button untuk kembali ke tampilan keseluruhan data member  -->
      <!-- line 190-210 dibuat rizka arnanda s 170001248 dan dimodify oleh Carto Ardiyanto, modifikasi meliputi ui bootsrap, dan refrsh -->
      </ul>
    </ul>  
 
 </div>
 <br>
<a href="selectdelete.php">PILIH</a>

  
  
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