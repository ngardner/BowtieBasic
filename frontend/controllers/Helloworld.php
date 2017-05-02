<?php
namespace BowtieFW\Frontend;

class Helloworld extends \BowtieFW\Controller {
    
    function __construct() {
	parent::__construct();
    }
    
    // default action
    function actionIndex($params='') {
	
	$this->view->assign('content','Hello World!');
	$this->finish();
	
    }
    
}
?>