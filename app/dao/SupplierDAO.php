<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
interface SupplierDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Supplier 
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
 	 * @param supplier primary key
 	 */
	public function delete($supplier_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Supplier supplier
 	 */
	public function insert($supplier);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Supplier supplier
 	 */
	public function update($supplier);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByType($type);
	
    public function queryByCompanyName($value);

    public function queryByContactName($value);

    public function queryByContactTitle($value);

    public function queryByAddress($value);

    public function queryByCity($value);

    public function queryByRegion($value);

    public function queryByPostalCode($value);

    public function queryByCountry($value);

    public function queryByPhone($value);

    public function queryByFax($value);

    public function queryByHomepage($value);


    public function deleteByCompanyName($value);

    public function deleteByContactName($value);

    public function deleteByContactTitle($value);

    public function deleteByAddress($value);

    public function deleteByCity($value);

    public function deleteByRegion($value);

    public function deleteByPostalCode($value);

    public function deleteByCountry($value);

    public function deleteByPhone($value);

    public function deleteByFax($value);

    public function deleteByHomepage($value);


}
?>