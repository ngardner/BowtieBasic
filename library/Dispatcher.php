<?php
/**
 * This file contains the dispatcher
 */

namespace BowtieFW;

class Dispatcher {
	
	var $directory;
	var $controller;
	var $action;
	var $params;
	
	function __construct() {
		
		$this->setController();
		$this->setAction();
		$this->setParams(array());
		
	}
	
	function setAction($action='Index') {
		
		$action = !empty($action)?$action:'Index';
		$this->action = 'action'.$action;
		
	}
	
	function setController($controller='Page') {
		
		$controller = !empty($controller)?$controller:'Page';
		$this->controller = $controller;
		
	}
	
	function setParams($params) {
		
		$cleanParams = array();
		
		foreach($params as $key=>$value) {
			
			if(is_string($value)) {
				
				$value = htmlspecialchars($value);
				
			}
			
			$cleanParams[$key] = $value;
			
		}
		
		$this->params = $cleanParams;
		
	}
	
	function setDirectory($dir) {
		
		$this->directory = $dir;
		
	}
	
	private function runAction() {
		
		$objLog = new Model\Log;
		
		try {
			
			$className = ucfirst(strtolower($this->controller));
			$controllerClass = '\\BowtieFW\\'.ucfirst(strtolower($this->directory)).'\\'.$className;
			
			include_once $this->directory.'/controllers/'.$className.'.php';
			
			if(class_exists($controllerClass)) {
				
				$objController = new $controllerClass;
				
			} else {
				
				$this->error404('Class "'.$controllerClass.'" does not exist');
				
			}
			
			if ($objController instanceof Controller) {
				
				if(method_exists($objController,$this->action)) {
					$objLog->Log("Execute : ".$this->controller."->".$this->action);
					$objController->setPlace($this->directory);
					$objController->setLayout();
					$objController->view->assign('bodyClassController',$className);
					$objController->view->assign('bodyClassAction',$this->action);
					$objController->execute($this->action,$this->params);
				} else {
					if(method_exists($objController,'error404')) {
						try {
							$objController->error404($this->params);
						} catch(\Exception $e) {
							$this->error404($e->getMessage());
						}
					} else {
						$this->error404("Action ".$this->action." does not exist for ".$this->controller);
					}
				}
				
			} else {
				
				$this->error500('Class '.$className.' does not extend Controller class!');
				
			}
			
		} catch(\Exception $e) {
			
			// bubble up
			throw new \Exception($e->getMessage());
			
		}
		
	}
	
	function dispatch() {
		
		try {
			
			$this->runAction();
			
		} catch(\Exception $e) {
			
			$this->error500($e->getMessage());
			
		}
		
	}
	
	function parseUrl($urlString) {
		
		global $params;
		
		$urlparts = explode('/',$urlString);
		$controller = !empty($urlparts[0])?$urlparts[0]:'';
		$action = !empty($urlparts[1])?$urlparts[1]:'Index';
		$params['_extra'] = array_slice($urlparts,2);
		
		$this->setController($controller);
		$this->setAction($action);
		$this->setParams($params);
		
	}
	
	function error404($error='') {
		
		header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found',true,404);
		
		$objLog = new Model\Log;
		$objLog->Log("404 : ".$this->controller."->".$this->action);
		
		echo '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>'.PRODUCT_NAME.'</title>
		</head> 
		<body>
		
		<h1>'.PRODUCT_NAME.'</h1>
		
		<h2>404</h2>
		<p>Sorry, but the page wasn\'t found</p>
		<hr/>
		<strong>'.htmlentities($error).'</strong><br/>
		<ul>
			<li>Directory: '.$this->directory.'</li>
			<li>Class: '.$this->controller.'</li>
			<li>Function: '.$this->action.'</li>
			<li>Params: '.print_r($this->params,true).'</li>
		</ul>
		
		</body>
		</html>
		';
		exit(0);
		
	}
	
	function error500($error='') {
		
		header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error',true,500);
		
		$objLog = new Model\Log;
		$objLog->Log("500 : ".$this->controller."->".$this->action);
		
		echo '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>'.PRODUCT_NAME.'</title>
		</head> 
		<body>
		
		<h1>'.PRODUCT_NAME.'</h1>
		
		<h2>500</h2>
		<p>Sorry, Internal Server Error</p>
		<hr/>
		<strong>'.htmlentities($error).'</strong><br/>
		<ul>
			<li>Directory: '.$this->directory.'</li>
			<li>Class: '.$this->controller.'</li>
			<li>Function: '.$this->action.'</li>
			<li>Params: '.print_r($this->params,true).'</li>
		</ul>
		
		</body>
		</html>
		';
		exit(0);
		
	}
	
}

?>
