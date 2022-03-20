<?php

include_once "../utils.php";

$id = "";
$name = "";
$department_id = "";
$photo = "";
$saturday = "";
$sunday = "";
$monday = "";
$tuesday = "";
$wednesday = "";
$thursday = "";
$friday = "";

if (isset($_POST['submit']) && isset($_POST['name'])) {
    $id = _esc($_POST['id']);
    $name = _esc($_POST['name']);
    $department_id = _esc($_POST['department_id']);
    $photo = _esc($_POST['photo']);
    $saturday = _esc($_POST['saturday']);
    $sunday = _esc($_POST['sunday']);
    $monday = _esc($_POST['monday']);
    $tuesday = _esc($_POST['tuesday']);
    $wednesday = _esc($_POST['wednesday']);
    $thursday = _esc($_POST['thursday']);
    $friday = _esc($_POST['friday']);
   
  $sql = "";
  if ($id == '') {
    $sql = "INSERT INTO doctors (name, department_id, photo, saturday,
            sunday, monday, tuesday, wednesday, thursday, friday) VALUES ('$name', '$department_id', '$photo',
            '$saturday', '$sunday', '$monday', '$tuesday', '$wednesday',
            '$thursday', '$friday');";
  } else {
    $sql = "UPDATE doctors SET name='$name', department_id='$department_id',
            photo='$photo', saturday='$saturday', 
            sunday='$sunday', monday='$monday',
            tuesday='$tuesday', wednesday='$wednesday',
            thursday='$thursday', friday='$friday'  WHERE id=$id";
  }
  $con->query($sql);
  header("Location: /hospital/dashboard/doctors.php");
}

$editing = isset($_GET["id"]) && ($_GET["id"] != '');

$TITLE = 'hospital- ' . $editing ? 'Edit doctor data' : 'add doctor';


if ($editing) {
  $id = _esc($_GET["id"]);
  $sql = "SELECT * FROM doctors WHERE id=$id";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $department_id = $row["department_id"];
  $photo = $row["photo"];
  $saturday = $row["saturday"];
  $sunday = $row["sunday"];
  $monday = $row["monday"];
  $tuesday = $row["tuesday"];
  $wednesday = $row["wednesday"];
  $thursday = $row["thursday"];
  $friday = $row["friday"];
 }

 
include "./header.php";
?>

<div class="container pt-4">
  <div class="card">
    <div class="card-body">
      <h4 class="text-center">Doctor's data</h4>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="needs-validation" novalidate>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
          <label for="name" class="form-label">name</label>
          <input type="text" class="form-control" id="name" name="name" required value="<?= $name ?>">
        </div>
        <div class="mb-3">
          <label for="department_id" class="form-label">department</label>
          <select class="form-select" id="departments" name="department_id" required>
            <option value="" <?= $department_id == "" ? 'selected' : '' ?>></option>
            <?php
            $sql = "SELECT * FROM departments;";
            $departments = mysqli_query($con, $sql);
            while ($row = $departments->fetch_assoc()) { ?>
              <option value="<?= $row["id"] ?>" <?= $department_id == $row["id"] ? 'selected' : '' ?>><?= $row["name"] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">photo</label>
          <input type="text" class="form-control" id="photo" name="photo" required value="<?= $photo ?>">
        </div>
        <div class="mb-3">
          <label for="saturday" class="form-label">saturday</label>
          <input type="text" class="form-control" id="saturday" name="saturday" required value="<?= $saturday ?>">
        </div>
        <div class="mb-3">
          <label for="sunday" class="form-label">sunday</label>
          <input type="text" class="form-control" id="sunday" name="sunday" required value="<?= $sunday ?>">
        </div>
        <div class="mb-3">
          <label for="monday" class="form-label">monday</label>
          <input type="text" class="form-control" id="monday" name="monday" required value="<?= $monday ?>">
        </div>
        <div class="mb-3">
          <label for="tuesday" class="form-label">tuesday</label>
          <input type="text" class="form-control" id="tuesday" name="tuesday" required value="<?= $tuesday ?>">
        </div>
        <div class="mb-3">
          <label for="wednesday" class="form-label">wednesday</label>
          <input type="text" class="form-control" id="wednesday" name="wednesday" required value="<?= $wednesday ?>">
        </div>
        <div class="mb-3">
          <label for="thursday" class="form-label">thursday</label>
          <input type="text" class="form-control" id="thursday" name="thursday" required value="<?= $thursday ?>">
        </div>
        <div class="mb-3">
          <label for="friday" class="form-label">friday</label>
          <input type="text" class="form-control" id="friday" name="friday" required value="<?= $friday ?>">
        </div>
        <div class="text-center">
          <input class="btn btn-primary" type="submit" name="submit" value="save" />
          <?php if (isset($error)) { ?>
            <div class="form-text text-danger"><?= $error ?></div>
          <?php } ?>
        </div>
      </form>
    </div>
  </div>
</div>

<?php

include "./footer.php";
