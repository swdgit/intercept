<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-28 12:14
 */
interface StyleDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Style 
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
 	 * @param style primary key
 	 */
	public function delete($style_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Style style
 	 */
	public function insert($style);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Style style
 	 */
	public function update($style);	

	/**
	 * Delete all rows
	 */
	public function clean();

    public function queryByTechnology($value);

    public function queryByWikiLink($value);

    public function queryByDescription($value);


    public function deleteByTechnology($value);

    public function deleteByWikiLink($value);

    public function deleteByDescription($value);


}
?>