<?php 
    include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: index.php");
      }else{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <title>CAFE LEGEND</title>
  </head>
  <body>

  <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid text-left">
        <div class="container">
          <h1 class="display-4"><span class="font-weight-bold">CAFE LEGEND</span></h1>
          <p> </p>
          <p class="lead font-weight-bold">Silahkan Pesan Menu Sesuai Keinginan Anda <br> 
          Enjoy Your Meal</p>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
                <a class="navbar-brand" href="admin.php"><strong>Cafe</strong> Legend</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active mr-4" aria-current="page" href="admin.php">BERANDA</a></li>
                        <li class="nav-item"><a class="nav-link mr-4" href="logout.php"><strong>LOGOUT</strong></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mr-4" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">LAINNYA</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="daftar_menu.php">DAFTAR MENU</a></li>
                                <li><a class="dropdown-item" href="pesanan.php">PESANAN</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->
    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">DATA PESANAN KONSUMEN</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">ID Pemesanan</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Total Bayar</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php 
            $ambil = mysqli_query($koneksi, 'SELECT * FROM pemesanan');
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
          ?>
          <?php foreach($result as $result) : ?>

          <tr>
            <th scope="row"><?php echo $nomor; ?></th>
            <td><?php echo $result["id_pemesanan"]; ?></td>
            <td><?php echo $result["tanggal_pemesanan"]; ?></td>
            <td>Rp. <?php echo number_format($result["total_belanja"]); ?></td>
            <td>
              
              <a href="detail_pesanan.php?id=<?php echo $result['id_pemesanan'] ?>" class="badge badge-primary">Detail</a>
             

              <a href="clear_pesanan.php?id=<?php echo $result['id_pemesanan'] ?>" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <!-- Akhir Menu -->
    

 <!-- Awal Footer -->
 <div class="footer bg-dark text-center text-white mt-5 p-4 pb-2">
  <section class="mb-1.5">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating mr-3" href="https://web.facebook.com/profile.php?id=100072282159557" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating ml-3" href="https://www.instagram.com/norok_nol/" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
    </section>
  </div>
  <div class="card-footer text-center text-white" style="background-color: rgba(0, 0, 0, 0.9);">
    ?? 2022 Copyright : Designed by 192102135 - Abrari Liwalidina
  </div>
  <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>
  </body>
</html>
<?php } ?>