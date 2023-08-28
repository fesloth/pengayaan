function confirmLogout() {
  var confirmation = confirm("Apakah Anda yakin ingin logout?");
  if (confirmation) {
    window.location.href = "../index.php";
  }
}
