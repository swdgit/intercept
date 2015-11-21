<?php

require '../app/autoload.php';

class GFSDProcess {
    
    const ID                          = 0; 
    const UID                         = 1; 
    const TID                         = 2; 
    const SAMPLE_LENGTH               = 3; 
    const DIAMETER                    = 4; 
    const MANUFACTURER                = 5; 
    const FILAMENT_NAME               = 6; 
    const FILAMENT_TYPE               = 7; 
    const COLOUR                      = 8; 
    const SAMPLE_PRINT_PHOTO          = 9; 
    const TRANSPARENT_OR_SOLID_COLOUR = 10; 
    const PRINTER_USED_FOR_TEST       = 11;
    const BOWDEN_OR_DIRECT_DRIVE      = 12; 
    const PLATFORM_TYPE               = 13; 
    const EXTRUSION_TEMP_C            = 14; 
    const PLATFORM_TEMPS_C            = 15; 
    const INFILL_PERCENT              = 16; 
    const SINK_OR_FLOAT               = 17; 
    const TENSILE_STRENGTH            = 18; 
    const CONDUCTIVITY_OHMS           = 19; 
    const POSSIBLE_USES               = 20; 
    const SUBMITTED_BY                = 21; 
    const USEFUL_LINKS                = 22; 
    const OTHER_NOTES                 = 23; 
    const F22 = 24; 
    const F23 = 25; 
    const F24 = 26; 
    const F25 = 27; 
    const F26 = 28; 
    const F27 = 29; 
    const F28 = 30; 
    const F29 = 31; 
    const F30 = 32; 
    const F31 = 33; 
    const F32 = 34; 
    const F33 = 35; 
    const F34 = 36; 
    const F35 = 37;
    
    function GFSDProcess() {
        
        if (($handle = fopen("../resources/db/GFSD Export Nov 2015.csv", "r")) !== FALSE) {
            
            $row = 1;
            $header   = array();
            
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                if ($row == 1) {
                    $colTotal = count($data);
                    echo "<p> $colTotal fields in line $row: <br /></p>\n";
                    for ($c=0; $c < $colTotal; $c++) {
                        $header = $data;
                    }
                } else {
                    $this->addFilament($data);
                    $this->addSupplier($data);
                }
                $row++;
            }
            fclose($handle);
        }
    }
    
    
    /**
     * @param unknown $data
     */
    function addFilament($data) {

        $existing = DAOFactory::getFilamentDAO()->queryByKeys($data[self::FILAMENT_NAME], 
                                                              $data[self::FILAMENT_TYPE], 
                                                              $data[self::COLOUR], 
                                                              floatval($data[self::DIAMETER]));
        
        echo " \n name : " . $data[self::FILAMENT_NAME] . ' type : ' . $data[self::FILAMENT_TYPE] . ' color : ' . $data[self::COLOUR] . ' dia : ' . floatval($data[self::DIAMETER]);
        
        $filament = new Filament();
        if ($existing == NULL) {
            // add new filament.
            
            $material = $this->addMaterial($data);
            $supplier = $this->addSupplier($data);

            $filament->materialId = $material->materialId;
            $filament->supplierId = $supplier->supplierId;
            $filament->name       = $data[self::FILAMENT_NAME];
            $filament->color      = $data[self::COLOUR];
            $filament->size       = floatval($data[self::DIAMETER]);
            
            $filament->filamentId = DAOFactory::getFilamentDAO()->insert($filament);
            
        } else {
            $filament = $existing[0];
        }
        echo " \n fil : " . $filament->name . ' color ' . $filament->color;
        // will need to check existing filament and material. 
        // safe bet, if the filament already exists then we can skip a material check/add
    }
    
    /**
     * @param unknown $data
     */
    function addMaterial($data) {
        // check to see if the material type exists
           // if not then add it.
           // if so then update it.   
        $material = new Material();
        $existing = DAOFactory::getMaterialDAO()->queryByType($data[self::FILAMENT_TYPE]) ;
        
        echo ' material ' . $material->type . ' id ' . $material->materialId . ' data : ' . $data[self::FILAMENT_TYPE];
        
        if ($existing == NULL) {
            $material->type        = $data[self::FILAMENT_TYPE];
            $material->materialId = DAOFactory::getMaterialDAO()->insert($material);
        } else {
            $material = $existing;
        }
        return $material;
    }
    
    /**
     * @param unknown $data
     */
    function addSupplier($data) {
        // check to see if the "supplier exists"
           // if not then add it.
           // if so then we get it's id.

        $supplier = new Supplier();
        $existing = DAOFactory::getSupplierDAO()->queryByCompanyName($data[self::MANUFACTURER]);
    
        if ($existing == NULL) {
            $supplier->type        = 'MATERIAL';
            $supplier->companyName = $data[self::MANUFACTURER];
            $supplier->homepage    = $data[self::USEFUL_LINKS];
            $supplier->supplierId = DAOFactory::getSupplierDAO()->insert($supplier);
            
        } else {
            // need to update
            if (is_array($existing)) {
                $supplier = $existing[0];
            }
        }
        
        return $supplier;
    }
}

$run = new GFSDProcess();

?>