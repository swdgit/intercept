<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
interface PrinterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Printer 
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
 	 * @param printer primary key
 	 */
	public function delete($printer_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Printer printer
 	 */
	public function insert($printer);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Printer printer
 	 */
	public function update($printer);	

	/**
	 * Delete all rows
	 */
	public function clean();

    public function queryBySupplierId($value);

    public function queryByStyleId($value);

    public function queryByName($value);

    public function queryByBedX($value);

    public function queryByBedY($value);

    public function queryByBedZ($value);

    public function queryByProductUrl($value);

    public function queryByDiscontinued($value);

    public function queryByModelNumber($value);

    public function queryByPrintSpeedMax($value);

    public function queryByPrintSpeedMaxHeight($value);

    public function queryByLayerMax($value);

    public function queryByLayerMin($value);

    public function queryByPrintSurface($value);
    
    public function queryPrintersByMaterial($materialId);


    public function deleteBySupplierId($value);

    public function deleteByStyleId($value);

    public function deleteByName($value);

    public function deleteByBedX($value);

    public function deleteByBedY($value);

    public function deleteByBedZ($value);

    public function deleteByProductUrl($value);

    public function deleteByDiscontinued($value);

    public function deleteByModelNumber($value);

    public function deleteByPrintSpeedMax($value);

    public function deleteByPrintSpeedMaxHeight($value);

    public function deleteByLayerMax($value);

    public function deleteByLayerMin($value);

    public function deleteByPrintSurface($value);


}
?>