<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

function loadPage($page): void {
    switch ($page){
        case 'home':
          include 'file_/home.php';
          break;
        case 'login':
          include 'file_/login.php';
          break;
        case 'register':
          include 'file_/register.php';
          break;
      default :
          include "file_/notfound.php";
          break;  
      }
}

loadPage($page);
?>
