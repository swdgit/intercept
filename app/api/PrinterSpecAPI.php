<?php
class PrinterSpecAPI {
    
    public static function setPrinterSpec($params) {
        $printSpec = new PrintSpec();

        $printSpec->printerMaterialXrefId = $params['printerMaterialXrefId'];
        $printSpec->title                 = $params['title'];
        $printSpec->description           = $params['description'];
        $printSpec->profile               = $params['profile'];
        $printSpec->recommendations       = $params['recommendations'];
        
        // new printspec in this case
        if ($params['print_spec_id'] == -1) {
            
            $printSpec->printSpecId = DAOFactory::getPrintSpecDAO()->insert($printSpec);
            
        } else {
            // update a print spec
            $printSpec->printSpecId = $params['printSpecId'];

            DAOFactory::getPrintSpecDAO()->update($printSpec);
        }
        
        return $printSpec;
    }
}
?>