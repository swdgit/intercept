<?php
/**
 * Class that operate on table 'supplier'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
class SupplierDAOImpl implements SupplierDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SupplierDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM supplier WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM supplier';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM supplier ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param supplier primary key
 	 */
	public function delete($supplier_id){
		$sql = 'DELETE FROM supplier WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($supplier_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SupplierDAOImpl supplier
 	 */
	public function insert($supplier){
		$sql = 'INSERT INTO supplier (company_name, contact_name, contact_title, address, city, region, postal_code, country, phone, fax, homepage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->set($supplier->companyName);
        $sqlQuery->set($supplier->contactName);
        $sqlQuery->set($supplier->contactTitle);
        $sqlQuery->set($supplier->address);
        $sqlQuery->set($supplier->city);
        $sqlQuery->set($supplier->region);
        $sqlQuery->set($supplier->postalCode);
        $sqlQuery->set($supplier->country);
        $sqlQuery->set($supplier->phone);
        $sqlQuery->set($supplier->fax);
        $sqlQuery->set($supplier->homepage);

		$id = $this->executeInsert($sqlQuery);	
		$supplier->supplierId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SupplierDAOImpl supplier
 	 */
	public function update($supplier){
		$sql = 'UPDATE supplier SET company_name = ?, contact_name = ?, contact_title = ?, address = ?, city = ?, region = ?, postal_code = ?, country = ?, phone = ?, fax = ?, homepage = ? WHERE supplier_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->set($supplier->companyName);
        $sqlQuery->set($supplier->contactName);
        $sqlQuery->set($supplier->contactTitle);
        $sqlQuery->set($supplier->address);
        $sqlQuery->set($supplier->city);
        $sqlQuery->set($supplier->region);
        $sqlQuery->set($supplier->postalCode);
        $sqlQuery->set($supplier->country);
        $sqlQuery->set($supplier->phone);
        $sqlQuery->set($supplier->fax);
        $sqlQuery->set($supplier->homepage);

		$sqlQuery->setNumber($supplier->supplierId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM supplier';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCompanyName($value){
		$sql = 'SELECT * FROM supplier WHERE company_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContactName($value){
		$sql = 'SELECT * FROM supplier WHERE contact_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContactTitle($value){
		$sql = 'SELECT * FROM supplier WHERE contact_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value){
		$sql = 'SELECT * FROM supplier WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM supplier WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegion($value){
		$sql = 'SELECT * FROM supplier WHERE region = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostalCode($value){
		$sql = 'SELECT * FROM supplier WHERE postal_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCountry($value){
		$sql = 'SELECT * FROM supplier WHERE country = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone($value){
		$sql = 'SELECT * FROM supplier WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM supplier WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHomepage($value){
		$sql = 'SELECT * FROM supplier WHERE homepage = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCompanyName($value){
		$sql = 'DELETE FROM supplier WHERE company_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContactName($value){
		$sql = 'DELETE FROM supplier WHERE contact_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContactTitle($value){
		$sql = 'DELETE FROM supplier WHERE contact_title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM supplier WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM supplier WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegion($value){
		$sql = 'DELETE FROM supplier WHERE region = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostalCode($value){
		$sql = 'DELETE FROM supplier WHERE postal_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCountry($value){
		$sql = 'DELETE FROM supplier WHERE country = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone($value){
		$sql = 'DELETE FROM supplier WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM supplier WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHomepage($value){
		$sql = 'DELETE FROM supplier WHERE homepage = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SupplierDAOImpl 
	 */
	protected function readRow($row){
		$supplier = new Supplier();
		
        $supplier->supplierId = $row['supplier_id'];
        $supplier->companyName = $row['company_name'];
        $supplier->contactName = $row['contact_name'];
        $supplier->contactTitle = $row['contact_title'];
        $supplier->address = $row['address'];
        $supplier->city = $row['city'];
        $supplier->region = $row['region'];
        $supplier->postalCode = $row['postal_code'];
        $supplier->country = $row['country'];
        $supplier->phone = $row['phone'];
        $supplier->fax = $row['fax'];
        $supplier->homepage = $row['homepage'];

		return $supplier;
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
	 * @return SupplierDAOImpl 
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