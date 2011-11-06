<?php


/**
 * Base class that represents a query for the 'simulation_privileges' table.
 *
 * 
 *
 * @method     SimulationPrivilegesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SimulationPrivilegesQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method     SimulationPrivilegesQuery orderByCreate($order = Criteria::ASC) Order by the create column
 * @method     SimulationPrivilegesQuery orderByJoin($order = Criteria::ASC) Order by the join column
 *
 * @method     SimulationPrivilegesQuery groupById() Group by the id column
 * @method     SimulationPrivilegesQuery groupByIdUser() Group by the id_user column
 * @method     SimulationPrivilegesQuery groupByCreate() Group by the create column
 * @method     SimulationPrivilegesQuery groupByJoin() Group by the join column
 *
 * @method     SimulationPrivilegesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SimulationPrivilegesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SimulationPrivilegesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SimulationPrivilegesQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     SimulationPrivilegesQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     SimulationPrivilegesQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     SimulationPrivileges findOne(PropelPDO $con = null) Return the first SimulationPrivileges matching the query
 * @method     SimulationPrivileges findOneOrCreate(PropelPDO $con = null) Return the first SimulationPrivileges matching the query, or a new SimulationPrivileges object populated from the query conditions when no match is found
 *
 * @method     SimulationPrivileges findOneById(int $id) Return the first SimulationPrivileges filtered by the id column
 * @method     SimulationPrivileges findOneByIdUser(int $id_user) Return the first SimulationPrivileges filtered by the id_user column
 * @method     SimulationPrivileges findOneByCreate(int $create) Return the first SimulationPrivileges filtered by the create column
 * @method     SimulationPrivileges findOneByJoin(int $join) Return the first SimulationPrivileges filtered by the join column
 *
 * @method     array findById(int $id) Return SimulationPrivileges objects filtered by the id column
 * @method     array findByIdUser(int $id_user) Return SimulationPrivileges objects filtered by the id_user column
 * @method     array findByCreate(int $create) Return SimulationPrivileges objects filtered by the create column
 * @method     array findByJoin(int $join) Return SimulationPrivileges objects filtered by the join column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseSimulationPrivilegesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSimulationPrivilegesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'SimulationPrivileges', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SimulationPrivilegesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SimulationPrivilegesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SimulationPrivilegesQuery) {
			return $criteria;
		}
		$query = new SimulationPrivilegesQuery();
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
	 * @return    SimulationPrivileges|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SimulationPrivilegesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SimulationPrivilegesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SimulationPrivileges A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USER`, `CREATE`, `JOIN` FROM `simulation_privileges` WHERE `ID` = :p0';
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
			$obj = new SimulationPrivileges();
			$obj->hydrate($row);
			SimulationPrivilegesPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    SimulationPrivileges|array|mixed the result, formatted by the current formatter
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
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SimulationPrivilegesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SimulationPrivilegesPeer::ID, $keys, Criteria::IN);
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
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_user column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdUser(1234); // WHERE id_user = 1234
	 * $query->filterByIdUser(array(12, 34)); // WHERE id_user IN (12, 34)
	 * $query->filterByIdUser(array('min' => 12)); // WHERE id_user > 12
	 * </code>
	 *
	 * @see       filterByUser()
	 *
	 * @param     mixed $idUser The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdUser($idUser = null, $comparison = null)
	{
		if (is_array($idUser)) {
			$useMinMax = false;
			if (isset($idUser['min'])) {
				$this->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idUser['max'])) {
				$this->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $idUser, $comparison);
	}

	/**
	 * Filter the query on the create column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreate(1234); // WHERE create = 1234
	 * $query->filterByCreate(array(12, 34)); // WHERE create IN (12, 34)
	 * $query->filterByCreate(array('min' => 12)); // WHERE create > 12
	 * </code>
	 *
	 * @param     mixed $create The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByCreate($create = null, $comparison = null)
	{
		if (is_array($create)) {
			$useMinMax = false;
			if (isset($create['min'])) {
				$this->addUsingAlias(SimulationPrivilegesPeer::CREATE, $create['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($create['max'])) {
				$this->addUsingAlias(SimulationPrivilegesPeer::CREATE, $create['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::CREATE, $create, $comparison);
	}

	/**
	 * Filter the query on the join column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByJoin(1234); // WHERE join = 1234
	 * $query->filterByJoin(array(12, 34)); // WHERE join IN (12, 34)
	 * $query->filterByJoin(array('min' => 12)); // WHERE join > 12
	 * </code>
	 *
	 * @param     mixed $join The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByJoin($join = null, $comparison = null)
	{
		if (is_array($join)) {
			$useMinMax = false;
			if (isset($join['min'])) {
				$this->addUsingAlias(SimulationPrivilegesPeer::JOIN, $join['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($join['max'])) {
				$this->addUsingAlias(SimulationPrivilegesPeer::JOIN, $join['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::JOIN, $join, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');

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
			$this->addJoinObject($join, 'User');
		}

		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SimulationPrivileges $simulationPrivileges Object to remove from the list of results
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function prune($simulationPrivileges = null)
	{
		if ($simulationPrivileges) {
			$this->addUsingAlias(SimulationPrivilegesPeer::ID, $simulationPrivileges->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSimulationPrivilegesQuery