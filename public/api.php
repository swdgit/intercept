<?php
    require '../vendor/autoload.php';
    require '../app/autoload.php';

    $app = new \Slim\Slim();

    /**
     * Base data retrieval for the app. Printers, Materials, Spec
     */
    $app->group('/api', function() use ($app) {
    
        $app->get('/printers', function () use($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody(json_encode(Intercept::getPrinters()));
        });
            
        $app->get('/materials', function () use($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody(json_encode(Intercept::getMaterials()));
        });
        
        $app->get('/filament', function() use($app) {
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody(json_encode(Intercept::getFilament()));
        });
        
        $app->get('/spec/:printerId/:materialId', function($printerId, $materialId) {
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody(json_encode(Intercept::getSpecs($printerId, $materialId)));
        });

        /**
         * need to be able to add data to the system
         */
        $app->group('/add', function() use ($app) {
    
            $app->post('/printer', function() use ($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(PrinterAPI::setPrinter($app->request->get())));            
            });
            
            $app->post('/material', function() use ($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(MaterialAPI::setMaterial($app->request->get())));
            });
    
            $app->post('/spec', function() use ($app) {
                // pass in all of the request parameters             
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(PrinterSpec::setPrinterSpec($app->request->get())));
            });
            
            $app->post('/supplier', function() use ($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(SupplierAPI::setSupplier($app->request->get())));
            });
        });

        /**
         * get specific items 
         */
        
        $app->group('/get', function() use ($app) {
    
            $app->get('/supplier/:supplierId', function($supplierId) use ($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(SupplierAPI::getSupplier($supplierId)));
            });
            
            $app->get('/materials/:printerId', function($printerId) use ($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(MaterialAPI::getMaterials($printerId)));
            });
            
            $app->get('/printers/:materialId', function($materialId) use ($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(PrinterAPI::getPrinters($materialId)));
            });
            
            $app->get('', function($filamentId) use($app) {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode(FilamentAPI::getFilaments($printerId)));
            });
            
            $app->get('/suppliers/:type', function($type) use($app) {
                $suppliers = NULL;
                $lookup    = NULL;
                
                $app->response->headers->set('Content-Type', 'application/json');

                switch ($type) {
                    case "PRINTER" : {
                        $lookup = 'PRINTER';
                        break;
                    }
                    case "MATERIAL" : {
                        $lookup = 'MATERIAL';
                        break;
                    }
                    default: {
                        $lookup = NULL;
                    }
                }
                
                if ($lookup != NULL) {
                    
                    $suppliers = SupplierAPI::getSuppliersByType($lookup);
                }
                
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setBody(json_encode($suppliers));

            });
            
        });
    });
    
    
    $app->run();
?>