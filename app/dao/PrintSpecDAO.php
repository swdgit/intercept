<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-28 12:14
 */
interface PrintSpecDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrintSpec 
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
 	 * @param printSpec primary key
 	 */
	public function delete($print_spec_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrintSpec printSpec
 	 */
	public function insert($printSpec);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrintSpec printSpec
 	 */
	public function update($printSpec);	

	/**
	 * Delete all rows
	 */
	public function clean();

    public function queryByPrinterMaterialXrefId($value);

    public function queryByTitle($value);

    public function queryByDescription($value);

    public function queryByRecommendations($value);

    public function queryByProfile($value);


    public function deleteByPrinterMaterialXrefId($value);

    public function deleteByTitle($value);

    public function deleteByDescription($value);

    public function deleteByRecommendations($value);

    public function deleteByProfile($value);


}
?>