//Nama  : Harun Setiaji
//Nim   : 1700018271
//Kelas : E

//kelas ini digunakan sebagai plihan logout atau untuk keluar dari aplikasi

<?php  session_start();
//nantinya setelah logout akan diarahkan ke menu login lagi 
if(isset($_SESSION['USERNAME']))
{
    session_destroy();
    echo"<script>document.location='login.php';</script>";
}else{
    session_destroy();
    echo"<script>document.location='login.php';</script>";
}
?>		
