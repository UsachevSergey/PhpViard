<?php
 
class Users {
 public  $id;
 public  $Login; 
 public  $FirstName; 
 public  $LastName; 
 public  $Email; 
 public  $Phone;
 
 //в конструктор может принимать id
 public function __construct($curid=null) {
     if ($curid!=null) {
        $this->id=$curid;
     }    
 }
 
 public function GetDate(){
     
      //пробуем запросить данные 
            try {
                //создаем pdo объект подключения к бд
                $sbsase = new PDO('mysql:host=localhost;dbname=basephpviard', 'xoiox', 'xoiox');
                //подготавливаем запрос
                //вытаскиваем пользователя с соответствующим id
                $currenttemp = $sbsase->prepare("select id,Login,FirstName,LastName,Email,Phone from users where id= '" . $this->id . "'");
                //выполняем
                $currenttemp->execute();
                //возвращает в виде масива классов
                $newuser = $currenttemp->fetchAll(PDO::FETCH_CLASS, "Users")[0];
            
                
                $this->id = $newuser->id;
                $this->Login = $newuser->Login;
                $this->FirstName = $newuser->FirstName;
                $this->LastName = $newuser->LastName;
                $this->Email = $newuser->Email;
                $this->Phone = $newuser->Phone;
                
                
            } catch (Exception $e) {
                //если при запросе была ошибка то обнудяем данные о пользователе 
                $this->id = null;
            } 
            
 }
}
?>
