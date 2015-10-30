<?php
/**
 * Class that operate on table 'style'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-28 12:14
 */
class StyleDAOImpl implements StyleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return StyleDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM style WHERE style_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM style';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM style ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param style primary key
 	 */
	public function delete($style_id){
		$sql = 'DELETE FROM style WHERE style_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($style_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StyleDAOImpl style
 	 */
	public function insert($style){
		$sql = 'INSERT INTO style (technology, wiki_link, description) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->set($style->technology);
        $sqlQuery->set($style->wikiLink);
        $sqlQuery->set($style->description);

		$id = $this->executeInsert($sqlQuery);	
		$style->styleId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param StyleDAOImpl style
 	 */
	public function update($style){
		$sql = 'UPDATE style SET technology = ?, wiki_link = ?, description = ? WHERE style_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->set($style->technology);
        $sqlQuery->set($style->wikiLink);
        $sqlQuery->set($style->description);

		$sqlQuery->setNumber($style->styleId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM style';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTechnology($value){
		$sql = 'SELECT * FROM style WHERE technology = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWikiLink($value){
		$sql = 'SELECT * FROM style WHERE wiki_link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM style WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTechnology($value){
		$sql = 'DELETE FROM style WHERE technology = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWikiLink($value){
		$sql = 'DELETE FROM style WHERE wiki_link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM style WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return StyleDAOImpl 
	 */
	protected function readRow($row){
		$style = new Style();
		
        $style->styleId = $row['style_id'];
        $style->technology = $row['technology'];
        $style->wikiLink = $row['wiki_link'];
        $style->description = $row['description'];

		return $style;
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
	 * @return StyleDAOImpl 
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