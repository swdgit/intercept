<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
interface PrinterMaterialXrefDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrinterMaterialXref 
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
	 * get the mix of Printer and Materials and Printer supplier
	 */
    public function queryMatrix();
    
	/**
 	 * Delete record from table
 	 * @param printerMaterialXref primary key
 	 */
	public function delete($printer_material_xref_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrinterMaterialXref printerMaterialXref
 	 */
	public function insert($printerMaterialXref);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrinterMaterialXref printerMaterialXref
 	 */
	public function update($printerMaterialXref);	

	/**
	 * Delete all rows
	 */
	public function clean();
	
	public function queryByIds($materialId, $printerId);
	
    public function queryByPrinterId($value);

    public function queryByMaterialId($value);

    public function deleteByPrinterId($value);

    public function deleteByMaterialId($value);


}
?>