<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-05-04 16:44
 */
interface RfiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Rfi 
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
 	 * @param rfi primary key
 	 */
	public function delete($id_rfi);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Rfi rfi
 	 */
	public function insert($rfi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Rfi rfi
 	 */
	public function update($rfi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdFrn($value);

	public function queryByRfiRemp($value);

	public function queryByOrganRfi($value);

	public function queryByPfRfi($value);

	public function queryByBilanRfi($value);


	public function deleteByIdFrn($value);

	public function deleteByRfiRemp($value);

	public function deleteByOrganRfi($value);

	public function deleteByPfRfi($value);

	public function deleteByBilanRfi($value);


}
?>