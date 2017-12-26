<?php

Class View
{
    
    //принимает 3 параметра
    //вид страницы
    //общий вид страницы
    //масив элементов для размешение на страницы
    function generate($content_view,$template_view,$datawithcontroller = null){ 
        
        include  'App/views/'.$template_view; 
    
        
    }
    
    
    
    
}



?>