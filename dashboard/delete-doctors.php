
include_once "../utils.php";

if (isset($_POST["id"])) {
  $id = _esc($_POST["id"]);
  $sql = "DELETE FROM doctors WHERE id=$id";
  $con->query($sql);
}

header("Location: /hospital/dashboard/doctors.php");
