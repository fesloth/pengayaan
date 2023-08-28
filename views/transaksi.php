<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <style>
    .custom-alert {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      background-color: #f8f9fa;
      padding: 90px 10px;
      border: 1px solid #e2e3e5;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .custom-alert p {
      margin: auto 0;
      text-align: center;
      font-size: 20px;
      color: #343a40;
    }

    .custom-alert button {
      display: block;
      margin: 20px auto;
      padding: 6px 25px;
      border: none;
      border-radius: 6px;
      background-color: #6c757d;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>

<body style="background-color: #afafaf">
  <nav style="margin: 30px; padding-left: 25px; background-color: #777777;" class="navbar navbar-light navbar-expand-lg rounded-2">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Transaksi</a>
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
  <section style="margin: 30px" class="bg-body-secondary p-5 rounded-2">
    <form action="" method="post">
      <div class="form-group row">
        <label for="noTransaksi" class="col-sm-3 col-form-label">No Transaksi</label>
        <div class="col-sm-4 mb-3">
          <input name="noTransaksi" id="noTransaksi" class="form-control" type="number" />
        </div>
      </div>
      <div class="form-group row">
        <label for="ttgTransaksi" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
        <div class="col-sm-4 mb-3">
          <input name="ttgTransaksi" id="ttgTransaksi" class="form-control" type="date" />
        </div>
        <div class="col-sm-4 mt-3 d-flex align-items-center">
          <div class="d-flex flex-column">
            <div class="d-flex">
              <input name="ttgTransaksi" id="ttgTransaksi1" type="radio" value="0" />
              <label for="ttgTransaksi1" class="col-form-label">Tidak ada tambahan - Rp.0</label>
            </div>
          </div>
          <div class="row">
            <div class="d-flex" style="margin-left: 20px;">
              <input name="ttgTransaksi" id="ttgTransaksi2" type="radio" value="10000" />
              <label for="ttgTransaksi2" class="col-form-label">Pelembut - Rp. 10.000</label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-3 col-form-label">Nama Customer</label>
        <div class="col-sm-4 mb-3">
          <input id="nama" name="nama" class="form-control" type="text" />
        </div>
      </div>
      <div class="form-group row">
        <label for="paket" class="col-sm-3 col-form-label">Pilihan Paket</label>
        <div class="col-sm-4 mb-3">
          <?php
          $selectedPaket = $_GET['paket'] ?? '';
          $selectedHarga = $_GET['harga'] ?? '';
          ?>
          <input id="paket" name="paket" class="form-control" type="text" value="<?php echo $selectedPaket; ?>" />
        </div>
      </div>
      <div class="form-group row">
        <label for="harga" class="col-sm-3 col-form-label">Harga Paket</label>
        <div class="col-sm-4 mb-3">
          <input id="harga" name="harga" class="form-control" type="text" value="<?php echo $selectedHarga; ?>" />
        </div>
        <div class="col-sm-4 mb-3">
          <button class="btn btn-secondary">Hitung Total Harga</button>
        </div>
      </div>
    </form>
  </section>
  <?php
  if (isset($_POST['harga']) && isset($_POST['ttgTransaksi'])) {
    $hargaPaket = floatval($_POST['harga']);
    $additionalPrice = floatval($_POST['ttgTransaksi']);
    $totalHarga = $hargaPaket + $additionalPrice;
  } else {
    $totalHarga = 0;
  }
  ?>
  <section style="background-color: #ccc; margin: 30px" class="p-5 rounded-2">
    <div class="form-group row">
      <label for="total" class="col-sm-3 col-form-label">Total Harga</label>
      <div class="col-sm-4 mb-3">
        <input id="total" name="total" class="form-control" type="text" value="<?php echo $totalHarga; ?>" />
      </div>
    </div>
    <div class="form-group row">
      <label for="pembayaran" class="col-sm-3 col-form-label">Pembayaran</label>
      <div class="col-sm-4 mb-3">
        <input id="pembayaran" name="pembayaran" class="form-control" type="text" />
      </div>
      <div class="col-sm-4 mb-3">
        <p>Kembalian: <span id="kembalian">-</span></p>
      </div>
      <div class="form-group row">
        <label style="margin-left: 6px;" class="col-sm-3 col-form-label"></label>
        <div class="col-sm-4 mb-3">
          <button class="btn btn-secondary" onclick="hitungKembalian()">Hitung Kembalian</button>
        </div>
        <div style="margin-left: 60px;" class="col-sm-4 mb-3 d-flex justify-content-end">
          <button class="btn btn-secondary" onclick="simpanTransaksi()">Simpan Transaksi</button>
        </div>
        <div id="customAlert" class="custom-alert">
          <p>Transaksi Berhasil! <br> Kembali ke Home</p>
          <button id="okeButton">Oke</button>
        </div>
      </div>
    </div>
  </section>
  <footer style="padding-top: 10px">
    <div class="footer">
      <p style="margin: 30px; background-color: #777777;" class="rounded-2 p-3 text-center">© copyright Syahla Nur Azizah</p>
    </div>
  </footer>
  <script src="../src/script.js"></script>
  <script>
    function hitungKembalian() {
      const totalHarga = <?php echo $totalHarga; ?>;
      const pembayaranInput = document.getElementById("pembayaran");
      const pembayaran = parseFloat(pembayaranInput.value);

      if (isNaN(pembayaran) || pembayaran < totalHarga) {
        alert("Pembayaran tidak mencukupi.");
        return;
      }

      const kembalian = pembayaran - totalHarga;
      const kembalianElemen = document.getElementById("kembalian");

      kembalianElemen.textContent = kembalian.toLocaleString("id-ID", {
        style: "currency",
        currency: "IDR"
      });
    }

    document.getElementById("customAlert").style.display = "none";

    function simpanTransaksi() {
      document.getElementById("customAlert").style.display = "block";
    }

    document.getElementById("okeButton").addEventListener("click", function() {
      window.location.href = "dashboard.php";
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>