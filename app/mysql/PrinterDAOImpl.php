<?php
/**
 * Class that operate on table 'printer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
class PrinterDAOImpl implements PrinterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrinterDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM printer WHERE printer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM printer';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM printer ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * get printers as idenfited by a material type
	 */
	public function queryPrintersByMaterial($materialId) {
	    $sql = 'SELECT p.* FROM printer_material_xref pmx inner join printer p on pmx.printer_id = p.printer_id WHERE pmx.material_id = ?';
	    $sqlQuery = new SqlQuery($sql);
	    $sqlQuery->setNumber($materialId);
	    
	    return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param printer primary key
 	 */
	public function delete($printer_id){
		$sql = 'DELETE FROM printer WHERE printer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($printer_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrinterDAOImpl printer
 	 */
	public function insert($printer){
		$sql = 'INSERT INTO printer (supplier_id, style_id, name, bed_x, bed_y, bed_z, product_url, discontinued, model_number, print_speed_max, print_speed_max_height, layer_max, layer_min, print_surface, nozzle_size, filament_size) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($printer->supplierId);
        $sqlQuery->setNumber($printer->styleId);
        $sqlQuery->set($printer->name);
        $sqlQuery->set($printer->bedX);
        $sqlQuery->set($printer->bedY);
        $sqlQuery->set($printer->bedZ);
        $sqlQuery->set($printer->productUrl);
        $sqlQuery->set($printer->discontinued);
        $sqlQuery->set($printer->modelNumber);
        $sqlQuery->setNumber($printer->printSpeedMax);
        $sqlQuery->set($printer->printSpeedMaxHeight);
        $sqlQuery->set($printer->layerMax);
        $sqlQuery->set($printer->layerMin);
        $sqlQuery->set($printer->printSurface);
        $sqlQuery->setNumber($printer->nozzleSize);
        $sqlQuery->setNumber($printer->filamentSize);
        
		$id = $this->executeInsert($sqlQuery);	
		$printer->printerId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrinterDAOImpl printer
 	 */
	public function update($printer){
		$sql = 'UPDATE printer SET supplier_id = ?, style_id = ?, name = ?, bed_x = ?, bed_y = ?, bed_z = ?, product_url = ?, discontinued = ?, model_number = ?, print_speed_max = ?, print_speed_max_height = ?, layer_max = ?, layer_min = ?, print_surface = ?, nozzle_size = ?, filament_size = ? WHERE printer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($printer->supplierId);
        $sqlQuery->setNumber($printer->styleId);
        $sqlQuery->set($printer->name);
        $sqlQuery->set($printer->bedX);
        $sqlQuery->set($printer->bedY);
        $sqlQuery->set($printer->bedZ);
        $sqlQuery->set($printer->productUrl);
        $sqlQuery->set($printer->discontinued);
        $sqlQuery->set($printer->modelNumber);
        $sqlQuery->setNumber($printer->printSpeedMax);
        $sqlQuery->set($printer->printSpeedMaxHeight);
        $sqlQuery->set($printer->layerMax);
        $sqlQuery->set($printer->layerMin);
        $sqlQuery->set($printer->printSurface);
        $sqlQuery->setNumber($printer->nozzleSize);
        $sqlQuery->setNumber($printer->filamentSize);
        
		$sqlQuery->setNumber($printer->printerId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM printer';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryExisting($supplierId, $name) {
	    $sql = 'SELECT * FROM printer WHERE supplier_id = ? and name = ?';
	    $sqlQuery = new SqlQuery($sql);
	    $sqlQuery->setNumber($supplierId);
	    $sqlQuery->set($name);
	    return $this->getList($sqlQuery);
	}
	
	public function queryBySupplierId($value){
		$sql = 'SELECT * FROM printer WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStyleId($value){
		$sql = 'SELECT * FROM printer WHERE style_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM printer WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBedX($value){
		$sql = 'SELECT * FROM printer WHERE bed_x = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBedY($value){
		$sql = 'SELECT * FROM printer WHERE bed_y = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBedZ($value){
		$sql = 'SELECT * FROM printer WHERE bed_z = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductUrl($value){
		$sql = 'SELECT * FROM printer WHERE product_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDiscontinued($value){
		$sql = 'SELECT * FROM printer WHERE discontinued = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModelNumber($value){
		$sql = 'SELECT * FROM printer WHERE model_number = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrintSpeedMax($value){
		$sql = 'SELECT * FROM printer WHERE print_speed_max = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrintSpeedMaxHeight($value){
		$sql = 'SELECT * FROM printer WHERE print_speed_max_height = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLayerMax($value){
		$sql = 'SELECT * FROM printer WHERE layer_max = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLayerMin($value){
		$sql = 'SELECT * FROM printer WHERE layer_min = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrintSurface($value){
		$sql = 'SELECT * FROM printer WHERE print_surface = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySupplierId($value){
		$sql = 'DELETE FROM printer WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStyleId($value){
		$sql = 'DELETE FROM printer WHERE style_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM printer WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBedX($value){
		$sql = 'DELETE FROM printer WHERE bed_x = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBedY($value){
		$sql = 'DELETE FROM printer WHERE bed_y = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBedZ($value){
		$sql = 'DELETE FROM printer WHERE bed_z = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductUrl($value){
		$sql = 'DELETE FROM printer WHERE product_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDiscontinued($value){
		$sql = 'DELETE FROM printer WHERE discontinued = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModelNumber($value){
		$sql = 'DELETE FROM printer WHERE model_number = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrintSpeedMax($value){
		$sql = 'DELETE FROM printer WHERE print_speed_max = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrintSpeedMaxHeight($value){
		$sql = 'DELETE FROM printer WHERE print_speed_max_height = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLayerMax($value){
		$sql = 'DELETE FROM printer WHERE layer_max = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLayerMin($value){
		$sql = 'DELETE FROM printer WHERE layer_min = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrintSurface($value){
		$sql = 'DELETE FROM printer WHERE print_surface = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrinterDAOImpl 
	 */
	protected function readRow($row){
		$printer = new Printer();
		
        $printer->printerId = $row['printer_id'];
        $printer->supplierId = $row['supplier_id'];
        $printer->styleId = $row['style_id'];
        $printer->name = $row['name'];
        $printer->bedX = $row['bed_x'];
        $printer->bedY = $row['bed_y'];
        $printer->bedZ = $row['bed_z'];
        $printer->productUrl = $row['product_url'];
        $printer->discontinued = $row['discontinued'];
        $printer->modelNumber = $row['model_number'];
        $printer->printSpeedMax = $row['print_speed_max'];
        $printer->printSpeedMaxHeight = $row['print_speed_max_height'];
        $printer->layerMax = $row['layer_max'];
        $printer->layerMin = $row['layer_min'];
        $printer->printSurface = $row['print_surface'];
        $printer->nozzleSize = $row['nozzle_size'];
        $printer->filamentSize = $row['filament_size'];
        
		return $printer;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PrinterDAOImpl 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>