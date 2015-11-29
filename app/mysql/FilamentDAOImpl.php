<?php
/**
 * Class that operate on table 'filament'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
class FilamentDAOImpl implements FilamentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FilamentDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM filament WHERE filament_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM filament';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM filament ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param filament primary key
 	 */
	public function delete($filament_id){
		$sql = 'DELETE FROM filament WHERE filament_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($filament_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FilamentDAOImpl filament
 	 */
	public function insert($filament){
		$sql = 'INSERT INTO filament (supplier_id, material_id, name, color, size, max_temp, min_temp, description, weight, product_url, discontinued) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($filament->supplierId);
        $sqlQuery->setNumber($filament->materialId);
        $sqlQuery->set($filament->name);
        $sqlQuery->set($filament->color);
        $sqlQuery->set($filament->size);
        $sqlQuery->setNumber($filament->maxTemp);
        $sqlQuery->setNumber($filament->minTemp);
        $sqlQuery->set($filament->description);
        $sqlQuery->set($filament->weight);
        $sqlQuery->set($filament->productUrl);
        $sqlQuery->set($filament->discontinued);

		$id = $this->executeInsert($sqlQuery);	
		$filament->filamentId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FilamentDAOImpl filament
 	 */
	public function update($filament){
		$sql = 'UPDATE filament SET supplier_id = ?, material_id = ?, name = ?, color = ?, size = ?, max_temp = ?, min_temp = ?, description = ?, weight = ?, product_url = ?, discontinued = ? WHERE filament_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($filament->supplierId);
        $sqlQuery->setNumber($filament->materialId);
        $sqlQuery->set($filament->name);
        $sqlQuery->set($filament->color);
        $sqlQuery->set($filament->size);
        $sqlQuery->setNumber($filament->maxTemp);
        $sqlQuery->setNumber($filament->minTemp);
        $sqlQuery->set($filament->description);
        $sqlQuery->set($filament->weight);
        $sqlQuery->set($filament->productUrl);
        $sqlQuery->set($filament->discontinued);

		$sqlQuery->setNumber($filament->filamentId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM filament';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function queryFilamentsByPrinterId($printerId) {
	    $sql = 'SELECT * FROM filament WHERE supplier_id = ?';
	    $sqlQuery = new SqlQuery($sql);
	    $sqlQuery->setNumber($value);
	    return $this->getList($sqlQuery);

	}
	public function queryBySupplierId($value){
		$sql = 'SELECT * FROM filament WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialId($value){
		$sql = 'SELECT * FROM filament WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
	
    public function queryByKeys($name, 
                                $type, 
                                $color, 
                                $diameter) {

        $material = DAOFactory::getMaterialDAO()->queryByType($type);
        
        $sql = 'select * from filament where name = ? and material_id = ? and color = ? and size = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($name);
        $sqlQuery->setNumber($material->materialId);
        $sqlQuery->set($color);
        $sqlQuery->setNumber($diameter);
        
        return $this->getList($sqlQuery);        
    }

    public function queryByName($value) {
        $sql = 'select * from filament where name = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }
    
    public function queryByColor($value) {
        $sql = 'select * from filament where color = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }
    
    public function queryBySize($value){
		$sql = 'SELECT * FROM filament WHERE size = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaxTemp($value){
		$sql = 'SELECT * FROM filament WHERE max_temp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinTemp($value){
		$sql = 'SELECT * FROM filament WHERE min_temp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM filament WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWeight($value){
		$sql = 'SELECT * FROM filament WHERE weight = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProductUrl($value){
		$sql = 'SELECT * FROM filament WHERE product_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDiscontinued($value){
		$sql = 'SELECT * FROM filament WHERE discontinued = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySupplierId($value){
		$sql = 'DELETE FROM filament WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialId($value){
		$sql = 'DELETE FROM filament WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySize($value){
		$sql = 'DELETE FROM filament WHERE size = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaxTemp($value){
		$sql = 'DELETE FROM filament WHERE max_temp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinTemp($value){
		$sql = 'DELETE FROM filament WHERE min_temp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM filament WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWeight($value){
		$sql = 'DELETE FROM filament WHERE weight = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProductUrl($value){
		$sql = 'DELETE FROM filament WHERE product_url = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDiscontinued($value){
		$sql = 'DELETE FROM filament WHERE discontinued = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FilamentDAOImpl 
	 */
	protected function readRow($row){
		$filament = new Filament();
		
        $filament->filamentId = $row['filament_id'];
        $filament->supplierId = $row['supplier_id'];
        $filament->materialId = $row['material_id'];
        $filament->name       = $row['name'];
        $filament->color      = $row['color'];
        $filament->size = $row['size'];
        $filament->maxTemp = $row['max_temp'];
        $filament->minTemp = $row['min_temp'];
        $filament->description = $row['description'];
        $filament->weight = $row['weight'];
        $filament->productUrl = $row['product_url'];
        $filament->discontinued = $row['discontinued'];

		return $filament;
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
	 * @return FilamentDAOImpl 
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