<?php
class MaterialAPI {
    
    /**
     * save or update a material
     * @param unknown $params
     * @return Ambigous <Material, unknown>
     */
    public static function setMaterial($params) {
        $material = new Material();

        $materials = DAOFactory::getMaterialDAO()->queryByType($params['type']);

        if (count($materials) == 0) {
            $material->type = $params['type'];
            $material->description = $params['description'];
            $material->materialId = DAOFactory::getMaterialDAO()->insert($material);
        } else {
            $material = $materials[0];
        }
        return $material;
    }
    
    /**
     * pull back the materials based on a given printer
     * @param unknown $printerId
     */
    public static function getMaterials($printerId) {

        $materials = DAOFactory::getMaterialDAO()->queryMaterialsByPrinterId($printerId);

        return $materials;
    }
}