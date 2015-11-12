<?php
/**
 * Class that operate on table 'printer_material_xref'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-23 09:10
 */
class PrinterMaterialXrefDAOImpl implements PrinterMaterialXrefDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrinterMaterialXrefDAOImpl 
	 */
	public function load($id){
		$sql = 'SELECT * FROM printer_material_xref WHERE printer_material_xref_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM printer_material_xref';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM printer_material_xref ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/** 
	 * xref data of printer, material and supplier... todo why did I need this one again or was it testing.....
	 * @see PrinterMaterialXrefDAO::queryMatrix()
	 */
	public function queryMatrix() {

	   $sql = 'select pmx.printer_id, pmx.material_id, s.supplier_id, s.company_name, p.name, m.type '.
              'from   printer_material_xref pmx '.
              '    inner join printer p  '.
              '      on pmx.printer_id = p.printer_id '.
              '    inner join material m '.
              '      on pmx.material_id = m.material_id '.
              '    inner join supplier s '.
              '      on p.supplier_id = s.supplier_id';

	   $sqlQuery = new SqlQuery($sql);
	   
	   return $this->getMatrixList($sqlQuery);
	}
	
	
	/**
 	 * Delete record from table
 	 * @param printerMaterialXref primary key
 	 */
	public function delete($printer_material_xref_id){
		$sql = 'DELETE FROM printer_material_xref WHERE printer_material_xref_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($printer_material_xref_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrinterMaterialXrefDAOImpl printerMaterialXref
 	 */
	public function insert($printerMaterialXref){
		$sql = 'INSERT INTO printer_material_xref (printer_id, material_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($printerMaterialXref->printerId);
        $sqlQuery->setNumber($printerMaterialXref->materialId);

		$id = $this->executeInsert($sqlQuery);	
		$printerMaterialXref->printerMaterialXrefId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrinterMaterialXrefDAOImpl printerMaterialXref
 	 */
	public function update($printerMaterialXref){
		$sql = 'UPDATE printer_material_xref SET printer_id = ?, material_id = ? WHERE printer_material_xref_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
        $sqlQuery->setNumber($printerMaterialXref->printerId);
        $sqlQuery->setNumber($printerMaterialXref->materialId);

		$sqlQuery->setNumber($printerMaterialXref->printerMaterialXrefId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM printer_material_xref';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPrinterId($value){
		$sql = 'SELECT * FROM printer_material_xref WHERE printer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialId($value){
		$sql = 'SELECT * FROM printer_material_xref WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPrinterId($value){
		$sql = 'DELETE FROM printer_material_xref WHERE printer_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialId($value){
		$sql = 'DELETE FROM printer_material_xref WHERE material_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrinterMaterialXrefDAOImpl 
	 */
	protected function readRow($row){
		$printerMaterialXref = new PrinterMaterialXref();
		
        $printerMaterialXref->printerMaterialXrefId = $row['printer_material_xref_id'];
        $printerMaterialXref->printerId = $row['printer_id'];
        $printerMaterialXref->materialId = $row['material_id'];

		return $printerMaterialXref;
	}
	
	protected function readMatrixRow($row){
		$pmm = new PrinterMaterialMatrix();
		
        $pmm->printerMaterialXrefId = $row['printer_material_xref_id'];
        $pmm->printerId   = $row['printer_id'];
        $pmm->materialId  = $row['material_id'];
        $pmm->printerName = $row['name'];
        $pmm->supplierId  = $row['supplier_id'];
        $pmm->companyName = $row['company_name'];
        $pmm->modelType   = $row['type'];

		return $pmm;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	protected function getMatrixList($sqlQuery){
	    $tab = QueryExecutor::execute($sqlQuery);
	    $ret = array();
	    for($i=0;$i<count($tab);$i++){
	        $ret[$i] = $this->readMatrixRow($tab[$i]);
	    }
	    return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PrinterMaterialXrefDAOImpl 
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