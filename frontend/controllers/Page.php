<?php
namespace BowtieFW\Frontend;

class Page extends \BowtieFW\Controller {
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    // default action
    function actionIndex($params='') {
        
        $this->actionHome($params);
        
    }
    
    // homepage
    function actionHome($params='') {
        
        $this->view->assign('content',$this->view->fetch('pages/home.tpl.php'));
        $this->finish();
        
    }
    
}

?>