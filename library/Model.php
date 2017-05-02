<?php

namespace BowtieFW;

class Model {
	
	protected $db;
	protected $tableName;
	
	function __construct() {
		
		$this->db = Database::getInstance();
		$this->tableName = null; // classes that extend Model, must define the tableName
		
	}
	
	function save($data) {
		
		if(is_array($data)) {
			
			// build `column` = :ph_column part of query, and store data
			$queryData = array();
			$queryMiddle = "";
			foreach($data as $column=>$value) {
				$column = preg_replace('/[^0-9a-zA-Z$_]/','',$column); // make column names safe
				$queryMiddle .=  "`".$column."` = :ph_".$column." , ";
				$queryData['ph_'.$column] = $value;
			}
			$queryMiddle = substr($queryMiddle,0,-2); // remove last comma
			
			
			if(!empty($data['id'])) {
				
				// update
				$queryStart = "UPDATE ";
				$queryWhere = " WHERE `id` = :id";
				$queryData['id'] = $data['id'];
				
			} else {
				
				// insert
				$queryStart = "INSERT INTO ";
				$queryWhere = "";
				
			}
			
			$fullQuery = $queryStart."`".$this->tableName."` SET ".$queryMiddle.$queryWhere;
			
			// run it
			$this->db->query($fullQuery,$queryData);
			
			// return the id
			if(!empty($data['id'])) {
				return $data['id'];
			} else {
				return $this->db->lastInsertId();
			}
			
		} else {
			
			return false;
			
		}
		
	}
	
	function get($id) {
		
		$id = intval($id);
		
		$sql = "SELECT * FROM `".$this->tableName."` WHERE `id` = :id LIMIT 1";
		$sqlData = array('id'=>$id);
		return $this->db->getRow($sql,$sqlData);
		
	}
	
	function getRelatedData($id) {
		
		$id = intval($id);
		
		$sql = "SELECT * FROM `".$this->tableName."` WHERE `id` = :id LIMIT 1";
		$sqlData = array('id'=>$id);
		$tableData = $this->db->getRow($sql,$sqlData);
		
		if(!empty($tableData)) {
			
			foreach($tableData as $columnName=>$columnValue) {
				
				// if columname is tableName_id, then auto load that data
				if(substr($columnName,-3) == '_id') {
					
					$tableName = substr($columnName,0,-3);
					
					if($tableName != 'parent') {
						
						if(substr($this->tableName,0,5) != 'node_' || $tableName != 'node') {
							
							// get data from tablename
							$objModel = new Model;
							$objModel->tableName = $tableName;
							if($objModel->tableExists()) {
								$tableData[$tableName] = $objModel->getRelatedData($columnValue);
							}
							
						}
						
					}
					
				}
				
			}
			
			if($this->tableName == 'node' && !empty($tableData['nodeType'])) {
				
				$objModel = new Model;
				$objModel->tableName = 'node_'.$tableData['nodeType']['keyName'];
				if($objModel->tableExists()) {
					
					$nodeData = $objModel->find(array("node_id"=>$tableData['id']));
					//$tableData['nodedata'] = $nodeData; // not extended
					
					//extended version
					$tableData['nodedata'] = $objModel->getRelatedData($nodeData[0]['id']);
				}
				
			}
			
		}
		
		return $tableData;
		
	}
	
	function getAll() {
		
		// can we make this order by "sortOrder" if that column exists, otherwise by cdate, otherwise by id?
		
		$sql = "SELECT * FROM `".$this->tableName."` ORDER BY `id`";
		return $this->db->getAll($sql);
		
	}
	
	function find(array $filters) {
		
		$sql = "SELECT * FROM `".$this->tableName."` WHERE ";
		
		$sqlWheres = array();
		$sqlWhereData = array();
		
		if(!empty($filters)) {
			foreach($filters as $filterColumn=>$filterValue) {
				if(preg_match('/^(\w)+$/',$filterColumn)) {
					$sqlWheres[] = "`".$filterColumn."` = :".$filterColumn;
					$sqlWhereData[$filterColumn] = $filterValue;
				} else {
					// future logic
				}
			}
		} else {
			$sqlWheres[] = "1=1";
		}
		
		$sql .= implode(" AND ",$sqlWheres);
		
		$result = $this->db->getAll($sql,$sqlWhereData);
		return $result;
		
	}
	
	function delete($id) {
		
		$id = intval($id);
		
		$sql = "DELETE FROM `".$this->tableName."` WHERE `id` = :id LIMIT 1";
		$sqlData = array('id'=>$id);
		return $this->db->query($sql,$sqlData);
		
	}
	
	function tableExists() {
		
		$tableExists = $this->db->query("SHOW TABLES LIKE '".$this->tableName."'")->rowCount() > 0;
		return $tableExists;
		
	}
	
}

?>
