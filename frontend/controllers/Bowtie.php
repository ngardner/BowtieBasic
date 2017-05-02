<?php
namespace BowtieFW\Frontend;

class Bowtie extends \BowtieFW\Controller {
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    // default action
    function actionIndex($params='') {
        
        $this->view->assign('content',$this->view->fetch('bowtie/index.tpl.php'));
        $this->finish();
        
    }
    
    function actionDownload($params='') {
        
        $this->view->assign('content',$this->view->fetch('bowtie/download.tpl.php'));
        $this->finish();
        
    }
    
    function actionInstall($params='') {
        
        $this->view->assign('content',$this->view->fetch('bowtie/install.tpl.php'));
        $this->finish();
        
    }
    
    function actionDevelopment($params='') {
        
        $this->view->assign('content',$this->view->fetch('bowtie/development.tpl.php'));
        $this->finish();
        
    }
    
    function actionTemplating($params='') {
        
        $this->view->assign('content',$this->view->fetch('bowtie/templating.tpl.php'));
        $this->finish();
        
    }
    
    function actionDonate($params='') {
        
        $this->view->assign('content',$this->view->fetch('bowtie/donate.tpl.php'));
        $this->finish();
        
    }
    
}

?>