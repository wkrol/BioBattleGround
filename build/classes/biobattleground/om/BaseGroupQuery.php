<?php


/**
 * Base class that represents a query for the 'group' table.
 *
 * 
 *
 * @method     GroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GroupQuery orderByIdUserPrivileges($order = Criteria::ASC) Order by the id_user_privileges column
 * @method     GroupQuery orderByIdOrganism($order = Criteria::ASC) Order by the id_organism column
 * @method     GroupQuery orderByIdSimulation($order = Criteria::ASC) Order by the id_simulation column
 * @method     GroupQuery orderBySurvive($order = Criteria::ASC) Order by the survive column
 * @method     GroupQuery orderByAverageLifeLength($order = Criteria::ASC) Order by the average_life_length column
 * @method     GroupQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     GroupQuery orderByDeaths($order = Criteria::ASC) Order by the deaths column
 *
 * @method     GroupQuery groupById() Group by the id column
 * @method     GroupQuery groupByIdUserPrivileges() Group by the id_user_privileges column
 * @method     GroupQuery groupByIdOrganism() Group by the id_organism column
 * @method     GroupQuery groupByIdSimulation() Group by the id_simulation column
 * @method     GroupQuery groupBySurvive() Group by the survive column
 * @method     GroupQuery groupByAverageLifeLength() Group by the average_life_length column
 * @method     GroupQuery groupByQuantity() Group by the quantity column
 * @method     GroupQuery groupByDeaths() Group by the deaths column
 *
 * @method     GroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GroupQuery leftJoinOrganism($relationAlias = null) Adds a LEFT JOIN clause to the query using the Organism relation
 * @method     GroupQuery rightJoinOrganism($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Organism relation
 * @method     GroupQuery innerJoinOrganism($relationAlias = null) Adds a INNER JOIN clause to the query using the Organism relation
 *
 * @method     GroupQuery leftJoinSimulation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     GroupQuery rightJoinSimulation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     GroupQuery innerJoinSimulation($relationAlias = null) Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     GroupQuery leftJoinUserPrivileges($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     GroupQuery rightJoinUserPrivileges($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     GroupQuery innerJoinUserPrivileges($relationAlias = null) Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     Group findOne(PropelPDO $con = null) Return the first Group matching the query
 * @method     Group findOneOrCreate(PropelPDO $con = null) Return the first Group matching the query, or a new Group object populated from the query conditions when no match is found
 *
 * @method     Group findOneById(int $id) Return the first Group filtered by the id column
 * @method     Group findOneByIdUserPrivileges(int $id_user_privileges) Return the first Group filtered by the id_user_privileges column
 * @method     Group findOneByIdOrganism(int $id_organism) Return the first Group filtered by the id_organism column
 * @method     Group findOneByIdSimulation(int $id_simulation) Return the first Group filtered by the id_simulation column
 * @method     Group findOneBySurvive(int $survive) Return the first Group filtered by the survive column
 * @method     Group findOneByAverageLifeLength(int $average_life_length) Return the first Group filtered by the average_life_length column
 * @method     Group findOneByQuantity(int $quantity) Return the first Group filtered by the quantity column
 * @method     Group findOneByDeaths(int $deaths) Return the first Group filtered by the deaths column
 *
 * @method     array findById(int $id) Return Group objects filtered by the id column
 * @method     array findByIdUserPrivileges(int $id_user_privileges) Return Group objects filtered by the id_user_privileges column
 * @method     array findByIdOrganism(int $id_organism) Return Group objects filtered by the id_organism column
 * @method     array findByIdSimulation(int $id_simulation) Return Group objects filtered by the id_simulation column
 * @method     array findBySurvive(int $survive) Return Group objects filtered by the survive column
 * @method     array findByAverageLifeLength(int $average_life_length) Return Group objects filtered by the average_life_length column
 * @method     array findByQuantity(int $quantity) Return Group objects filtered by the quantity column
 * @method     array findByDeaths(int $deaths) Return Group objects filtered by the deaths column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseGroupQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'Group', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GroupQuery) {
			return $criteria;
		}
		$query = new GroupQuery();
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
	 * @return    Group|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = GroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Group A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USER_PRIVILEGES`, `ID_ORGANISM`, `ID_SIMULATION`, `SURVIVE`, `AVERAGE_LIFE_LENGTH`, `QUANTITY`, `DEATHS` FROM `group` WHERE `ID` = :p0';
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
			$obj = new Group();
			$obj->hydrate($row);
			GroupPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Group|array|mixed the result, formatted by the current formatter
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
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GroupPeer::ID, $keys, Criteria::IN);
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
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_user_privileges column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdUserPrivileges(1234); // WHERE id_user_privileges = 1234
	 * $query->filterByIdUserPrivileges(array(12, 34)); // WHERE id_user_privileges IN (12, 34)
	 * $query->filterByIdUserPrivileges(array('min' => 12)); // WHERE id_user_privileges > 12
	 * </code>
	 *
	 * @see       filterByUserPrivileges()
	 *
	 * @param     mixed $idUserPrivileges The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByIdUserPrivileges($idUserPrivileges = null, $comparison = null)
	{
		if (is_array($idUserPrivileges)) {
			$useMinMax = false;
			if (isset($idUserPrivileges['min'])) {
				$this->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $idUserPrivileges['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idUserPrivileges['max'])) {
				$this->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $idUserPrivileges['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $idUserPrivileges, $comparison);
	}

	/**
	 * Filter the query on the id_organism column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdOrganism(1234); // WHERE id_organism = 1234
	 * $query->filterByIdOrganism(array(12, 34)); // WHERE id_organism IN (12, 34)
	 * $query->filterByIdOrganism(array('min' => 12)); // WHERE id_organism > 12
	 * </code>
	 *
	 * @see       filterByOrganism()
	 *
	 * @param     mixed $idOrganism The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByIdOrganism($idOrganism = null, $comparison = null)
	{
		if (is_array($idOrganism)) {
			$useMinMax = false;
			if (isset($idOrganism['min'])) {
				$this->addUsingAlias(GroupPeer::ID_ORGANISM, $idOrganism['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idOrganism['max'])) {
				$this->addUsingAlias(GroupPeer::ID_ORGANISM, $idOrganism['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::ID_ORGANISM, $idOrganism, $comparison);
	}

	/**
	 * Filter the query on the id_simulation column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdSimulation(1234); // WHERE id_simulation = 1234
	 * $query->filterByIdSimulation(array(12, 34)); // WHERE id_simulation IN (12, 34)
	 * $query->filterByIdSimulation(array('min' => 12)); // WHERE id_simulation > 12
	 * </code>
	 *
	 * @see       filterBySimulation()
	 *
	 * @param     mixed $idSimulation The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByIdSimulation($idSimulation = null, $comparison = null)
	{
		if (is_array($idSimulation)) {
			$useMinMax = false;
			if (isset($idSimulation['min'])) {
				$this->addUsingAlias(GroupPeer::ID_SIMULATION, $idSimulation['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idSimulation['max'])) {
				$this->addUsingAlias(GroupPeer::ID_SIMULATION, $idSimulation['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::ID_SIMULATION, $idSimulation, $comparison);
	}

	/**
	 * Filter the query on the survive column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySurvive(1234); // WHERE survive = 1234
	 * $query->filterBySurvive(array(12, 34)); // WHERE survive IN (12, 34)
	 * $query->filterBySurvive(array('min' => 12)); // WHERE survive > 12
	 * </code>
	 *
	 * @param     mixed $survive The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterBySurvive($survive = null, $comparison = null)
	{
		if (is_array($survive)) {
			$useMinMax = false;
			if (isset($survive['min'])) {
				$this->addUsingAlias(GroupPeer::SURVIVE, $survive['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($survive['max'])) {
				$this->addUsingAlias(GroupPeer::SURVIVE, $survive['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::SURVIVE, $survive, $comparison);
	}

	/**
	 * Filter the query on the average_life_length column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAverageLifeLength(1234); // WHERE average_life_length = 1234
	 * $query->filterByAverageLifeLength(array(12, 34)); // WHERE average_life_length IN (12, 34)
	 * $query->filterByAverageLifeLength(array('min' => 12)); // WHERE average_life_length > 12
	 * </code>
	 *
	 * @param     mixed $averageLifeLength The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByAverageLifeLength($averageLifeLength = null, $comparison = null)
	{
		if (is_array($averageLifeLength)) {
			$useMinMax = false;
			if (isset($averageLifeLength['min'])) {
				$this->addUsingAlias(GroupPeer::AVERAGE_LIFE_LENGTH, $averageLifeLength['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($averageLifeLength['max'])) {
				$this->addUsingAlias(GroupPeer::AVERAGE_LIFE_LENGTH, $averageLifeLength['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::AVERAGE_LIFE_LENGTH, $averageLifeLength, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantity(1234); // WHERE quantity = 1234
	 * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
	 * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
	 * </code>
	 *
	 * @param     mixed $quantity The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(GroupPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(GroupPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the deaths column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDeaths(1234); // WHERE deaths = 1234
	 * $query->filterByDeaths(array(12, 34)); // WHERE deaths IN (12, 34)
	 * $query->filterByDeaths(array('min' => 12)); // WHERE deaths > 12
	 * </code>
	 *
	 * @param     mixed $deaths The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByDeaths($deaths = null, $comparison = null)
	{
		if (is_array($deaths)) {
			$useMinMax = false;
			if (isset($deaths['min'])) {
				$this->addUsingAlias(GroupPeer::DEATHS, $deaths['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deaths['max'])) {
				$this->addUsingAlias(GroupPeer::DEATHS, $deaths['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::DEATHS, $deaths, $comparison);
	}

	/**
	 * Filter the query by a related Organism object
	 *
	 * @param     Organism|PropelCollection $organism The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByOrganism($organism, $comparison = null)
	{
		if ($organism instanceof Organism) {
			return $this
				->addUsingAlias(GroupPeer::ID_ORGANISM, $organism->getId(), $comparison);
		} elseif ($organism instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(GroupPeer::ID_ORGANISM, $organism->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByOrganism() only accepts arguments of type Organism or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Organism relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function joinOrganism($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Organism');

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
			$this->addJoinObject($join, 'Organism');
		}

		return $this;
	}

	/**
	 * Use the Organism relation Organism object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrganismQuery A secondary query class using the current class as primary query
	 */
	public function useOrganismQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOrganism($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Organism', 'OrganismQuery');
	}

	/**
	 * Filter the query by a related Simulation object
	 *
	 * @param     Simulation|PropelCollection $simulation The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = null)
	{
		if ($simulation instanceof Simulation) {
			return $this
				->addUsingAlias(GroupPeer::ID_SIMULATION, $simulation->getId(), $comparison);
		} elseif ($simulation instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(GroupPeer::ID_SIMULATION, $simulation->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    GroupQuery The current query, for fluid interface
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
	 * Filter the query by a related UserPrivileges object
	 *
	 * @param     UserPrivileges|PropelCollection $userPrivileges The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUserPrivileges($userPrivileges, $comparison = null)
	{
		if ($userPrivileges instanceof UserPrivileges) {
			return $this
				->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $userPrivileges->getIdUser(), $comparison);
		} elseif ($userPrivileges instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $userPrivileges->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
	 * @return    GroupQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Group $group Object to remove from the list of results
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function prune($group = null)
	{
		if ($group) {
			$this->addUsingAlias(GroupPeer::ID, $group->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseGroupQuery