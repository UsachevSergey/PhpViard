<?php

class controller_auth extends Controller {

    //переход на страницу входа
    function action_index() {

        $this->view->generate(" errrrror.php", "template_view.php");
    }

    //вход
    function Action_login() {

        //создаем экземпляр модели
        $model = new model_login();

        //изначально логин не подтвержден
        // устанавливаем логин
        $loginvirification = $model->set_data_session($_POST['login'],$_POST['password']);

        //если сесия успешна установлена то 
        if ($loginvirification) {

            //перенавравляем на главную страницу
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 200 OK');
            header('Location:' . $host . 'main');
            exit();
        } else {
            //перенаправляем на 404
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . $host . 'error404');
            exit();
        }
    }

    function Action_logout() {
        //удаляем все данные из сесии
        $_SESSION = array();
        //уничтожаем сессию
        session_destroy();
        //после разрыва сесии переходим на главную страницу
        //перенавравляем на главную страницу
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 200 OK');
        header('Location:' . $host . 'main');
        exit();
    }

    function Action_registration() {

        if (isset($_POST) && count($_POST) > 0) {

            //создаем экземпляр класа регистрации
            $model = new model_registration();

            $l = trim(strtolower($_POST['login']));
            $e = trim(strtolower($_POST['email']));
            $p = trim(strtolower($_POST['phone']));
            $ps = trim($_POST['password']);

            //получаем ответ от метода вставки нового пользователя
            $suces = $model->try_register_new_user($l, $e, $p, $ps);


            //если пользователь успешно внесен то переводим на основную страницу
            if ($suces) {
                //перенавравляем на главную страницу
                $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
                header('HTTP/1.1 200 OK');
                header('Location:' . $host . 'main');
                exit();
            } else {
                //иначе переводим на страницу с регистрацией
                $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
                header('HTTP/1.1 200 OK');
                //передаем с параметром ошибки
                header('Location:' . $host . 'auth/registration');
                exit();
            }
        } else {

            //если гет или возникла ошибка то перенаправляем
            $this->view->generate("registration_view.php", "template_view.php");
        }
    }

    //функция для аутентификации вк
    function Action_auth_vk() {



//подключение к базе
        include_once 'App/models/model_auth_vk.php'; 
        include_once 'App/models/Users.php';
        include_once 'App/models/model_registration.php';
        include_once 'App/models/model_login.php';
        
        $this->model = new model_auth_vk();
        //id пользователя вконтакте
        $uid = $_GET['uid'];
        $suc = $this->model->reg($uid);
        //перенавравляем на главную страницу
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 200 OK');
        header('Location:' . $host . 'main');
        exit();
    }

}
?>

