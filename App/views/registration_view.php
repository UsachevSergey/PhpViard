
<form  role="form" class="form-horizontal" action="registration" method="post">
    <!-- Блок для ввода логина -->
    <div class="form-group has-feedback">
        <label for="login" class="control-label col-xs-3">Логин:</label>
        <div class="col-xs-6">
            <div class="input-group">

                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>  

                <input type="text" class="form-control" required="required" name="login" pattern="[A-Za-z]{1,}[A-Za-z0-9]{4,}">
            </div>
            <span class="glyphicon form-control-feedback"></span>
        </div>
    </div>

    <!-- Блок для ввода email -->
    <div class="form-group has-feedback">
        <label for="email" class="control-label col-xs-3">Email:</label>
        <div class="col-xs-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" class="form-control" required="required" name="email">
            </div>
            <span class="glyphicon form-control-feedback"></span>
        </div>
    </div>
    <!-- Блок для ввода телефона -->
    <div class="form-group has-feedback">
        <label for="phone" class="control-label col-xs-3">Телефон в формате (89609609696):</label>
        <div class="col-xs-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input maxlength="11" type="text" class="form-control" required="required" name="phone" pattern="\d{10,11}"
                       >
            </div>
            <span class="glyphicon form-control-feedback"></span>
        </div>
    </div>


    <!--Блок для ввода пароля-->
    <div class="form-group has-feedback">
        <label for="password" class="control-label col-xs-3">Пароль:</label>
        <div class="col-xs-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon   glyphicon-certificate"></i></span>
                <input id="password" type="password" class="form-control" required="required" name="password">
            </div>
            <span class="glyphicon form-control-feedback"></span>
        </div>
    </div>

    <!--Блок для ввода пароля ещё раз-->
    <div class="form-group has-feedback">
        <label for="passwordagain" class="control-label col-xs-3">Пароль ещё раз:</label>
        <div class="col-xs-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon   glyphicon-certificate"></i></span>
                <input id="passwordagain" type="password" class="form-control" required="required" name="passwordagain">
            </div>
            <span class="glyphicon form-control-feedback"></span>
        </div>
    </div>  
    <input id="save" type="submit" class="btn btn-primary center-block " value="Регистрация">
</form>


<style>   .div_message_error{  color:red;  }  </style> 

<div id="message" class="div_message_error " > 
    <?php
    if (isset($_SESSION['error_messages'])) {
        $codemess = $_SESSION['error_messages'];
        if ($codemess == 1) {
            echo " Пользователь с таким логином  или почтой уже зарегистрирован";
        }
        if ($codemess == 2) {
            echo "почта не подходит по шаблону";
        }
        if ($codemess == 3) {
            echo "Логин не подходит по шаблону";
        }
        if ($codemess == 4) {
            echo "Длина логина меньше 5";
        }
        if ($codemess == 5) {

            echo "Не все символы телефона цифры";
        }
        $_SESSION['error_messages'] = null;
    }
    ?> 
</div>




<?php ?>