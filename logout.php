<?php

session_start();

session_destroy();

header("Location: /hospital/index.php");
