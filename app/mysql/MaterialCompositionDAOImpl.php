<?php
/**
 * Class that operate on table 'material_composition'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
class MaterialCompositionDAOImpl implements MaterialCompositionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaterialCompositionDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM material_composition WHERE material_composition_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM material_composition';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM material_composition ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param materialComposition primary key
 	 */
	public function delete($material_composition_id){
		$sql = 'DELETE FROM material_composition WHERE material_composition_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($material_composition_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialCompositionDAOImpl materialComposition
 	 */
	public function insert($materialComposition){
		$sql = 'INSERT INTO material_composition (material_id, material_type, percentage) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($materialComposition->materialId);
        $sqlQuery->set($materialComposition->materialType);
        $sqlQuery->setNumber($materialComposition->percentage);

		$id = $this->executeInsert($sqlQuery);	
		$materialComposition->materialCompositionId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialCompositionDAOImpl materialComposition
 	 */
	public function update($materialComposition){
		$sql = 'UPDATE material_composition SET material_id = ?, material_type = ?, percentage = ? WHERE material_composition_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($materialComposition->materialId);
        $sqlQuery->set($materialComposition->materialType);
        $sqlQuery->setNumber($materialComposition->percentage);

		$sqlQuery->setNumber($materialComposition->materialCompositionId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM material_composition';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMaterialId($value){
		$sql = 'SELECT * FROM material_composition WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialType($value){
		$sql = 'SELECT * FROM material_composition WHERE material_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPercentage($value){
		$sql = 'SELECT * FROM material_composition WHERE percentage = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMaterialId($value){
		$sql = 'DELETE FROM material_composition WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialType($value){
		$sql = 'DELETE FROM material_composition WHERE material_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPercentage($value){
		$sql = 'DELETE FROM material_composition WHERE percentage = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaterialCompositionDAOImpl 
	 */
	protected function readRow($row){
		$materialComposition = new MaterialComposition();
		
        $materialComposition->materialCompositionId = $row['material_composition_id'];
        $materialComposition->materialId = $row['material_id'];
        $materialComposition->materialType = $row['material_type'];
        $materialComposition->percentage = $row['percentage'];

		return $materialComposition;
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
	 * @return MaterialCompositionDAOImpl 
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