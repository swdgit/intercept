<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
    /**
     * @return FilamentDAO
     */
    public static function getFilamentDAO(){
        return new FilamentDAOImpl();
    }

    /**
     * @return MaterialDAO
     */
    public static function getMaterialDAO(){
        return new MaterialDAOImpl();
    }

    /**
     * @return MaterialCompositionDAO
     */
    public static function getMaterialCompositionDAO(){
        return new MaterialCompositionDAOImpl();
    }

    /**
     * @return PrinterDAO
     */
    public static function getPrinterDAO(){
        return new PrinterDAOImpl();
    }

    /**
     * @return PrinterMaterialXrefDAO
     */
    public static function getPrinterMaterialXrefDAO(){
        return new PrinterMaterialXrefDAOImpl();
    }

    /**
     * @return SupplierDAO
     */
    public static function getSupplierDAO(){
        return new SupplierDAOImpl();
    }


}
?>