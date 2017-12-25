
<div id='modal_windows_login' class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button type="button" class="close" data-dismiss='modal' aria-hidden='true'>X</button>
                  <h5>Войти</h5>
            </div>
            <div class='modal-body'>
                 
                <form action="auth/login" method="POST" >
                    <p>Логин:</p>
                    <input type="text" name="login" value="" /> 
                    <p>Пароль:</p>
                    <input type="password" name="password" value="" /> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary ">Войти</button>
                    <br>
                    <br>
                    <a href="auth/registration">Регистрация</a> 
                </form>
                
               
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                
            </div>

        </div>        
    </div>
</div>



<?php // сама кнопка входа по нажатиюб на которую должно открываться модальное окно описаное выше ?>
<li><a  href='#modal_windows_login' data-toggle='modal'>Войти</a></li>


