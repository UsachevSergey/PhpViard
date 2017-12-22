 
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">  
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />  
        <link rel="stylesheet" href="css/foundation.css"> 
   
    
    
    </head>
    <body>
        <script src="/js/jquery.js" type="text/javascript"></script> 
        <script src="/js/bootstrap.js" type="text/javascript"></script> 
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>




       <!-- Классы navbar и navbar-default -->
<nav class="navbar navbar-default">
  <!-- Контейнер -->
  <div class="container-fluid">
    <!-- Заголовок -->
    <div class="navbar-header">
      <!-- Кнопка «Гамбургер» -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
        <span class=sr-only>Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Бренд или название сайта -->
      <a class="navbar-brand" href="#">Brand</a>
    </div>
    <!-- Основная часть меню -->
    <div class="collapse navbar-collapse" id="navbar-main">
    
      <!-- Содержимое основной части -->
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Ссылка 1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Ссылка 2</a></li>
        <li><a href="#">Ссылка 3</a></li>
        <li><a href="#">Ссылка 4</a></li>
        <li><a href="#">Ссылка 5</a></li>
        <!-- Выпадающий список -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Раздел <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ссылка</a></li>
            <li><a href="#">Ссылка</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ссылка</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

       
        
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3 hero-unit">  </div>
                <div class="span6"> <?php include 'App/views/' . $content_view; ?> </div> 
                <div class="span3 hero-unit">  </div>
            </div> 
        </div> 
        
        
        <footer class="navbar-fixed-bottom "><p class=" pull-right">копирайт цэ Кусок</p></footer>
    </body>
</html>


