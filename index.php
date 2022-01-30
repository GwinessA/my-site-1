<?php
require "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="c.css">
</head>
<body>
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Пример сайта</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Главная</a></li>
      </ul>
  </header>
  <div claaa="fon"></div>
    <div class="container mt-5">
      <h3>Главная</h3>
      <?php if( isset($_SESSION['logged_user']) ): ?>
          </header>Авторизован!<br>
              Рады Видеть Вас, <?php echo $_SESSION['logged_user']->login; ?>!
              <hr>
              <a href="kabinet.php" class="btn btn-success">Войти в личный кабинет</a><br>
              <br><a href="logout.php" class="btn btn-success">Выйти</a>
      <?php else : ?>
          Вы не авторизованы!<br>
          <a href="/login.php" class="btn btn-success">Авторизация</a><br>
          <br><a href="/signup.php" class="btn btn-success">Регистрация</a>
      <?php endif; ?>
    </div>
  </div>
</body>