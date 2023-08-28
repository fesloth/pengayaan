<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
</head>

<body style="background-color: #afafaf">
  <nav style="margin: 30px; padding-left: 25px; background-color: #777777" class="navbar navbar-light navbar-expand-lg rounded-2">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="transaksi.php">Transaksi</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li style="padding-right: 25px" class="nav-item">
            <a class="nav-link" onclick="confirmLogout()" href="../index.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section>
    <div style="margin: 30px" class="image">
      <img src="../assets/header.jpg" class="w-100 rounded-2" />
    </div>
  </section>
  <section>
    <h3 class="m-5">Daftar Paket Laundry</h3>
  </section>
  <section style="display: flex; flex-wrap: wrap; justify-content: space-evenly; margin: 30px">
    <?php
    // Array of data for packages
    $datapaket = array(
      array("Paket A, Cuci kering biasa", "Cuci kering biasa", 40000),
      array("Paket B, Cuci kering dan lipat", "Cuci kering dan lipat", 45000),
      array("Paket C, Cuci kering, setrika, dan lipat", "Cuci kering, setrika, dan lipat", 50000),
      array("Paket D, Cuci kering, setrika, pengharum, dan lipat", "Cuci kering, setrika, pengharum, dan lipat", 55000)
    );

    // Loop through the data and create cards for each package
    foreach ($datapaket as $package) {
      $namaPaket = $package[0];
      $deskripsiPaket = $package[1];
      $hargaPaket = $package[2];
    ?>
      <div class="d-flex flex-row">
        <div class="d-flex flex-column">
          <div class="card" style="width: 18rem; height: 300px">
            <img src="../assets/baju.png" class="card-img-top" />
            <div class="card-body">
              <p class="card-text">
                <?php echo $deskripsiPaket; ?><br />
                Rp.
                <?php echo $hargaPaket; ?>
              </p>
            </div>
          </div>
          <div class="button text-center mt-2">
            <a href="transaksi.php?paket=<?php echo urlencode($namaPaket); ?>&harga=<?php echo $hargaPaket; ?>" class="btn btn-secondary col-lg-12">PILIH PAKET</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
  <footer style="padding-top: 20px">
    <div class="footer">
      <p style="margin: 30px; background-color: #777777" class="rounded-2 p-3 text-center">© copyright Syahla Nur Azizah</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="../src/script.js"></script>
</body>

</html>