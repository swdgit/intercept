<?php
/**
 * Class that operate on table 'material'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
class MaterialDAOImpl implements MaterialDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaterialDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM material WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM material';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM material ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param material primary key
 	 */
	public function delete($material_id){
		$sql = 'DELETE FROM material WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($material_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialDAOImpl material
 	 */
	public function insert($material){
		$sql = 'INSERT INTO material (type, description) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->set($material->type);
        $sqlQuery->set($material->description);

		$id = $this->executeInsert($sqlQuery);	
		$material->materialId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialDAOImpl material
 	 */
	public function update($material){
		$sql = 'UPDATE material SET type = ?, description = ? WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->set($material->type);
        $sqlQuery->set($material->description);

		$sqlQuery->setNumber($material->materialId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM material';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM material WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM material WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryMaterialsByPrinterId($printerId) {
	    $sql = 'SELECT m.* FROM printer_material_xref pmx inner join material m on pmx.material_id = m.material_id WHERE pmx.printer_id = ?';
	    $sqlQuery = new SqlQuery($sql);
	    $sqlQuery->setNumber($printerId);
	     
	    return $this->getList($sqlQuery);
	}
	
	public function deleteByType($value){
		$sql = 'DELETE FROM material WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM material WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaterialDAOImpl 
	 */
	protected function readRow($row){
		$material = new Material();
		
        $material->materialId = $row['material_id'];
        $material->type = $row['type'];
        $material->description = $row['description'];

		return $material;
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
	 * @return MaterialDAOImpl 
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