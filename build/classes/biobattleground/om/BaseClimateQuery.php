<?php


/**
 * Base class that represents a query for the 'climate' table.
 *
 * 
 *
 * @method     ClimateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClimateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ClimateQuery orderBySun($order = Criteria::ASC) Order by the sun column
 * @method     ClimateQuery orderByRain($order = Criteria::ASC) Order by the rain column
 * @method     ClimateQuery orderByWind($order = Criteria::ASC) Order by the wind column
 *
 * @method     ClimateQuery groupById() Group by the id column
 * @method     ClimateQuery groupByName() Group by the name column
 * @method     ClimateQuery groupBySun() Group by the sun column
 * @method     ClimateQuery groupByRain() Group by the rain column
 * @method     ClimateQuery groupByWind() Group by the wind column
 *
 * @method     ClimateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClimateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClimateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClimateQuery leftJoinUserPrivileges($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     ClimateQuery rightJoinUserPrivileges($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     ClimateQuery innerJoinUserPrivileges($relationAlias = null) Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     ClimateQuery leftJoinSimulation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     ClimateQuery rightJoinSimulation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     ClimateQuery innerJoinSimulation($relationAlias = null) Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     Climate findOne(PropelPDO $con = null) Return the first Climate matching the query
 * @method     Climate findOneOrCreate(PropelPDO $con = null) Return the first Climate matching the query, or a new Climate object populated from the query conditions when no match is found
 *
 * @method     Climate findOneById(int $id) Return the first Climate filtered by the id column
 * @method     Climate findOneByName(string $name) Return the first Climate filtered by the name column
 * @method     Climate findOneBySun(int $sun) Return the first Climate filtered by the sun column
 * @method     Climate findOneByRain(int $rain) Return the first Climate filtered by the rain column
 * @method     Climate findOneByWind(int $wind) Return the first Climate filtered by the wind column
 *
 * @method     array findById(int $id) Return Climate objects filtered by the id column
 * @method     array findByName(string $name) Return Climate objects filtered by the name column
 * @method     array findBySun(int $sun) Return Climate objects filtered by the sun column
 * @method     array findByRain(int $rain) Return Climate objects filtered by the rain column
 * @method     array findByWind(int $wind) Return Climate objects filtered by the wind column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseClimateQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClimateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'Climate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClimateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClimateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClimateQuery) {
			return $criteria;
		}
		$query = new ClimateQuery();
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
	 * @return    Climate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClimatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClimatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Climate A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `SUN`, `RAIN`, `WIND` FROM `climate` WHERE `ID` = :p0';
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
			$obj = new Climate();
			$obj->hydrate($row);
			ClimatePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Climate|array|mixed the result, formatted by the current formatter
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
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClimatePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClimatePeer::ID, $keys, Criteria::IN);
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
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClimatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClimatePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the sun column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySun(1234); // WHERE sun = 1234
	 * $query->filterBySun(array(12, 34)); // WHERE sun IN (12, 34)
	 * $query->filterBySun(array('min' => 12)); // WHERE sun > 12
	 * </code>
	 *
	 * @param     mixed $sun The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterBySun($sun = null, $comparison = null)
	{
		if (is_array($sun)) {
			$useMinMax = false;
			if (isset($sun['min'])) {
				$this->addUsingAlias(ClimatePeer::SUN, $sun['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($sun['max'])) {
				$this->addUsingAlias(ClimatePeer::SUN, $sun['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClimatePeer::SUN, $sun, $comparison);
	}

	/**
	 * Filter the query on the rain column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRain(1234); // WHERE rain = 1234
	 * $query->filterByRain(array(12, 34)); // WHERE rain IN (12, 34)
	 * $query->filterByRain(array('min' => 12)); // WHERE rain > 12
	 * </code>
	 *
	 * @param     mixed $rain The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByRain($rain = null, $comparison = null)
	{
		if (is_array($rain)) {
			$useMinMax = false;
			if (isset($rain['min'])) {
				$this->addUsingAlias(ClimatePeer::RAIN, $rain['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rain['max'])) {
				$this->addUsingAlias(ClimatePeer::RAIN, $rain['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClimatePeer::RAIN, $rain, $comparison);
	}

	/**
	 * Filter the query on the wind column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWind(1234); // WHERE wind = 1234
	 * $query->filterByWind(array(12, 34)); // WHERE wind IN (12, 34)
	 * $query->filterByWind(array('min' => 12)); // WHERE wind > 12
	 * </code>
	 *
	 * @param     mixed $wind The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByWind($wind = null, $comparison = null)
	{
		if (is_array($wind)) {
			$useMinMax = false;
			if (isset($wind['min'])) {
				$this->addUsingAlias(ClimatePeer::WIND, $wind['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($wind['max'])) {
				$this->addUsingAlias(ClimatePeer::WIND, $wind['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClimatePeer::WIND, $wind, $comparison);
	}

	/**
	 * Filter the query by a related UserPrivileges object
	 *
	 * @param     UserPrivileges $userPrivileges  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByUserPrivileges($userPrivileges, $comparison = null)
	{
		if ($userPrivileges instanceof UserPrivileges) {
			return $this
				->addUsingAlias(ClimatePeer::ID, $userPrivileges->getIdClimate(), $comparison);
		} elseif ($userPrivileges instanceof PropelCollection) {
			return $this
				->useUserPrivilegesQuery()
				->filterByPrimaryKeys($userPrivileges->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserPrivileges() only accepts arguments of type UserPrivileges or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserPrivileges relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function joinUserPrivileges($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserPrivileges');

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
	public function useUserPrivilegesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = null)
	{
		if ($simulation instanceof Simulation) {
			return $this
				->addUsingAlias(ClimatePeer::ID, $simulation->getIdClimate(), $comparison);
		} elseif ($simulation instanceof PropelCollection) {
			return $this
				->useSimulationQuery()
				->filterByPrimaryKeys($simulation->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySimulation() only accepts arguments of type Simulation or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Simulation relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function joinSimulation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Simulation');

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
	public function useSimulationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSimulation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Simulation', 'SimulationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Climate $climate Object to remove from the list of results
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function prune($climate = null)
	{
		if ($climate) {
			$this->addUsingAlias(ClimatePeer::ID, $climate->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClimateQuery