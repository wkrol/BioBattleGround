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
 * @method     MapQuery leftJoinUserPrivileges($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     MapQuery rightJoinUserPrivileges($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     MapQuery innerJoinUserPrivileges($relationAlias = null) Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     MapQuery leftJoinSimulation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     MapQuery rightJoinSimulation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     MapQuery innerJoinSimulation($relationAlias = null) Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     Map findOne(PropelPDO $con = null) Return the first Map matching the query
 * @method     Map findOneOrCreate(PropelPDO $con = null) Return the first Map matching the query, or a new Map object populated from the query conditions when no match is found
 *
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
	 * @return    Map|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MapPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MapPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Map A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `MAP_STRING` FROM `map` WHERE `ID` = :p0';
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
			$obj = new Map();
			$obj->hydrate($row);
			MapPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Map|array|mixed the result, formatted by the current formatter
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
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MapPeer::ID, $id, $comparison);
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
	 * @return    MapQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MapPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the map_string column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMapString('fooValue');   // WHERE map_string = 'fooValue'
	 * $query->filterByMapString('%fooValue%'); // WHERE map_string LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mapString The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterByMapString($mapString = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mapString)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mapString)) {
				$mapString = str_replace('*', '%', $mapString);
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
	public function filterByUserPrivileges($userPrivileges, $comparison = null)
	{
		if ($userPrivileges instanceof UserPrivileges) {
			return $this
				->addUsingAlias(MapPeer::ID, $userPrivileges->getIdMap(), $comparison);
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
	 * @return    MapQuery The current query, for fluid interface
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
	 * @return    MapQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = null)
	{
		if ($simulation instanceof Simulation) {
			return $this
				->addUsingAlias(MapPeer::ID, $simulation->getIdMap(), $comparison);
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
	 * @return    MapQuery The current query, for fluid interface
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

} // BaseMapQuery