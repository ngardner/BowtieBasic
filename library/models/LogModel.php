<?php

namespace BowtieFW\Model;

class Log extends \BowtieFW\Model {
    
    function __construct() {
        
        parent::__construct();
        $this->tableName = 'log';
        $this->install();
        
    }
    
    function install() {
        
        // check if installed
        if($this->tableExists()) {
            return true;
        } else {
            // install it
            $sql = "
            CREATE TABLE `".$this->tableName."` (
                `id` int(11) NOT NULL auto_increment,
                `message` text NOT NULL,
                `cdate` timestamp NOT NULL default CURRENT_TIMESTAMP,
                PRIMARY KEY  (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
            $this->db->query($sql);
        }
        
    }
    
    function Log($message) {
        
        $savedId = $this->save(array('message'=>$message));
        if($savedId) {
            return true;
        } else {
            return false;
        }
        
    }
    
}
?>