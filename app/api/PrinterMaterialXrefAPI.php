<?php
class PrinterMaterialXrefAPI {
    
    public static function setPrinterSpec($params) {
        $printMaterialXref = new PrinterMaterialXref();

        $printMaterialXref->materialId            = $params['material_id'];        
        $printMaterialXref->printerId             = $params['printer_id'];
        
        // new printspec in this case
        if ($params['printer_material_xref_id'] == -1) {
            
            $printMaterialXref->printerMaterialXrefId = DAOFactory::getPrinterMaterialXrefDAO()->insert($printerMaterialXref);
            
        } else {
            // update a print material xref
            $printMaterialXref->printerMaterialXrefId = $params['printer_material_xref_id'];
            
            DAOFactory::getPrinterMaterialXrefDAO()->update($printerMaterialXref);
        }
        
        return $printMaterialXref;
    }
    
    public static function getPrinterMaterialXref($printerMaterialXrefId) {
        $printMaterialXref = DAOFactory::getPrinterMaterialXrefDAO()->load($printerMaterialXrefId);
        
        return $printMaterialXref;
    }
}
?>