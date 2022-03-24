<?php

include_once "../utils.php";

$id = "";
$name = "";
$description = "";
$photo = "";


if (isset($_POST['submit']) && isset($_POST['name'])) {
    $id = _esc($_POST['id']);
    $name = _esc($_POST['name']);
    $description = _esc($_POST['description']);
    $photo = _esc($_POST['photo']);
  
   
  $sql = "";
  if ($id == '') {
    $sql = "INSERT INTO departments (name, description, photo
            ) VALUES ('$name', '$description', '$photo');";
  } else {
    $sql = "UPDATE departments SET name='$name', description='$description',
            photo='$photo'  WHERE id=$id";
  }
  $con->query($sql);
  header("Location: /hospital/dashboard/departments.php");
}

$editing = isset($_GET["id"]) && ($_GET["id"] != '');

$TITLE = 'hospital- ' . $editing ? 'Edit departments data' : 'add departments';


if ($editing) {
  $id = _esc($_GET["id"]);
  $sql = "SELECT * FROM departments WHERE id=$id";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $description = $row["description"];
  $photo = $row["photo"];
 }

 
include "./header.php";
?>

<div class="container pt-4">
  <div class="card">
    <div class="card-body">
      <h4 class="text-center">departments's data</h4>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="needs-validation" departments>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
          <label for="name" class="form-label">name</label>
          <input type="text" class="form-control" id="name" name="name" required value="<?= $name ?>">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">description</label>
          <input type="text" class="form-control" id="description" name="description" required value="<?= $description ?>">
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">photo</label>
          <input type="text" class="form-control" id="photo" name="photo" required value="<?= $photo ?>">
        </div>
        <div class="text-center">
          <input class="btn btn-primary" type="submit" name="submit" value="حفظ" />
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
