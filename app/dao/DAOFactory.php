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
     * @return PrintSpecDAO
     */
    public static function getPrintSpecDAO(){
        return new PrintSpecDAOImpl();
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
     * @return StyleDAO
     */
    public static function getStyleDAO(){
        return new StyleDAOImpl();
    }

    /**
     * @return SupplierDAO
     */
    public static function getSupplierDAO(){
        return new SupplierDAOImpl();
    }


}
?>