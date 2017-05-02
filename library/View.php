<?php

namespace BowtieFW;

class View {
	
	private $location;
	private $template;
	public $_jsIncludes;
	
	function __construct($location) {
		
		$this->_jsIncludes = array();
		$this->location = $location;
		$this->template_dir = $location.'/views/';
		$this->template = new ViewTemplate;
		$this->assignCommons();
		
	}
	
	function assignCommons() {
		
		$this->assign('Title',PRODUCT_NAME);
		$this->assign('URL',URL);
		$this->assign('PATH',INSTALLDIR.'/'.$this->template_dir);
		
	}
	
	function assign($variable,$value) {
		
		$this->template->$variable = $value;
		
	}
	
	function addJS($src) {
		
		$this->template->_jsIncludes[] = $src;
		
	}
	
	function addCSS($src) {
		
		$this->template->_cssIncludes[] = $src;
		
	}
	
	function findTemplate($template) {
		
		$searchLocation = DIR.$this->template_dir.$template;
		
		if(file_exists($searchLocation) && is_file($searchLocation)) {
			return $searchLocation;
		} else {
			throw new \Exception('Cant find template '.$template);
		}
		
	}
	
	function fetch($template) {
		
		$templateFilepath = $this->findTemplate($template);
		return $this->template->render($templateFilepath);
		
	}
	
	function display($template) {
		
		$output = $this->fetch($template);
		echo $output;
		
	}
	
}

class ViewTemplate {
	
	public $_jsIncludes;
	public $_cssIncludes;
	
	function render($template) {
		
		extract($this->getVars());
		
		ob_start();
		include $template;
		return ob_get_clean();
		
	}
	
	function addCSSincludes() {
		
		echo '<!-- css includes -->'."\r\n";
		if(isset($this->_cssIncludes)) {
			foreach($this->_cssIncludes as $include) {
				echo '<link href="'.$include.'" rel="stylesheet">'."\r\n";
			}
		}
		
	}
	
	function addJSincludes() {
		
		echo '<!-- js includes -->'."\r\n";
		if(isset($this->_jsIncludes)) {
			foreach($this->_jsIncludes as $include) {
				echo '<script src="'.$include.'"></script>'."\r\n";
			}
		}
		
	}
	
	function getVars() {
		
		$templateVars = get_object_vars($this);
		return $templateVars;
		
	}
	
}

?>
