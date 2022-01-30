<?php
require "db.php";

$data = $_POST;
if( isset($data['do_signup']) )
{
    //здесь регистрируем

    $errors = array();
    if( $data['login'] == '')
    {
        $errors[] = 'Введите ФИО!';
    }

    if( trim($data['email']) == '')
    {
        $errors[] = 'Введите e-mail!';
    }

    if( $data['password'] == '')
    {
        $errors[] = 'Введите пароль!';
    }

    if( $data['password_2'] != $data['password'] )
    {
        $errors[] = 'Повторный пороль введён не верно!';
    }

    if( R::count('users', "email = ?", array($data['email'])) >0 )
    {
        $errors[] = 'Пользователь с таким e-mail уже существует!';
    }


    if( trim($data['passport']) == '')
    {
        $errors[] = 'Введите серию!';
    }

    if( trim($data['passport_2']) == '')
    {
        $errors[] = 'Введите номер!';
    }

    if( empty($errors) )
    {
        // всё хорошо, регистрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->passport = $data['passport'];
        $user->passport_2 = $data['passport_2'];
        R::store($user);
        echo '<div style="color: green;">Вы успешно зарегестрировались!!</div><hr>';

    } else
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}


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

<div class="container mt-5">
    <h3>Регистрация</h3>

    <form action="/signup.php" method="POST">
        <p>
        <div class="form-floating">
            <input type="text" name="login" placeholder="Введите ваше ФИО" value="<?php echo @$data['login']; ?>"></div>
        </p>

        <p>
        <div class="form-floating">
            <input type="email" name="email" placeholder="Введите ваш e-mail" value="<?php echo @$data['email']; ?>"></div>
        </p>

        <p>
        
            <?php
            $chars="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()-";
            $max=15;
            $size=StrLen($chars) -1;
            $password=null;
                while($max--)
                $password.=$chars[rand(0,$size)];
            echo "Можете воспользоваться сгенерированным паролем: ".$password.""
        ?></p></p>
        <p>
        <div class="form-floating">
            <input type="password" name="password" placeholder="Введите ваш пароль" value="<?php echo @$data['password']; ?>"></div>
        </p>

        <p>
        <div class="form-floating">
            <input type="password" name="password_2" placeholder="Повторите пароль" value="<?php echo @$data['password_2']; ?>"></div>
        </p>

        <p>
        <div class="form-floating">
            <input type="passport" name="passport" placeholder="Введите серию паспорта" value="<?php echo @$data['passport']; ?>"></div>
        </p>

        <p>
        <div class="form-floating">
            <input type="passport_2" name="passport_2" placeholder="Введите номер паспорта" value="<?php echo @$data['passport_2']; ?>"> </div>
        </p>


        <p>
        <a href="index.php" class="btn btn-success" type="submit" name="do_signup" >Проходите!</a>
        </p>
    </form>
</div>
</body>
</html>

