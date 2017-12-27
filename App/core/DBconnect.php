<?php

 class DBconnect {

     
     //метод возвращает хэндл подключения
     static function return_db_connect(){
         $log_db    ='xoiox';
         $pass_db   ='xoiox';
         $type_db   = 'mysql';
         $host_db   ='localhost';
         $namedb_db = 'basephpviard'; 
      $dbcon = new PDO($type_db.':host='.$host_db.';dbname='.$namedb_db , $log_db, $pass_db); 
      return $dbcon ;
     }

     
     
}


?>
