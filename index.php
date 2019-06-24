<!-- Amanda Fahmidyna -->

<?php
require_once('database/db.php');
include "navbar_cashflow.php";
// $q = "select * from transaksi_detail";
if(isset($_GET['tanggal_awal']) and isset($_GET['tanggal_akhir'])) {
    $awal = $_GET['tanggal_awal'];
    $akhir = $_GET['tanggal_akhir'];
    $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat where tabel_penjualan.tanggal_terjual between '$awal' and '$akhir' order by tabel_penjualan.tanggal_terjual asc";
    $sql = mysqli_query($connect, $q);

   // $q = "SELECT sum(harga*jumlah_terjual) as total from tabel_penjualan where tanggal_terjual between '$awal' and '$akhir'";
   // $sql2 = mysqli_query($connect, $q);

    $q= "SELECT jumlah as kas from kasawal";
    $sql3=mysqli_query($connect,$q);
   // $result = mysqli_fetch_object($sql2);
   // $total_saldo = $result->total;
   // $total = $total_saldo;
    $res=mysqli_fetch_object($sql3);
    $modal = $res->kas;
    $kas=$modal;
} else {
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat or tabel_penjualan.lain = NULL order by tabel_penjualan.tanggal_terjual asc";
$sql = mysqli_query($connect, $q);

//$q = "SELECT sum(harga*jumlah_terjual) as total from tabel_penjualan";
//$sql2 = mysqli_query($connect, $q);

$q= "SELECT jumlah as kas from kasawal";
$sql3=mysqli_query($connect,$q);
//$result = mysqli_fetch_object($sql2);
//$total_saldo = $result->total;
//$total = $total_saldo; 
$res=mysqli_fetch_object($sql3);
$modal = $res->kas;
$kas=$modal;  
}
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bulma.min.css">
    <title>Cashflow Statement</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container py-4">
        <form action="index.php" method="get" onsubmit="return isValid()">
            <div class="row">
                <div class="col-4 mb-3">
                    <div class="form-group">
                        <label for="awal">Tanggal Awal</label>
                        <input type="date" class="form-control" id="awal" name="tanggal_awal">
                    </div>
                </div>
                <div class="col-4 mb-3">
                    <div class="form-group">
                        <label for="akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="akhir" name="tanggal_akhir">
                    </div>
                </div>
                <div class="col-4 mb-3">
                    <a href="index.php" class="btn btn-success float-right mx-3" style="margin-top: 33px">Semua</a>
                    <button type="submit" class="btn btn-primary float-right" style="margin-top: 33px"> Cari berdasarkan filter</button>
                </div>
            </div>
        </form>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table">
                    <thead>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th>Jumlah</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Subtotal</th>
                        <th>Saldo</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                Saldo Awal
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <?php echo "Rp " . $kas; ?>
                            </td>
                        </tr>
                        <?php
                        foreach ($sql as $data) { ?>
                            <tr>
                                <td>
                                    <?php echo $data['tanggal']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data['jenis'] == 'debit')

                                        echo  $data['nama'];
                                   
                                   
                                    else if ($data['jenis'] == 'kredit') {
                                   
                                        echo  $data['trans'];
                                        echo $data['nama'];
                                    }
                                    ?>
                                </td>
                             
                                <td>
                                    <?php echo $data['jumlah']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data['jenis'] == "debit")
                                        echo "Rp " . $data['harga'];
                                    else
                                        echo '0';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data['jenis'] == "kredit")
                                        echo "Rp " . $data['harga'];
                                    else
                                        echo '0';
                                    ?>
                                </td>
                                <td><?php
                                    echo "Rp " . $data['jumlah'] * $data['harga'];
                                    ?></td>
                                <td>
                                    <?php
                                    if ($data['jenis'] == "debit") {
                                        $kas += $data['harga'] * $data['jumlah'];
                                    } else {
                                        $kas -= $data['harga'] * $data['jumlah'];
                                    }

                                    echo "Rp " . $kas;
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script>
      let awal = document.getElementById('awal');
      let akhir = document.getElementById('akhir');

      const isValid = () => {
        if(awal.value == '' || akhir.value == '') {
            Swal.fire('Oops!', 'Kolom filter tidak boleh ada yang kosong!', 'warning');
            return false;
        }
        
        return true;
      }
  </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>