<?php
	/**
	 * Object represents table 'printer'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2015-10-23 09:10	 
	 */
	class Printer{
		
        public $printerId;
        public $supplierId;
        public $styleId;
        
        public $name;
        public $bedX;
        public $bedY;
        public $bedZ;
        public $productUrl;
        public $discontinued;
        public $modelNumber;
        public $printSpeedMax;
        public $printSpeedMaxHeight;
        public $layerMax;
        public $layerMin;
        public $printSurface;
        
        public $nozzleSize;
        
        public $filamentSize;		
	}
?>