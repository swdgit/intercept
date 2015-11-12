<?php
/**
 * @author stacydecker
 *
 */
class SupplierAPI {
    /**
     * @param unknown $params
     * @return unknown
     */
    public static function setSupplier($params) {

        echo 'total params ' . count($params) . ' param : ' . $params[0];
        
        $supplier = new Supplier();
        $supplier->companyName     = $params['companyName'];
        $supplier->type            = $params['type'];
        $supplier->contactName     = $params['contactName'];
        $supplier->contactTitle    = $params['contactTitle'];
        $supplier->address         = $params['address'];
        $supplier->city            = $params['city'];
        $supplier->stateOrProvince = $params['stateOrProvince'];
        $supplier->postalCode      = $params['postalCode'];
        $supplier->region          = $params['region'];
        $supplier->country         = $params['country'];
        $supplier->phone           = Util::formatPhone($params['phone']);
        $supplier->fax             = Util::formatPhone($params['fax']);
        
        // new supplier in this case
        if ($params['supplierId'] == -1 || $params['supplierId'] == NULL) {
            // check for existing first. 
            $existing = DAOFactory::getSupplierDAO()->queryByCompanyName($params['companyName']);

            if ($existing == NULL) {

                $supplier->supplierId = DAOFactory::getSupplierDAO()->insert($supplier);
            } else {
                // need to update
                if (is_array($existing)) {
                    $supplier = $existing[0];
                }
            }
        
        } else {
            // update a print spec
            $supplier->supplierId = $params['supplierId'];
            
            DAOFactory::getSupplierDAO()->update($supplier);
        }
        
        return $supplier;
    }
    
    public static function getSupplier($supplierId) {
        $supplier = DAOFactory::getSupplierDAO()->load($supplierId);
        
        return $supplier;        
    }
    
    public static function getSuppliersByType($lookup) {
        $suppliers = DAOFactory::getSupplierDAO()->queryByType($lookup); 
        return $suppliers;
    }
}
?>
