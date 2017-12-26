

<?php 
//если данные есть  и не равны нулю то выводим
if (isset($datawithcontroller) && $datawithcontroller!= null) {
    $dt_user = $datawithcontroller;
     echo '<li>Id - '.$dt_user->id.'</li>';
     echo '<li>Login - '.$dt_user->Login.'</li>';
     echo '<li>FirstName - '.$dt_user->FirstName.'</li>';
     echo '<li>LastName - '.$dt_user->LastName.'</li>';
     echo '<li>Email - '.$dt_user->Email.'</li>';
     echo '<li>Phone - '.$dt_user->Phone.'</li>'; 
    echo'</ul>';
}

?>
