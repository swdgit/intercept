<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
interface MaterialDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Material 
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
	 * get only the materials that this printer can use.
	 * @param unknown $printerId
	 */
	public function queryMaterialsByPrinterId($printerId);
	
	/**
 	 * Delete record from table
 	 * @param material primary key
 	 */
	public function delete($material_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Material material
 	 */
	public function insert($material);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Material material
 	 */
	public function update($material);	

	/**
	 * Delete all rows
	 */
	public function clean();

    public function queryByType($value);

    public function queryByDescription($value);


    public function deleteByType($value);

    public function deleteByDescription($value);


}
?>