<?php
 
class controller_main extends Controller {
    
    
    function action_index($array_params=null) { 
        //есть параметры
        if($array_params!=null)
            {
             $this->view->generate("main_view.php","template_view.php",$array_params);
            }
        else
        {
        $this->view->generate("main_view.php","template_view.php");
        }
    }
    
}

?>