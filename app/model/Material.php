<?php
	/**
	 * Object represents table 'material'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2015-10-23 09:10	 
	 */
	class Material{
		
        public $materialId;
        public $type;
        public $description;
	    public function toString() {
	        echo 'Material Id : '  . $this->materialId . 
	             ' Type : '        . $this->type       . 
	             ' Description : ' . $this->description;
	    }
	}
?>