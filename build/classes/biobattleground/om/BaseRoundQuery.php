<?php


/**
 * Base class that represents a query for the 'round' table.
 *
 * 
 *
 * @method     RoundQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RoundQuery orderByIdOrganism($order = Criteria::ASC) Order by the id_organism column
 * @method     RoundQuery orderByIdSimulation($order = Criteria::ASC) Order by the id_simulation column
 * @method     RoundQuery orderByDay($order = Criteria::ASC) Order by the day column
 * @method     RoundQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     RoundQuery orderByAvgHunger($order = Criteria::ASC) Order by the avg_hunger column
 * @method     RoundQuery orderByAvgHitpoints($order = Criteria::ASC) Order by the avg_hitPoints column
 * @method     RoundQuery orderByNumberOfNewborn($order = Criteria::ASC) Order by the number_of_newborn column
 *
 * @method     RoundQuery groupById() Group by the id column
 * @method     RoundQuery groupByIdOrganism() Group by the id_organism column
 * @method     RoundQuery groupByIdSimulation() Group by the id_simulation column
 * @method     RoundQuery groupByDay() Group by the day column
 * @method     RoundQuery groupByQuantity() Group by the quantity column
 * @method     RoundQuery groupByAvgHunger() Group by the avg_hunger column
 * @method     RoundQuery groupByAvgHitpoints() Group by the avg_hitPoints column
 * @method     RoundQuery groupByNumberOfNewborn() Group by the number_of_newborn column
 *
 * @method     RoundQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RoundQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RoundQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RoundQuery leftJoinOrganism($relationAlias = null) Adds a LEFT JOIN clause to the query using the Organism relation
 * @method     RoundQuery rightJoinOrganism($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Organism relation
 * @method     RoundQuery innerJoinOrganism($relationAlias = null) Adds a INNER JOIN clause to the query using the Organism relation
 *
 * @method     RoundQuery leftJoinSimulation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     RoundQuery rightJoinSimulation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     RoundQuery innerJoinSimulation($relationAlias = null) Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     Round findOne(PropelPDO $con = null) Return the first Round matching the query
 * @method     Round findOneOrCreate(PropelPDO $con = null) Return the first Round matching the query, or a new Round object populated from the query conditions when no match is found
 *
 * @method     Round findOneById(int $id) Return the first Round filtered by the id column
 * @method     Round findOneByIdOrganism(int $id_organism) Return the first Round filtered by the id_organism column
 * @method     Round findOneByIdSimulation(int $id_simulation) Return the first Round filtered by the id_simulation column
 * @method     Round findOneByDay(int $day) Return the first Round filtered by the day column
 * @method     Round findOneByQuantity(int $quantity) Return the first Round filtered by the quantity column
 * @method     Round findOneByAvgHunger(int $avg_hunger) Return the first Round filtered by the avg_hunger column
 * @method     Round findOneByAvgHitpoints(int $avg_hitPoints) Return the first Round filtered by the avg_hitPoints column
 * @method     Round findOneByNumberOfNewborn(int $number_of_newborn) Return the first Round filtered by the number_of_newborn column
 *
 * @method     array findById(int $id) Return Round objects filtered by the id column
 * @method     array findByIdOrganism(int $id_organism) Return Round objects filtered by the id_organism column
 * @method     array findByIdSimulation(int $id_simulation) Return Round objects filtered by the id_simulation column
 * @method     array findByDay(int $day) Return Round objects filtered by the day column
 * @method     array findByQuantity(int $quantity) Return Round objects filtered by the quantity column
 * @method     array findByAvgHunger(int $avg_hunger) Return Round objects filtered by the avg_hunger column
 * @method     array findByAvgHitpoints(int $avg_hitPoints) Return Round objects filtered by the avg_hitPoints column
 * @method     array findByNumberOfNewborn(int $number_of_newborn) Return Round objects filtered by the number_of_newborn column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseRoundQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRoundQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'Round', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RoundQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RoundQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RoundQuery) {
			return $criteria;
		}
		$query = new RoundQuery();
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
	 * @return    Round|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RoundPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RoundPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Round A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_ORGANISM`, `ID_SIMULATION`, `DAY`, `QUANTITY`, `AVG_HUNGER`, `AVG_HITPOINTS`, `NUMBER_OF_NEWBORN` FROM `round` WHERE `ID` = :p0';
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
			$obj = new Round();
			$obj->hydrate($row);
			RoundPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Round|array|mixed the result, formatted by the current formatter
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
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RoundPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RoundPeer::ID, $keys, Criteria::IN);
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
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RoundPeer::ID, $id, $comparison);
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
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByIdOrganism($idOrganism = null, $comparison = null)
	{
		if (is_array($idOrganism)) {
			$useMinMax = false;
			if (isset($idOrganism['min'])) {
				$this->addUsingAlias(RoundPeer::ID_ORGANISM, $idOrganism['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idOrganism['max'])) {
				$this->addUsingAlias(RoundPeer::ID_ORGANISM, $idOrganism['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::ID_ORGANISM, $idOrganism, $comparison);
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
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByIdSimulation($idSimulation = null, $comparison = null)
	{
		if (is_array($idSimulation)) {
			$useMinMax = false;
			if (isset($idSimulation['min'])) {
				$this->addUsingAlias(RoundPeer::ID_SIMULATION, $idSimulation['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idSimulation['max'])) {
				$this->addUsingAlias(RoundPeer::ID_SIMULATION, $idSimulation['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::ID_SIMULATION, $idSimulation, $comparison);
	}

	/**
	 * Filter the query on the day column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDay(1234); // WHERE day = 1234
	 * $query->filterByDay(array(12, 34)); // WHERE day IN (12, 34)
	 * $query->filterByDay(array('min' => 12)); // WHERE day > 12
	 * </code>
	 *
	 * @param     mixed $day The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByDay($day = null, $comparison = null)
	{
		if (is_array($day)) {
			$useMinMax = false;
			if (isset($day['min'])) {
				$this->addUsingAlias(RoundPeer::DAY, $day['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($day['max'])) {
				$this->addUsingAlias(RoundPeer::DAY, $day['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::DAY, $day, $comparison);
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
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = null)
	{
		if (is_array($quantity)) {
			$useMinMax = false;
			if (isset($quantity['min'])) {
				$this->addUsingAlias(RoundPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantity['max'])) {
				$this->addUsingAlias(RoundPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the avg_hunger column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAvgHunger(1234); // WHERE avg_hunger = 1234
	 * $query->filterByAvgHunger(array(12, 34)); // WHERE avg_hunger IN (12, 34)
	 * $query->filterByAvgHunger(array('min' => 12)); // WHERE avg_hunger > 12
	 * </code>
	 *
	 * @param     mixed $avgHunger The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByAvgHunger($avgHunger = null, $comparison = null)
	{
		if (is_array($avgHunger)) {
			$useMinMax = false;
			if (isset($avgHunger['min'])) {
				$this->addUsingAlias(RoundPeer::AVG_HUNGER, $avgHunger['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($avgHunger['max'])) {
				$this->addUsingAlias(RoundPeer::AVG_HUNGER, $avgHunger['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::AVG_HUNGER, $avgHunger, $comparison);
	}

	/**
	 * Filter the query on the avg_hitPoints column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAvgHitpoints(1234); // WHERE avg_hitPoints = 1234
	 * $query->filterByAvgHitpoints(array(12, 34)); // WHERE avg_hitPoints IN (12, 34)
	 * $query->filterByAvgHitpoints(array('min' => 12)); // WHERE avg_hitPoints > 12
	 * </code>
	 *
	 * @param     mixed $avgHitpoints The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByAvgHitpoints($avgHitpoints = null, $comparison = null)
	{
		if (is_array($avgHitpoints)) {
			$useMinMax = false;
			if (isset($avgHitpoints['min'])) {
				$this->addUsingAlias(RoundPeer::AVG_HITPOINTS, $avgHitpoints['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($avgHitpoints['max'])) {
				$this->addUsingAlias(RoundPeer::AVG_HITPOINTS, $avgHitpoints['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::AVG_HITPOINTS, $avgHitpoints, $comparison);
	}

	/**
	 * Filter the query on the number_of_newborn column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumberOfNewborn(1234); // WHERE number_of_newborn = 1234
	 * $query->filterByNumberOfNewborn(array(12, 34)); // WHERE number_of_newborn IN (12, 34)
	 * $query->filterByNumberOfNewborn(array('min' => 12)); // WHERE number_of_newborn > 12
	 * </code>
	 *
	 * @param     mixed $numberOfNewborn The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByNumberOfNewborn($numberOfNewborn = null, $comparison = null)
	{
		if (is_array($numberOfNewborn)) {
			$useMinMax = false;
			if (isset($numberOfNewborn['min'])) {
				$this->addUsingAlias(RoundPeer::NUMBER_OF_NEWBORN, $numberOfNewborn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numberOfNewborn['max'])) {
				$this->addUsingAlias(RoundPeer::NUMBER_OF_NEWBORN, $numberOfNewborn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::NUMBER_OF_NEWBORN, $numberOfNewborn, $comparison);
	}

	/**
	 * Filter the query by a related Organism object
	 *
	 * @param     Organism|PropelCollection $organism The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByOrganism($organism, $comparison = null)
	{
		if ($organism instanceof Organism) {
			return $this
				->addUsingAlias(RoundPeer::ID_ORGANISM, $organism->getId(), $comparison);
		} elseif ($organism instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RoundPeer::ID_ORGANISM, $organism->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    RoundQuery The current query, for fluid interface
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
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = null)
	{
		if ($simulation instanceof Simulation) {
			return $this
				->addUsingAlias(RoundPeer::ID_SIMULATION, $simulation->getId(), $comparison);
		} elseif ($simulation instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RoundPeer::ID_SIMULATION, $simulation->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    RoundQuery The current query, for fluid interface
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
	 * @param     Round $round Object to remove from the list of results
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function prune($round = null)
	{
		if ($round) {
			$this->addUsingAlias(RoundPeer::ID, $round->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRoundQuery