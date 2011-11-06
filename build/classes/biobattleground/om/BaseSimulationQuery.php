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
 * @method     SimulationQuery leftJoinMap($relationAlias = null) Adds a LEFT JOIN clause to the query using the Map relation
 * @method     SimulationQuery rightJoinMap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Map relation
 * @method     SimulationQuery innerJoinMap($relationAlias = null) Adds a INNER JOIN clause to the query using the Map relation
 *
 * @method     SimulationQuery leftJoinClimate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Climate relation
 * @method     SimulationQuery rightJoinClimate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Climate relation
 * @method     SimulationQuery innerJoinClimate($relationAlias = null) Adds a INNER JOIN clause to the query using the Climate relation
 *
 * @method     SimulationQuery leftJoinGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Group relation
 * @method     SimulationQuery rightJoinGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     SimulationQuery innerJoinGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     SimulationQuery leftJoinRound($relationAlias = null) Adds a LEFT JOIN clause to the query using the Round relation
 * @method     SimulationQuery rightJoinRound($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Round relation
 * @method     SimulationQuery innerJoinRound($relationAlias = null) Adds a INNER JOIN clause to the query using the Round relation
 *
 * @method     Simulation findOne(PropelPDO $con = null) Return the first Simulation matching the query
 * @method     Simulation findOneOrCreate(PropelPDO $con = null) Return the first Simulation matching the query, or a new Simulation object populated from the query conditions when no match is found
 *
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
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Simulation|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SimulationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Simulation A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_CLIMATE`, `ID_MAP`, `SIMULATION_LENGTH`, `DATE` FROM `simulation` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Simulation();
			$obj->hydrate($row);
			SimulationPeer::addInstanceToPool($obj, (string) $row[0]);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Simulation|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
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
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
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
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SimulationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_climate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdClimate(1234); // WHERE id_climate = 1234
	 * $query->filterByIdClimate(array(12, 34)); // WHERE id_climate IN (12, 34)
	 * $query->filterByIdClimate(array('min' => 12)); // WHERE id_climate > 12
	 * </code>
	 *
	 * @see       filterByClimate()
	 *
	 * @param     mixed $idClimate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByIdClimate($idClimate = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::ID_CLIMATE, $idClimate, $comparison);
	}

	/**
	 * Filter the query on the id_map column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdMap(1234); // WHERE id_map = 1234
	 * $query->filterByIdMap(array(12, 34)); // WHERE id_map IN (12, 34)
	 * $query->filterByIdMap(array('min' => 12)); // WHERE id_map > 12
	 * </code>
	 *
	 * @see       filterByMap()
	 *
	 * @param     mixed $idMap The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByIdMap($idMap = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::ID_MAP, $idMap, $comparison);
	}

	/**
	 * Filter the query on the simulation_length column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySimulationLength(1234); // WHERE simulation_length = 1234
	 * $query->filterBySimulationLength(array(12, 34)); // WHERE simulation_length IN (12, 34)
	 * $query->filterBySimulationLength(array('min' => 12)); // WHERE simulation_length > 12
	 * </code>
	 *
	 * @param     mixed $simulationLength The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterBySimulationLength($simulationLength = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::SIMULATION_LENGTH, $simulationLength, $comparison);
	}

	/**
	 * Filter the query on the date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
	 * $query->filterByDate('now'); // WHERE date = '2011-03-14'
	 * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $date The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query by a related Map object
	 *
	 * @param     Map|PropelCollection $map The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByMap($map, $comparison = null)
	{
		if ($map instanceof Map) {
			return $this
				->addUsingAlias(SimulationPeer::ID_MAP, $map->getId(), $comparison);
		} elseif ($map instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SimulationPeer::ID_MAP, $map->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMap() only accepts arguments of type Map or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Map relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinMap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Map');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

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
	public function useMapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMap($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Map', 'MapQuery');
	}

	/**
	 * Filter the query by a related Climate object
	 *
	 * @param     Climate|PropelCollection $climate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function filterByClimate($climate, $comparison = null)
	{
		if ($climate instanceof Climate) {
			return $this
				->addUsingAlias(SimulationPeer::ID_CLIMATE, $climate->getId(), $comparison);
		} elseif ($climate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SimulationPeer::ID_CLIMATE, $climate->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByClimate() only accepts arguments of type Climate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Climate relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinClimate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Climate');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

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
	public function useClimateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function filterByGroup($group, $comparison = null)
	{
		if ($group instanceof Group) {
			return $this
				->addUsingAlias(SimulationPeer::ID, $group->getIdSimulation(), $comparison);
		} elseif ($group instanceof PropelCollection) {
			return $this
				->useGroupQuery()
				->filterByPrimaryKeys($group->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByGroup() only accepts arguments of type Group or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Group relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinGroup($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Group');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

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
	public function useGroupQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function filterByRound($round, $comparison = null)
	{
		if ($round instanceof Round) {
			return $this
				->addUsingAlias(SimulationPeer::ID, $round->getIdSimulation(), $comparison);
		} elseif ($round instanceof PropelCollection) {
			return $this
				->useRoundQuery()
				->filterByPrimaryKeys($round->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByRound() only accepts arguments of type Round or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Round relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationQuery The current query, for fluid interface
	 */
	public function joinRound($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Round');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

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
	public function useRoundQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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

} // BaseSimulationQuery