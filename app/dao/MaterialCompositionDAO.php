<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
interface MaterialCompositionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaterialComposition 
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
 	 * @param materialComposition primary key
 	 */
	public function delete($material_composition_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialComposition materialComposition
 	 */
	public function insert($materialComposition);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialComposition materialComposition
 	 */
	public function update($materialComposition);	

	/**
	 * Delete all rows
	 */
	public function clean();

    public function queryByMaterialId($value);

    public function queryByMaterialType($value);

    public function queryByPercentage($value);


    public function deleteByMaterialId($value);

    public function deleteByMaterialType($value);

    public function deleteByPercentage($value);


}
?>