<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Bootstrap test</title>
  </head>
  <body style="background-image: url('img/bg2.jpg');">
    <div class="cont">
      <nav class="navbar navbar-expand-lg py-1" style="background-color: #141325;">
        <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold" href="#">
            <h1 class="mb-0">
              <img class="img" src="img/ado.png" alt="ado">
              <b>ADO</b>
            </h1>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse position-relative position-absolute top-0 end-0 py-3" id="navbarSupportedContent">
            <ul class="navbar-nav me-3 my-2 my-lg-0 navbar-nav-scroll">
              <li class="nav-item">
                <a class="nav-link fw-bold text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="https://music.youtube.com/channel/UC5DHwv9N4OQ9AWtKr8YSefw">YouTube Music</a></li>
                  <li><a class="dropdown-item" href="https://x.com/ado1024imokenp">X</a></li>
                </ul>
              </li>
              <?php 
              if (isset($_SESSION['username'])) {
                  echo '<li class="nav-item"><span class="nav-link text-white fw-bold">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</span></li>';
                  echo '<li class="nav-item"><a href="logout.php" class="nav-link text-white fw-bold">Logout</a></li>';
              } else {
                  echo '<li class="nav-item"><a href="index.php?page=login" class="lgn-btn">Login <i class="bi bi-arrow-right"></i></a></li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>