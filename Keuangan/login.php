<!--UPDATE SEASSON LOGIN(REKA RACHMADI APRIANSYAH)-->
<?php 
    session_start();

    if (isset($_SESSION["login"])) {
            header("location: http://localhost/Keuangan/Employee/home.php");
            exit;
        }else if (isset($_SESSION["login1"])) {
            header("location: Administration/home.php");
            exit;
        }


    include "Connection/db.php";
    
    if(isset($_POST['login'])){
    $username = $_POST['user'];
    $password = $_POST['password'];
    
    if($username == NULL && $password != NULL){
        $salah = "Username jagan kosong!!";
        echo"<script>alert('$salah')</script>";
    }else if($password == NULL && $username != NULL){
        $salah = "Password jagan kosong!!";
        echo"<script>alert('$salah')</script>";
    }else if($username == NULL && $password == NULL){
        $salah = "Username dan Password jagan kosong!!";
        echo"<script>alert('$salah')</script>";
    }
    else{
    $result = mysqli_query($connect, "SELECT * FROM login WHERE user='$username' ");

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_assoc($result);
            if ($password == $row['password']) {
               if($row['jabatan'] == "karyawan"){
                    $_SESSION["login"] = true ;
                   header("location: Employee/home.php");
                    exit;
                }else if($row['user'] == "admin"){
                    $_SESSION["login1"] = true ;
                   header("location: Administration/home.php");
                    exit;
                }
                else{
                    $salah = "Password yang anda masukan salah !!";
                echo"<script>alert('$salah')</script>";
                }
            }else{
                $salah = "Password yang anda masukan salah !!";
                echo"<script>alert('$salah')</script>";
            }
        }else{
            $salah = "Username dan Password yang anda masukan salah !!";
                echo"<script>alert('$salah')</script>";
        }
    }
}

?>
 <!--Wais Alqorni-->



<html>
<head>
<title>SIM-APOTIK</title>
</head>
	<!--Wais Alqorni-->
    <!--Mempaercantik bagian login-->
<body background="bgw.jpg">
<center>
<table width=100% height=100%>
 <tr>
<td bgcolor=Green align=center height=90& colspan=3>
<font face="serif" color="white" size="10">Selamat Datang</font>
</td>
</tr>
 <tr>
<td bgcolor=white align=center  height=25& colspan=3>
<font face="serif" color="black" size="5">Sistem Informasi Apotik</font>
</td>
</tr>
<tr>
<td bgcolor=white align=center  height=25& colspan=3>
<font face="serif" color="black" size="5"><br><br>LOGIN KEUANGAN</font>
</td>
</tr>

<center><tr>

<td <td bgcolor=white align=center>
<meta charset="utf-8">
<style type="text/css"><center>
    .login {
        margin: 5px auto;
        width: 15%;
        padding: 10px;
        border: 1px solid #ccc;
    }
    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 15%;
        padding: 10px;
    }
    input[type=submit] {
        margin 5px auto;
        float: right;
        padding: 5px;
        width: 90px;
        border: 1px solid #fff;
        color: #fff;
        background: red;
        cursor: pointer;
    }
	</center>
</style>
<!--Membuat form untuk pengisian username dan password-->
<form class="col s12" method="post" action="login.php" align="center">
<div class="container">
<label for="uname"><center><b>USERNAME</b></center></label>
	<input type="text" placeholder="Masukan Username" name="user" >
<br><br>
<label for="psw"><center><b>PASSWORD</b></center></label>
	<input  type="password"  placeholder="Masukan Password" name="password">

<br><br>
<button type="submit" name="login">LOGIN</button>

  </div>

</td>

</tr></center>
</form>
<tr>
<td align=center  height=25& colspan=3>

</td>
</tr>

<tr>
<td bgcolor=Green align=center height=75& colspan=3><font face="serif" color="white" size="5"><marquee behavior="scroll">
Menyehatkan Masyarakat</font></marquee>
</td></tr>
</table>
</center>
</body>
</html>
