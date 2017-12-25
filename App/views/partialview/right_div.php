<?php

if (isset($_SESSION['id']) && isset($_SESSION['login']) ) {
    echo '<h6>Данные пользователя:</h6> ';
    echo '<h6>id : '.$_SESSION['id'].'</h6> ';
    echo '<h6>логин : '.$_SESSION['login'].'</h6> ';
    
}

?>
