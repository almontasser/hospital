<?php

require_once "header.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["user_id"] = $row["id"];
    $_SESSION["user_name"] = $row["name"];
    $_SESSION["user_email"] = $row["email"];
    header("Location: /hospital/dashboard/index.php");
  } else {
  }
}


?>

<div class="container" style="margin-top: 140px;">
  <div class="card">
    <div class="card-body">
      <form action="/hospital/login.php" method="POST">
        <div class="mb-3">
          <label for="emailInput" class="form-label">Email address</label>
          <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" name="email">
        </div>
        <div class="mb-3">
          <label for="passwordInput" class="form-label">Password</label>
          <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password">
        </div>
        <input type="submit" name="submit" value="Login" class="btn btn-primary mb-3">
      </form>
    </div>
  </div>
</div>

<?php
require_once "footer.php";
