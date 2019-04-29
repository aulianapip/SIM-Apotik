<?php  session_start();
if(isset($_SESSION['USERNAME']))
{
    session_destroy();
    echo"<script>document.location='index.php';</script>";
}else{
    session_destroy();
    echo"<script>document.location='index.php';</script>";
}
?>