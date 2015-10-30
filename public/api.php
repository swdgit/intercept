<?php
    require 'vendor/autoload.php';
    require 'app/autoload.php';

    $app = new \Slim\Slim();

    /**
     * Base data retrieval for the app. Printers, Materials, Spec
     */
    $app->group('/api', function() use ($app) {
    
        $app->get('/printers', function () {
            $intercept = new Intercept();
            echo json_encode($intercept->getPrinters());
        });
    
        $app->get('/materials', function () {
            $intercept = new Intercept();
            echo json_encode($intercept->getMaterials());
        });
    
        $app->get('/spec/:printerId/:materialId', function($printerId, $materialId) {
            $intercept = new Intercept();
            echo json_encode($intercept->getSpecs($printerId, $materialId));
        });
    });

    
    /**
     * need to be able to add data to the system
     */
    $app->group('/api/add', function() use ($app) {

        $app->post('/printer', function() use ($app) {
            
            $request = $app->request;
            
            // todo check name first to see if it's already there. if so... update.
            $printer = new Printer();
            $printer->supplierId          = $request->get('supplierId');
            $printer->name                = $request->get('printerName');
            
            $printers = DAOFactory::getPrinterDAO()->queryExisting($printer->supplierId, $printer->name);
            
            if (count($printers) <= 0 ) {
                
                $printer->styleId             = $request->get('styleId');
                $printer->bedX                = $request->get('bedX');            
                $printer->bedY                = $request->get('bedY');
                $printer->bedZ                = $request->get('bedZ');
                $printer->productUrl          = $request->get('productUrl');
                $printer->discontinued        = $request->get('discontinued');
                $printer->modelNumber         = $request->get('modelNumber');
                $printer->printSpeedMax       = $request->get('printSpeedMax');
                $printer->printSpeedMaxHeight = $request->get('printSpeedMaxHeight');
                $printer->layerMax            = $request->get('layerMax');
                $printer->layerMin            = $request->get('layerMin');
                $printer->printSurface        = $request->get('printSurface');
                
                $printer->printerId = DAOFactory::getPrinterDAO()->insert($printer);
            } else {
                // just grab the first one for now.
                $printer = $printers[0];
            }
            
            echo json_encode($printer);
            
        });
        
        $app->post('/material', function() use ($app) {
        
            $request = $app->request;
            
            $material = new Material();
                        
            $material->type = $request->get('type');
            
            $materials = DAOFactory::getMaterialDAO()->queryByType($material->type);
            
            if (count($materials) <= 0) {
                
                $material->description = $request->get('description');
                $material->materialId = DAOFactory::getMaterialDAO()->insert($material);
            } else {
                $material = $materials[0];
            }
            
            echo json_encode($material);            
        });
            
        $app->post('/supplier', function() use ($app) {
        
            $request = $app->request;
        
            $paramValue = $request->get('paramName');
        
        });
        
        
        
    });
    
    $app->run();
?>