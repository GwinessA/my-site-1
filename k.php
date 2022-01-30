<?php

require "db.php";

?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
    Приветсвуем вас, <?php echo $_SESSION['logged_user']->login; ?> <br> 
<br>
  
Ваш E-mail: <?php echo $_SESSION['logged_user']->email; ?><br>
Серия вашего паспорта: <?php echo $_SESSION['logged_user']->passport; ?><br>
Номер вашего паспорта: <?php echo $_SESSION['logged_user']->passport_2; ?><br>





<a href="/index.php">На главную</a>
<?php endif; ?>


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
<div class="container mt-5">
    <h3>Личный кабинет</h3>
    <form action="k.php" method="POST">
        Ваш E-mail: <?php echo $_SESSION['logged_user']->email; ?><br>
        Серия вашего паспорта: <?php echo $_SESSION['logged_user']->passport; ?> <br>
        Номер вашего паспорта: <?php echo $_SESSION['logged_user']->passport_2; ?> <br>
        <a href="/index.php">На глвную</a>

</form>


