<?php
/**
 * This is the controller, all sub controllers should extend this
 */

namespace BowtieFW;

class Controller {
	
	public $view;
	public $layout;
	
	function __construct() {
		
	}
	
	public function execute($action, $params) {
		
		if(method_exists($this,$action)) {
			
			call_user_func_array(array($this, $action), array($params));
			
		} else {
			
			throw new Exception('Action "'.$action.'" not defined for this controller.');
			
		}
		
	}
	
	function setPlace($place) {
		
		$this->view = new View($place);
		
	}
	
	function setLayout() {
		
		$this->layout = 'default.tpl.php';
		
	}
	
	function finish($return=false) {
		
		if($this->view) {
			
			if($return) {
				
				$this->view->fetch($this->layout);
				
			} else {
				
				$this->view->display($this->layout);
				
			}
			
		} else {
			
			throw new \Exception('No view to render');
			
		}
		
	}
	
	// converts the data to json and outputs
	function JSONoutput($data) {
		
		$output = json_encode($data);
		header('Content-type: application/json');
		echo $output;
		exit(0);
		
	}
	
	// converts the data to CSV and outputs
	function CSVoutput($data,$filename='csvexport') {
		
		$headers = array_keys($data[0]);
		
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=".$filename.".csv");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		foreach($headers as $header) {
			
			echo '"'.str_replace('"', '""', $header).'",';
			
		}
		
		echo "\r\n";
		
		foreach($data as $exportRecord) {
			
			foreach($exportRecord as $value) {
				
				echo '"'.str_replace('"', '""', $value).'",';
				
			}
			
			echo "\r\n";
			
		}
		
		exit(0);
		
	}
	
	// PHP redirect
	function redirect($url,$responseCode=302) {
		
		header("Location: ".$url,true,$responseCode);
		exit();
		
	}
	
}
?>
