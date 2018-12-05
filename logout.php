<?php

   include(login.php);
   session_start();
   unset($_SESSION["fname"]);
   unset($_SESSION["pword"]);
   header('location: index.html');
?>