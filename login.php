<?php
require "db.php";

$data = $_POST;

if( isset($data['do_login']) )
{
    $errors = array();
    $user = R::findOne('users', 'email = ?', array($data['email']) );
    if( $user )
    {
        //логин существует 
        if( password_verify($data['password'], $user->password) ) {
                //всё хорошо, логиним пользователя
            $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;">Вы авторизованы!<br/>Можете перейти на <a href="/">главную страницу!</a>!</div><hr>';
        } else
        {
            $errors[] = 'Пароль введён неверно!';
        }
    } else
    {
        $errors[] = 'Пользователь с таким e-mail не найден!';
    }

    if( ! empty($errors) )
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
?>


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
        <h3>Авторизация</h3>

        <form action="login.php" method="POST">
            <p>
            <div class="form-floating">
                <input type="text" name="email" placeholder="Введите ваш e-mail" value="<?php echo @$data['email']; ?>">
            </div></p>


            <p>
            <div class="form-floating">
                <input type="password" name="password" placeholder="Введите ваш e-mail" value="<?php echo @$data['password']; ?>">
            </div></p>

            
            <a href="k.php" class="btn btn-success">Войти!</a><br>
           
        </form>
