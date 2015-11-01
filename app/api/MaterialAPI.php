<?php
class MaterialAPI {
    
    /**
     * save or update a material
     * @param unknown $params
     * @return Ambigous <Material, unknown>
     */
    public static function setMaterial($params) {
        $material = new Material();
         echo 'type' .    $params['type'];
        $materials = DAOFactory::getMaterialDAO()->queryByType($params['type']);
        echo 'count : ' . count($materials);
        if (count($materials) == 0) {
            $material->type = $params['type'];
            $material->description = $params['description'];
            $material->materialId = DAOFactory::getMaterialDAO()->insert($material);
        } else {
            $material = $materials[0];
        }
        return $material;
    }
}