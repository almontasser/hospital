<?php

require_once "../utils.php";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

  <!-- jQuery Datatable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

  <!-- Chosen CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />

  <link rel="stylesheet" href="style.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- <script src="utils.js"></script> -->

  <title>Hospital</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/teachers/">الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/teachers/teachers.php">الأساتذة</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/teachers/nationalities.php">الجنسيات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/hospital/dashboard/users.php">المستخدمين</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex">
          <?php
          if (!isset($_SESSION["user_name"]) || $_SESSION["user_name"] == '') { ?>
            <li class="nav-item">
              <a class="btn btn-outline-primary" aria-current="page" href="/hospital/login.php">تسجيل الدخول</a>
            </li>
          <?php } else { ?>
            <span class="navbar-text me-2"><?= $_SESSION["user_name"]; ?></span>
            <li class="nav-item">
              <a class="btn btn-outline-danger " aria-current="page" href="/hospital/logout.php">تسجيل الخروج</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>