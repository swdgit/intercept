<?php
class PrinterAPI {

    /**
     * save or update the printer
     * @param array of request $params
     * @return Ambigous <Printer, unknown>
     */
    public static function setPrinter($params) {
        // todo check name first to see if it's already there. if so... update.
        $printer = new Printer();
        $printer->supplierId          = $params['supplierId'];
        $printer->name                = $params['printerName'];
        
        $printers = DAOFactory::getPrinterDAO()->queryExisting($printer->supplierId, $printer->name);
        
        if (count($printers) <= 0 ) {
            
            $printer->styleId             = $params['styleId'];
            $printer->bedX                = $params['bedX'];            
            $printer->bedY                = $params['bedY'];
            $printer->bedZ                = $params['bedZ'];
            $printer->productUrl          = $params['productUrl'];
            $printer->discontinued        = $params['discontinued'];
            $printer->modelNumber         = $params['modelNumber'];
            $printer->printSpeedMax       = $params['printSpeedMax'];
            $printer->printSpeedMaxHeight = $params['printSpeedMaxHeight'];
            $printer->layerMax            = $params['layerMax'];
            $printer->layerMin            = $params['layerMin'];
            $printer->printSurface        = $params['printSurface'];
            
            $printer->printerId = DAOFactory::getPrinterDAO()->insert($printer);
        } else {
            // just grab the first one for now.
            $printer = $printers[0];
        }
        
        return $printer;
    }
    
    public static function getPrinters($materialId) {
        return DAOFactory::getPrinterDAO()->queryPrintersByMaterial($materialId);
    }
}
?>