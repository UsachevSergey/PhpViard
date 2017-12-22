<?php
 
class controller_error404 extends Controller {
    
   
     
    function action_index() {
        
        $this->view->generate("error404_view.php","template_view.php");
    }
}

?>