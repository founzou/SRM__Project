<?php
/**
 * Class that operate on table 'rfi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-05-04 16:44
 */
class RfiMySqlDAO implements RfiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RfiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM rfi WHERE id_rfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rfi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rfi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rfi primary key
 	 */
	public function delete($id_rfi){
		$sql = 'DELETE FROM rfi WHERE id_rfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_rfi);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RfiMySql rfi
 	 */
	public function insert($rfi){
		$sql = 'INSERT INTO rfi (id_frn, rfiRemp, organRfi, pfRfi, bilanRfi) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rfi->idFrn);
		$sqlQuery->set($rfi->rfiRemp);
		$sqlQuery->set($rfi->organRfi);
		$sqlQuery->set($rfi->pfRfi);
		$sqlQuery->set($rfi->bilanRfi);

		$id = $this->executeInsert($sqlQuery);	
		$rfi->idRfi = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RfiMySql rfi
 	 */
	public function update($rfi){
		$sql = 'UPDATE rfi SET id_frn = ?, rfiRemp = ?, organRfi = ?, pfRfi = ?, bilanRfi = ? WHERE id_rfi = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rfi->idFrn);
		$sqlQuery->set($rfi->rfiRemp);
		$sqlQuery->set($rfi->organRfi);
		$sqlQuery->set($rfi->pfRfi);
		$sqlQuery->set($rfi->bilanRfi);

		$sqlQuery->setNumber($rfi->idRfi);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rfi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdFrn($value){
		$sql = 'SELECT * FROM rfi WHERE id_frn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRfiRemp($value){
		$sql = 'SELECT * FROM rfi WHERE rfiRemp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrganRfi($value){
		$sql = 'SELECT * FROM rfi WHERE organRfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPfRfi($value){
		$sql = 'SELECT * FROM rfi WHERE pfRfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBilanRfi($value){
		$sql = 'SELECT * FROM rfi WHERE bilanRfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdFrn($value){
		$sql = 'DELETE FROM rfi WHERE id_frn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRfiRemp($value){
		$sql = 'DELETE FROM rfi WHERE rfiRemp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrganRfi($value){
		$sql = 'DELETE FROM rfi WHERE organRfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPfRfi($value){
		$sql = 'DELETE FROM rfi WHERE pfRfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBilanRfi($value){
		$sql = 'DELETE FROM rfi WHERE bilanRfi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RfiMySql 
	 */
	protected function readRow($row){
		$rfi = new Rfi();
		
		$rfi->idRfi = $row['id_rfi'];
		$rfi->idFrn = $row['id_frn'];
		$rfi->rfiRemp = $row['rfiRemp'];
		$rfi->organRfi = $row['organRfi'];
		$rfi->pfRfi = $row['pfRfi'];
		$rfi->bilanRfi = $row['bilanRfi'];

		return $rfi;
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
	 * @return RfiMySql 
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