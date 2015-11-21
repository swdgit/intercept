<?php

class Intercept {

    public static function getPrinters() {
        $printers = DAOFactory::getPrinterDAO()->queryAllOrderBy('supplier_id');
        
        return $printers;
    }
    
    public static function getMaterials() {
        $materials = DAOFactory::getMaterialDAO()->queryAll();
        return $materials;
    }

    public static function getMatrix() {
        $matrix = DAOFactory::getPrinterMaterialXrefDAO()->queryMatrix();
        return $matrix;
    }
    
    public static function getSpecs($printer, $material) {
        $spec = DAOFactory::getPrintSpecDAO()->queryByIds($printer, $material);
        return $spec;
    }
    
    public static function getFilament  () {
        $filament = DAOFactory::getFilamentDAO()->queryAll();
        return $filament;
    }
    
    public static function getNotes($printer, $material) {
        return NULL;
    }
    
    public static function getMaterialReviews($material) {
        return NULL;
    }
    
    public static function getPrinterReviews($material) {
        return NULL;
    }
    
}
?>