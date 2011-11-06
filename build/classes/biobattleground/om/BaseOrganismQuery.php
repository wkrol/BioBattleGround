<?php


/**
 * Base class that represents a query for the 'organism' table.
 *
 * 
 *
 * @method     OrganismQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     OrganismQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     OrganismQuery orderByInstinct($order = Criteria::ASC) Order by the instinct column
 * @method     OrganismQuery orderByToughness($order = Criteria::ASC) Order by the toughness column
 * @method     OrganismQuery orderByVitality($order = Criteria::ASC) Order by the vitality column
 * @method     OrganismQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     OrganismQuery groupById() Group by the id column
 * @method     OrganismQuery groupByName() Group by the name column
 * @method     OrganismQuery groupByInstinct() Group by the instinct column
 * @method     OrganismQuery groupByToughness() Group by the toughness column
 * @method     OrganismQuery groupByVitality() Group by the vitality column
 * @method     OrganismQuery groupByType() Group by the type column
 *
 * @method     OrganismQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     OrganismQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     OrganismQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     OrganismQuery leftJoinUserPrivileges($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     OrganismQuery rightJoinUserPrivileges($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     OrganismQuery innerJoinUserPrivileges($relationAlias = null) Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     OrganismQuery leftJoinGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Group relation
 * @method     OrganismQuery rightJoinGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     OrganismQuery innerJoinGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     OrganismQuery leftJoinRound($relationAlias = null) Adds a LEFT JOIN clause to the query using the Round relation
 * @method     OrganismQuery rightJoinRound($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Round relation
 * @method     OrganismQuery innerJoinRound($relationAlias = null) Adds a INNER JOIN clause to the query using the Round relation
 *
 * @method     Organism findOne(PropelPDO $con = null) Return the first Organism matching the query
 * @method     Organism findOneOrCreate(PropelPDO $con = null) Return the first Organism matching the query, or a new Organism object populated from the query conditions when no match is found
 *
 * @method     Organism findOneById(int $id) Return the first Organism filtered by the id column
 * @method     Organism findOneByName(string $name) Return the first Organism filtered by the name column
 * @method     Organism findOneByInstinct(int $instinct) Return the first Organism filtered by the instinct column
 * @method     Organism findOneByToughness(int $toughness) Return the first Organism filtered by the toughness column
 * @method     Organism findOneByVitality(int $vitality) Return the first Organism filtered by the vitality column
 * @method     Organism findOneByType(string $type) Return the first Organism filtered by the type column
 *
 * @method     array findById(int $id) Return Organism objects filtered by the id column
 * @method     array findByName(string $name) Return Organism objects filtered by the name column
 * @method     array findByInstinct(int $instinct) Return Organism objects filtered by the instinct column
 * @method     array findByToughness(int $toughness) Return Organism objects filtered by the toughness column
 * @method     array findByVitality(int $vitality) Return Organism objects filtered by the vitality column
 * @method     array findByType(string $type) Return Organism objects filtered by the type column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseOrganismQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseOrganismQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'Organism', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new OrganismQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    OrganismQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof OrganismQuery) {
			return $criteria;
		}
		$query = new OrganismQuery();
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
	 * @return    Organism|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = OrganismPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(OrganismPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Organism A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NAME`, `INSTINCT`, `TOUGHNESS`, `VITALITY`, `TYPE` FROM `organism` WHERE `ID` = :p0';
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
			$obj = new Organism();
			$obj->hydrate($row);
			OrganismPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Organism|array|mixed the result, formatted by the current formatter
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
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(OrganismPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(OrganismPeer::ID, $keys, Criteria::IN);
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
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrganismPeer::ID, $id, $comparison);
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
	 * @return    OrganismQuery The current query, for fluid interface
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
		return $this->addUsingAlias(OrganismPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the instinct column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInstinct(1234); // WHERE instinct = 1234
	 * $query->filterByInstinct(array(12, 34)); // WHERE instinct IN (12, 34)
	 * $query->filterByInstinct(array('min' => 12)); // WHERE instinct > 12
	 * </code>
	 *
	 * @param     mixed $instinct The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByInstinct($instinct = null, $comparison = null)
	{
		if (is_array($instinct)) {
			$useMinMax = false;
			if (isset($instinct['min'])) {
				$this->addUsingAlias(OrganismPeer::INSTINCT, $instinct['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instinct['max'])) {
				$this->addUsingAlias(OrganismPeer::INSTINCT, $instinct['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrganismPeer::INSTINCT, $instinct, $comparison);
	}

	/**
	 * Filter the query on the toughness column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByToughness(1234); // WHERE toughness = 1234
	 * $query->filterByToughness(array(12, 34)); // WHERE toughness IN (12, 34)
	 * $query->filterByToughness(array('min' => 12)); // WHERE toughness > 12
	 * </code>
	 *
	 * @param     mixed $toughness The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByToughness($toughness = null, $comparison = null)
	{
		if (is_array($toughness)) {
			$useMinMax = false;
			if (isset($toughness['min'])) {
				$this->addUsingAlias(OrganismPeer::TOUGHNESS, $toughness['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($toughness['max'])) {
				$this->addUsingAlias(OrganismPeer::TOUGHNESS, $toughness['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrganismPeer::TOUGHNESS, $toughness, $comparison);
	}

	/**
	 * Filter the query on the vitality column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVitality(1234); // WHERE vitality = 1234
	 * $query->filterByVitality(array(12, 34)); // WHERE vitality IN (12, 34)
	 * $query->filterByVitality(array('min' => 12)); // WHERE vitality > 12
	 * </code>
	 *
	 * @param     mixed $vitality The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByVitality($vitality = null, $comparison = null)
	{
		if (is_array($vitality)) {
			$useMinMax = false;
			if (isset($vitality['min'])) {
				$this->addUsingAlias(OrganismPeer::VITALITY, $vitality['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($vitality['max'])) {
				$this->addUsingAlias(OrganismPeer::VITALITY, $vitality['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrganismPeer::VITALITY, $vitality, $comparison);
	}

	/**
	 * Filter the query on the type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
	 * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $type The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(OrganismPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query by a related UserPrivileges object
	 *
	 * @param     UserPrivileges $userPrivileges  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByUserPrivileges($userPrivileges, $comparison = null)
	{
		if ($userPrivileges instanceof UserPrivileges) {
			return $this
				->addUsingAlias(OrganismPeer::ID, $userPrivileges->getIdOrganism(), $comparison);
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
	 * @return    OrganismQuery The current query, for fluid interface
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
	 * Filter the query by a related Group object
	 *
	 * @param     Group $group  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = null)
	{
		if ($group instanceof Group) {
			return $this
				->addUsingAlias(OrganismPeer::ID, $group->getIdOrganism(), $comparison);
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
	 * @return    OrganismQuery The current query, for fluid interface
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
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByRound($round, $comparison = null)
	{
		if ($round instanceof Round) {
			return $this
				->addUsingAlias(OrganismPeer::ID, $round->getIdOrganism(), $comparison);
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
	 * @return    OrganismQuery The current query, for fluid interface
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
	 * @param     Organism $organism Object to remove from the list of results
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function prune($organism = null)
	{
		if ($organism) {
			$this->addUsingAlias(OrganismPeer::ID, $organism->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseOrganismQuery