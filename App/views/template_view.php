
<!DOCTYPE html>


<html lang="ru">
    <head>
        <meta charset="utf-8">  
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link href="../../css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>


        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">btn</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Название сайта</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      
                        <li  <?php  if($content_view=='main_view.php'){ echo "class='active'"; } ?> ><a href="main">Главная</a></li>  
                       
                        <li <?php  if($content_view=='error404_view.php'){ echo "class='active'"; } ?> ><a href="Dferfcwefqw">Страницаа с ошибкой</a></li>
                        
                        <li><a href="Dferfcwefqw">Третья страница</a></li>
                        <li class="dropdown"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">раскрывающийся список <span class="caret"></span></a>
                            <ul class="dropdown-menu"> 
                                <li class="dropdown-header">первый заголовок дропдауна</li>
                                <li><a href="#">страница 1</a></li>
                                <li><a href="#">страница 2</a></li>
                                <li><a href="#">страница 3</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">второй заголовок дропдауна</li>
                                <li><a href="#">страница 2_1</a></li>
                                <li><a href="#">страница 2_2</a></li>
                            </ul>
                        </li> 
                    </ul> 
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        //блок отвечает за кнопки входа и выхода
                        //если залогинен
                        if (!empty($_SESSION["login"])) {
                            include 'partialview/logout.php';
                        } else {
                            include 'partialview/login.php';
                        }
                        ?>

                    </ul>

                </div> 
            </div> 
        </nav>






        <div class="container">
            <div class="row">
                <div class="col-md-2 bg-danger">  </div>
                <div class="col-md-8 " > <?php include 'App/views/' . $content_view; ?> </div> 
                <div class="col-md-2 bg-danger"><?php include 'App/views/partialview/right_div.php'; ?></div>
            </div> 
        </div>  
        <footer class="navbar-fixed-bottom"><p class=" pull-right  ">© сайт&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></footer>  
        <script src="../../js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>  
        <script src="../../js/bootstrap.min.js"></script>
    </body>



</html>

