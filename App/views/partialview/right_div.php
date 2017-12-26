<?php

if (isset($_SESSION['id']) && isset($_SESSION['login']) ) {
    echo '<h6>Данные пользователя:</h6> ';
    echo '<h6>id : '.$_SESSION['id'].'</h6> ';
    echo '<h6>логин : '.$_SESSION['login'].'</h6> ';
    //переход на страницу с даными пользователя
    echo '<a href="account"> <span><i class="glyphicon glyphicon-user"></i></span>личный кабинет</a>';
}

?>
