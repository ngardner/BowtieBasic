<?php
/**
 * This file contains the database class
 * This uses PDO
 * It does not Extend PDO, however it uses the magic method __call so you can still call PDO methods
 * even if they aren't defined here.
 * Defining them here overwrites the PDO method (such as query).
 */

namespace BowtieFW;

class Database {
	
	private static $instance;
	private $selectMode;
	private $dbConn;
	protected $resultSet;
	private $numbQueries;
	public $lastSql;
	
	function __construct($server,$port,$username,$password,$database) {
		
		$this->dbConn = new \PDO("mysql:host=".$server.";dbname=".$database.";port=".$port.";charset=UTF8",$username,$password);
		$this->resultSet = false;
		$this->assignedData = false;
		$this->numbQueries = 0;
		$this->selectMode = \PDO::FETCH_ASSOC;
		self::$instance = $this;
		
	}
	
	static function getInstance() {
		
		if (!isset(self::$instance)) {
			
			$c = __CLASS__;
			self::$instance = new $c;
			
		}
		
		return self::$instance;
		
	}
	
	/**
	 * Disconnects from DB
	 */
	function disconnect() {
		
		$this->dbConn = null;
		return true;
		
	}
	
	/**
	 * Pass a query, and an array of parameters. You can use this with named placeholders, or question marks
	 * Sets $this->resultSet and returns true on success, otherwise throws an exception
	 *
	 * Named placeholders
	 * $query = "SELECT * FROM `users` WHERE `id` = :id AND `name` = :name";
	 * $bindData = array('id'=>1,'name'=>'Nathan');
	 *
	 * Question mark placeholders
	 * $query = "SELECT * FROM `users` WHERE `id` = ? AND `name` = ?";
	 * $bindData = array(1,'Nathan');
	 */
	function query($query,$bindData='') {
		
		// clear the previous result
		$this->resultSet = null;
		
		if($this->dbConn) {
			
			// prepare the query
			$stmt = $this->dbConn->prepare($query);
			
			// bind the data
			if(is_array($bindData) && !empty($bindData)) {
				foreach ($bindData as $key => &$val) {
					
					// adds : for named placeholders
					if(is_string($key)) { $key = ':'.$key; }
					
					// set the datatype
					$dtype = \PDO::PARAM_STR;
					if (is_bool($val)) { $dtype = \PDO::PARAM_BOOL; }
					elseif (is_null($val)) { $dtype = \PDO::PARAM_NULL; }
					elseif (is_int($val)) { $dtype = \PDO::PARAM_INT; }
					
					// bind it
					$stmt->bindValue($key, $val, $dtype);
					
				}
			}
			
			// execute it
			$stmt->execute();
			
			// count it and remember it, for debugging
			$this->numbQueries++;
			$this->lastSql = array($query,$bindData);
			
			// make sure it was successfull, otherwise throw exception
			if($stmt->errorCode() === '00000') {
				$this->resultSet = $stmt;
				return $stmt;
			} else {
				$errorInfo = $stmt->errorInfo();
				throw new \Exception($errorInfo[0].' : '.$errorInfo[2]);
			}
			
		} else {
			
			throw new \Exception('Not connected to database, cant run '.$query);
			
		}
		
	}
	
	/**
	 * Gets a single row from result set
	 * Pass a query, and an array of parameters. You can use this with named placeholders, or question marks.
	 */
	function getRow($query,$bindData='') {
		
		try {
			
			$this->query($query,$bindData);
			
			if($this->resultSet) {
				
				$result = $this->resultSet->fetch($this->selectMode);
				return $result;
				
			} else {
				
				return false;
				
			}
			
		} catch(Exception $e) {
			
			throw new \Exception('Unable to select data: '.$e->getMessage());
			
		}
		
	}
	
	/**
	 * Gets a single value from result set (first column of first row)
	 * Pass a query, and an array of parameters. You can use this with named placeholders, or question marks.
	 */
	function getOne($query,$bindData='') {
		
		try {
			
			$this->query($query,$bindData);
			
			if($this->resultSet) {
				
				$result = $this->resultSet->fetchColumn();
				return $result;
				
			} else {
				
				return false;
				
			}
			
		} catch(Exception $e) {
			
			throw new \Exception('Unable to select data: '.$e->getMessage());
			
		}
		
	}
	
	/**
	 * Gets a all rows from a resultset as an array
	 * Pass a query, and an array of parameters. You can use this with named placeholders, or question marks.
	 */
	function getAll($query,$bindData='') {
		
		try {
			
			$this->query($query,$bindData);
			
			if($this->resultSet) {
				
				$results = $this->resultSet->fetchAll($this->selectMode);
				return $results;
				
			} else {
				
				return false;
				
			}
			
		} catch(Exception $e) {
			
			throw new \Exception('Unable to select data: '.$e->getMessage());
			
		}
		
	}
	
	/**
	 * Gets a all values from a resultset for the first column
	 * Pass a query, and an array of parameters. You can use this with named placeholders, or question marks.
	 */
	function getCol($query,$bindData='') {
		
		try {
			
			$this->query($query,$bindData);
			
			if($this->resultSet) {
				
				$results = $this->resultSet->getAll(\PDO::FETCH_COLUMN,0);
				return $results;
				
			} else {
				
				return false;
				
			}
			
		} catch(Exception $e) {
			
			throw new \Exception('Unable to select data: '.$e->getMessage());
			
		}
		
	}
	
	function getNumbQueries() {
		
		return $this->numbQueries;
		
	}
	
	/**
	 * Since this class is a wrapper for PDO, but does not Extend PDO
	 * this magic method will call the PDO method if it isn't defined
	 * in this class.
	 */
	public function __call($name, $arguments) {
		if(method_exists($this->dbConn,$name)) {
			return call_user_func_array(array($this->dbConn, $name), $arguments);
		} else {
			throw new \Exception("Undefined method ".get_class($this)."::".$name);
		}
	}
	
}

?>
