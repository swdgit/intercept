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

                // skipping the header
                if ($row != 1) { 
                    $this->addFilament($data);
                    $this->addSupplier($data);
                    $this->addPrinterMaterialXref($data);
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
        $existing = DAOFactory::getMaterialDAO()->queryByType($data[self::FILAMENT_TYPE]);
        
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
     * 19        Upgraded DaVinci 1.0                            -- XYZPrinting 20, 20, 20   ABS  .4mm   1.75mm
     * 20        Mini Kossel with 1.75mm E3D V6 (Bowden)         -- DIY         17,  0, 24 (zero indicates diameter of build area) 
     * 21        Printrbot Metal Plus 1.75mm                     -- PrintrBot   25, 25, 25        .4mm   1.75mm    
     * 22        Prusa I3 Rework with 3mm E3D V5 (Geared Direct) -- PrusaPrinters 20, 20, 20      1.75mm http://prusaprinters.org/ 
     * @param unknown $data
     */
    function addPrinterMaterialXref($data) {
        $xref = new PrinterMaterialXref();
        
        echo ' printer ' . $printer->name;
        $material = DAOFactory::getMaterialDAO()->queryByType($data[self::FILAMENT_TYPE]);
        $printers  = DAOFactory::getPrinterDAO()->queryByName($data[self::PRINTER_USED_FOR_TEST]);

        
        $printer;
                
        if ($printers == NULL) {
            $printer = $this->addPrinter($data);
        } else {
            $printer = $printers[0];
        }
        
        $existing = DAOFactory::getPrinterMaterialXrefDAO()->queryByIds($material->materialId, $printer->printerId);
        
        // assign material
        // assign printer      
        // add it to the xref 
        if ($existing == NULL) {
            $printerMaterialXref = new PrinterMaterialXref();
            
            $printerMaterialXref->printerId  = $printer->printerId;
            $printerMaterialXref->materialId = $material->materialId;
            $printerMaterialXref = DAOFactory::getPrinterMaterialXrefDAO()->insert($printerMaterialXref);
        } 
    }
    
    /**
     * 19        Upgraded DaVinci 1.0                            -- XYZPrinting 20, 20, 20   ABS  .4mm   1.75mm
     * 20        Mini Kossel with 1.75mm E3D V6 (Bowden)         -- DIY         17,  0, 24 (zero indicates diameter of build area) 
     * 21        Printrbot Metal Plus 1.75mm                     -- PrintrBot   25, 25, 25        .4mm   1.75mm    
     * 22        Prusa I3 Rework with 3mm E3D V5 (Geared Direct) -- PrusaPrinters 20, 20, 20      1.75mm http://prusaprinters.org/ 
     * @param unknown $data
     */
    function addPrinter($data) {
        $printer = new Printer();
        switch($data[self::PRINTER_USED_FOR_TEST]) {
            case "Upgraded DaVinci 1.0" : 
                $printer->supplierId = 19;
                $printer->bedX = 20;
                $printer->bedY = 20;
                $printer->bedZ = 20;
                $printer->nozzleSize = 0.4;
                $printer->filamentSize = 1.75;
                
                break;
            case "Printrbot Metal Plus 1.75mm" :
                $printer->bedX = 25;
                $printer->bedY = 25;
                $printer->bedZ = 25;
                $printer->nozzleSize = 0.4;
                $printer->filamentSize = 1.75;
                $printer->supplierId = 21;
                break;
            case "Prusa I3 Rework with 3mm E3D V5 (Geared Direct)" : 
                $printer->bedX = 20;
                $printer->bedY = 20;
                $printer->bedZ = 20;
                $printer->nozzleSize = 0.4;
                $printer->filamentSize = 1.75;
                $printer->supplierId = 22;
                break;
            default :
                $printer->supplierId = 20;                
        }
        
        $printer->name = $data[self::PRINTER_USED_FOR_TEST];
        $printer->styleId = 1;
        
        $printer->printerId = DAOFactory::getPrinterDAO()->insert($printer);

        return $printer;
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