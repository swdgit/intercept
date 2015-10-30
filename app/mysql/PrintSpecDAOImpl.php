<?php
/**
 * Class that operate on table 'print_spec'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-28 12:14
 */
class PrintSpecDAOImpl implements PrintSpecDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrintSpecDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM print_spec WHERE print_spec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM print_spec';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM print_spec ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param printSpec primary key
 	 */
	public function delete($print_spec_id){
		$sql = 'DELETE FROM print_spec WHERE print_spec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($print_spec_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrintSpecDAOImpl printSpec
 	 */
	public function insert($printSpec){
		$sql = 'INSERT INTO print_spec (printer_material_xref_id, title, description, recommendations, profile) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($printSpec->printerMaterialXrefId);
        $sqlQuery->set($printSpec->title);
        $sqlQuery->set($printSpec->description);
        $sqlQuery->set($printSpec->recommendations);
        $sqlQuery->set($printSpec->profile);

		$id = $this->executeInsert($sqlQuery);	
		$printSpec->printSpecId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrintSpecDAOImpl printSpec
 	 */
	public function update($printSpec){
		$sql = 'UPDATE print_spec SET printer_material_xref_id = ?, title = ?, description = ?, recommendations = ?, profile = ? WHERE print_spec_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($printSpec->printerMaterialXrefId);
        $sqlQuery->set($printSpec->title);
        $sqlQuery->set($printSpec->description);
        $sqlQuery->set($printSpec->recommendations);
        $sqlQuery->set($printSpec->profile);

		$sqlQuery->setNumber($printSpec->printSpecId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM print_spec';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPrinterMaterialXrefId($value){
		$sql = 'SELECT * FROM print_spec WHERE printer_material_xref_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitle($value){
		$sql = 'SELECT * FROM print_spec WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM print_spec WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecommendations($value){
		$sql = 'SELECT * FROM print_spec WHERE recommendations = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProfile($value){
		$sql = 'SELECT * FROM print_spec WHERE profile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPrinterMaterialXrefId($value){
		$sql = 'DELETE FROM print_spec WHERE printer_material_xref_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitle($value){
		$sql = 'DELETE FROM print_spec WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM print_spec WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecommendations($value){
		$sql = 'DELETE FROM print_spec WHERE recommendations = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProfile($value){
		$sql = 'DELETE FROM print_spec WHERE profile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrintSpecDAOImpl 
	 */
	protected function readRow($row){
		$printSpec = new PrintSpec();
		
        $printSpec->printSpecId = $row['print_spec_id'];
        $printSpec->printerMaterialXrefId = $row['printer_material_xref_id'];
        $printSpec->title = $row['title'];
        $printSpec->description = $row['description'];
        $printSpec->recommendations = $row['recommendations'];
        $printSpec->profile = $row['profile'];

		return $printSpec;
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
	 * @return PrintSpecDAOImpl 
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