<?php

class Intercept {

    public function getPrinters() {
        $printers = DAOFactory::getPrinterDAO()->queryAllOrderBy('supplier_id');
        
        return $printers;
    }
    
    public function getMaterials() {
        $materials = DAOFactory::getMaterialDAO()->queryAll();
        return $materials;
    }

    public function getMatrix() {
        $matrix = DAOFactory::getPrinterMaterialXrefDAO()->queryMatrix();
        return $matrix;
    }
    
    public function getSpecs($printer, $material) {
        return NULL;
    }
    
    public function getNotes($printer, $material) {
        return NULL;
    }
    
    public function getMaterialReviews($material) {
        return NULL;
    }
    
    public function getPrinterReviews($material) {
        return NULL;
    }
    
}
?>