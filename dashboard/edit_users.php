<?php

include_once "../utils.php";

$id = "";
$name = "";
$email = "";
$pass = "";

if (isset($_POST['submit']) && isset($_POST['name'])) {
  $id = _esc($_POST['id']);
  $name = _esc($_POST['name']);
  $email = _esc($_POST['email']);
  $pass = _esc($_POST['password']);

  $sql = "";
  if ($id == '') {
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$pass');";
  } else {
    $sql = "UPDATE users SET name='$name', email='$email', password='$pass' WHERE id=$id";
  }
  $con->query($sql);
  header("Location: /hospital/dashboard/users.php");
}

$editing = isset($_GET["id"]) && ($_GET["id"] != '');

$TITLE = 'منظومة المستشفيات - ' . $editing ? 'تعديل بيانات المستخدمين' : 'إضافة مستخدم ';

if ($editing) {
  $id = _esc($_GET["id"]);
  $sql = "SELECT * FROM users WHERE id=$id";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $email = $row["email"];
  $pass = $row["password"];
}

include "./header.php";
?>

<div class="container pt-4">
  <div class="card">
    <div class="card-body">
      <h4 class="text-center">بيانات المستخدم</h4>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="needs-validation" novalidate>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
          <label for="name" class="form-label">اسم المستخدم</label>
          <input type="text" class="form-control" id="name" name="name" required value="<?= $name ?>">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label"> ايميل المستخدم</label>
          <input type="text" class="form-control" id="email" name="email" required value="<?= $email ?>">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">كلمة المرور</label>
          <input type="password" class="form-control" id="password" name="password" required value="<?= $pass ?>">
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
