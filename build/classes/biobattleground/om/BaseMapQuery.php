<?php


/**
 * Base class that represents a query for the 'map' table.
 *
 * 
 *
 * @method     MapQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MapQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     MapQuery orderByMapString($order = Criteria::ASC) Order by the map_string column
 *
 * @method     MapQuery groupById() Group by the id column
 * @method     MapQuery groupByName() Group by the name column
 * @method     MapQuery groupByMapString() Group by the map_string column
 *
 * @method     MapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MapQuery leftJoinUserPrivileges($relationAlias = '') Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     MapQuery rightJoinUserPrivileges($relationAlias = '') Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     MapQuery innerJoinUserPrivileges($relationAlias = '') Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     MapQuery leftJoinSimulation($relationAlias = '') Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     MapQuery rightJoinSimulation($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     MapQuery innerJoinSimulation($relationAlias = '') Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     Map findOne(PropelPDO $con = null) Return the first Map matching the query
 * @method     Map findOneById(int $id) Return the first Map filtered by the id column
 * @method     Map findOneByName(string $name) Return the first Map filtered by the name column
 * @method     Map findOneByMapString(string $map_string) Return the first Map filtered by the map_string column
 *
 * @method     array findById(int $id) Return Map objects filtered by the id column
 * @method     array findByName(string $name) Return Map objects filtered by the name column
 * @method     array findByMapString(string $map_string) Return Map objects filtered by the map_string column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseMapQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMapQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'Map', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MapQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MapQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MapQuery) {
			return $criteria;
		}
		$query = new MapQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Map|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MapPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$stmt = $this
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $this->getFormatter()->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MapPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MapPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MapPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($name)) {
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		} elseif (preg_match('/[\%\*]/', $name)) {
			$name = str_replace('*', '%', $name);
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MapPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the map_string column
	 * 
	 * @param     string $mapString The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterByMapString($mapString = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($mapString)) {
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		} elseif (preg_match('/[\%\*]/', $mapString)) {
			$mapString = str_replace('*', '%', $mapString);
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MapPeer::MAP_STRING, $mapString, $comparison);
	}

	/**
	 * Filter the query by a related UserPrivileges object
	 *
	 * @param     UserPrivileges $userPrivileges  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterByUserPrivileges($userPrivileges, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(MapPeer::ID, $userPrivileges->getIdMap(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserPrivileges relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function joinUserPrivileges($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserPrivileges');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'UserPrivileges');
		}
		
		return $this;
	}

	/**
	 * Use the UserPrivileges relation UserPrivileges object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery A secondary query class using the current class as primary query
	 */
	public function useUserPrivilegesQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUserPrivileges($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserPrivileges', 'UserPrivilegesQuery');
	}

	/**
	 * Filter the query by a related Simulation object
	 *
	 * @param     Simulation $simulation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(MapPeer::ID, $simulation->getIdMap(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Simulation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function joinSimulation($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Simulation');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Simulation');
		}
		
		return $this;
	}

	/**
	 * Use the Simulation relation Simulation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery A secondary query class using the current class as primary query
	 */
	public function useSimulationQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSimulation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Simulation', 'SimulationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Map $map Object to remove from the list of results
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function prune($map = null)
	{
		if ($map) {
			$this->addUsingAlias(MapPeer::ID, $map->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		return $this->preDelete($con);
	}

	/**
	 * Code to execute before every UPDATE statement
	 * 
	 * @param     array $values The associatiove array of columns and values for the update
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreUpdate(&$values, PropelPDO $con)
	{
		return $this->preUpdate($values, $con);
	}

} // BaseMapQuery
