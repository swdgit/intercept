<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
interface FilamentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Filament 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param filament primary key
 	 */
	public function delete($filament_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Filament filament
 	 */
	public function insert($filament);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Filament filament
 	 */
	public function update($filament);	

	/**
	 * Delete all rows
	 */
	public function clean();
	
	public function queryFilamentsByPrinterId($printerId);

    public function queryBySupplierId($value);

    public function queryByMaterialId($value);
    
    public function queryByKeys($name, $type, $color, $diameter);
    
    public function queryByName($value);
    
    public function queryByColor($value);

    public function queryBySize($value);

    public function queryByMaxTemp($value);

    public function queryByMinTemp($value);

    public function queryByDescription($value);

    public function queryByWeight($value);

    public function queryByProductUrl($value);

    public function queryByDiscontinued($value);

    public function deleteBySupplierId($value);

    public function deleteByMaterialId($value);

    public function deleteBySize($value);

    public function deleteByMaxTemp($value);

    public function deleteByMinTemp($value);

    public function deleteByDescription($value);

    public function deleteByWeight($value);

    public function deleteByProductUrl($value);

    public function deleteByDiscontinued($value);


}
?>