
<!-- query send email dikerjakan oleh Alfian Noor 1700018233 -->
<?php
/*fungsi untuk menampilan data penerima, subjek , attachFile dan pesan*/
   $penerima=$_POST['penerima'];
     $subyek=$_POST['subyek'];
     $attachFile=$_POST['attachFile'];
     $pesan=$_POST['pesan'];
     $pesan=wordwrap($pesan,70);
    /* code menggunakan web hosting supaya bisa terkirim */ 
     $header="From: no-reply@saidalfaruq.net\r\n";
     $header.="MIME-Version: 1.0\r\n";
     $header.="Content-Type: text/html; charset=ISO-8859-1\r\n";
    /*script data yang ingin dikirim dari inputan from data, seperti subjek, pesan, attachFile*/
    $kirim=mail($penerima,$subyek,$pesan,$attachFile,$header);
    /*jika data benar maka file atau data terkirim, namun jika tidak benar atau valid maka file atau data tidak terkirim*/
    if($kirim==true){
      echo "Pesan email berhasil dikirim.";
    }else{
      echo "Pesan email gagal dikirim.";
    }
 ?>