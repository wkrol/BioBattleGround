<?php


/**
 * Base class that represents a query for the 'simulation' table.
 *
 * 
 *
 * @method     SimulationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SimulationQuery orderByIdClimate($order = Criteria::ASC) Order by the id_climate column
 * @method     SimulationQuery orderByIdMap($order = Criteria::ASC) Order by the id_map column
 * @method     SimulationQuery orderBySimulationLength($order = Criteria::ASC) Order by the simulation_length column
 * @method     SimulationQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     SimulationQuery groupById() Group by the id column
 * @method     SimulationQuery groupByIdClimate() Group by the id_climate column
 * @method     SimulationQuery groupByIdMap() Group by the id_map column
 * @method     SimulationQuery groupBySimulationLength() Group by the simulation_length column
 * @method     SimulationQuery groupByDate() Group by the date column
 *
 * @method     SimulationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SimulationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SimulationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SimulationQuery leftJoinMap($relationAlias = '') Adds a LEFT JOIN clause to the query using the Map relation
 * @method     SimulationQuery rightJoinMap($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Map relation
 * @method     SimulationQuery innerJoinMap($relationAlias = '') Adds a INNER JOIN clause to the query using the Map relation
 *
 * @method     SimulationQuery leftJoinClimate($relationAlias = '') Adds a LEFT JOIN clause to the query using the Climate relation
 * @method     SimulationQuery rightJoinClimate($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Climate relation
 * @method     SimulationQuery innerJoinClimate($relationAlias = '') Adds a INNER JOIN clause to the query using the Climate relation
 *
 * @method     SimulationQuery leftJoinGroup($relationAlias = '') Adds a LEFT JOIN clause to the query using the Group relation
 * @method     SimulationQuery rightJoinGroup($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     SimulationQuery innerJoinGroup($relationAlias = '') Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     SimulationQuery leftJoinRound($relationAlias = '') Adds a LEFT JOIN clause to the query using the Round relation
 * @method     SimulationQuery rightJoinRound($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Round relation
 * @method     SimulationQuery innerJoinRound($relationAlias = '') Adds a INNER JOIN clause to the query using the Round relation
 *
 * @method     Simulation findOne(PropelPDO $con = null) Return the first Simulation matching the query
 * @method     Simulation findOneById(int $id) Return the first Simulation filtered by the id column
 * @method     Simulation findOneByIdClimate(int $id_climate) Return the first Simulation filtered by the id_climate column
 * @method     Simulation findOneByIdMap(int $id_map) Return the first Simulation filtered by the id_map column
 * @method     Simulation findOneBySimulationLength(int $simulation_length) Return the first Simulation filtered by the simulation_length column
 * @method     Simulation findOneByDate(string $date) Return the first Simulation filtered by the date column
 *
 * @method     array findById(int $id) Return Simulation objects filtered by the id column
 * @method     array findByIdClimate(int $id_climate) Return Simulation objects filtered by the id_climate column
 * @method     array findByIdMap(int $id_map) Return Simulation objects filtered by the id_map column
 * @method     array findBySimulationLength(int $simulation_length) Return Simulation objects filtered by the simulation_length column
 * @method     array findByDate(string $date) Return Simulation objects filtered by the date column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseSimulationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSimulationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'Simulation', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SimulationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SimulationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SimulationQuery) {
			return $criteria;
		}
		$query = new SimulationQuery();
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
	 * @return    Simulation|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SimulationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SimulationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SimulationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SimulationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_climate column
	 * 
	 * @param     int|array $idClimate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByIdClimate($idClimate = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($idClimate)) {
			$useMinMax = false;
			if (isset($idClimate['min'])) {
				$this->addUsingAlias(SimulationPeer::ID_CLIMATE, $idClimate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idClimate['max'])) {
				$this->addUsingAlias(SimulationPeer::ID_CLIMATE, $idClimate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::ID_CLIMATE, $idClimate, $comparison);
	}

	/**
	 * Filter the query on the id_map column
	 * 
	 * @param     int|array $idMap The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByIdMap($idMap = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($idMap)) {
			$useMinMax = false;
			if (isset($idMap['min'])) {
				$this->addUsingAlias(SimulationPeer::ID_MAP, $idMap['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idMap['max'])) {
				$this->addUsingAlias(SimulationPeer::ID_MAP, $idMap['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::ID_MAP, $idMap, $comparison);
	}

	/**
	 * Filter the query on the simulation_length column
	 * 
	 * @param     int|array $simulationLength The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterBySimulationLength($simulationLength = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($simulationLength)) {
			$useMinMax = false;
			if (isset($simulationLength['min'])) {
				$this->addUsingAlias(SimulationPeer::SIMULATION_LENGTH, $simulationLength['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($simulationLength['max'])) {
				$this->addUsingAlias(SimulationPeer::SIMULATION_LENGTH, $simulationLength['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::SIMULATION_LENGTH, $simulationLength, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(SimulationPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(SimulationPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query by a related Map object
	 *
	 * @param     Map $map  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByMap($map, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(SimulationPeer::ID_MAP, $map->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Map relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinMap($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Map');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Map');
		}
		
		return $this;
	}

	/**
	 * Use the Map relation Map object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MapQuery A secondary query class using the current class as primary query
	 */
	public function useMapQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMap($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Map', 'MapQuery');
	}

	/**
	 * Filter the query by a related Climate object
	 *
	 * @param     Climate $climate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByClimate($climate, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(SimulationPeer::ID_CLIMATE, $climate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Climate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinClimate($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Climate');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Climate');
		}
		
		return $this;
	}

	/**
	 * Use the Climate relation Climate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClimateQuery A secondary query class using the current class as primary query
	 */
	public function useClimateQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinClimate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Climate', 'ClimateQuery');
	}

	/**
	 * Filter the query by a related Group object
	 *
	 * @param     Group $group  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(SimulationPeer::ID, $group->getIdSimulation(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Group relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinGroup($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Group');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Group');
		}
		
		return $this;
	}

	/**
	 * Use the Group relation Group object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery A secondary query class using the current class as primary query
	 */
	public function useGroupQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Group', 'GroupQuery');
	}

	/**
	 * Filter the query by a related Round object
	 *
	 * @param     Round $round  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByRound($round, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(SimulationPeer::ID, $round->getIdSimulation(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Round relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinRound($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Round');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Round');
		}
		
		return $this;
	}

	/**
	 * Use the Round relation Round object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RoundQuery A secondary query class using the current class as primary query
	 */
	public function useRoundQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRound($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Round', 'RoundQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Simulation $simulation Object to remove from the list of results
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function prune($simulation = null)
	{
		if ($simulation) {
			$this->addUsingAlias(SimulationPeer::ID, $simulation->getId(), Criteria::NOT_EQUAL);
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

} // BaseSimulationQuery
