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
 * @method     RoundQuery leftJoinOrganism($relationAlias = '') Adds a LEFT JOIN clause to the query using the Organism relation
 * @method     RoundQuery rightJoinOrganism($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Organism relation
 * @method     RoundQuery innerJoinOrganism($relationAlias = '') Adds a INNER JOIN clause to the query using the Organism relation
 *
 * @method     RoundQuery leftJoinSimulation($relationAlias = '') Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     RoundQuery rightJoinSimulation($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     RoundQuery innerJoinSimulation($relationAlias = '') Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     Round findOne(PropelPDO $con = null) Return the first Round matching the query
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
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Round|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RoundPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RoundPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_organism column
	 * 
	 * @param     int|array $idOrganism The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByIdOrganism($idOrganism = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::ID_ORGANISM, $idOrganism, $comparison);
	}

	/**
	 * Filter the query on the id_simulation column
	 * 
	 * @param     int|array $idSimulation The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByIdSimulation($idSimulation = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::ID_SIMULATION, $idSimulation, $comparison);
	}

	/**
	 * Filter the query on the day column
	 * 
	 * @param     int|array $day The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByDay($day = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::DAY, $day, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the avg_hunger column
	 * 
	 * @param     int|array $avgHunger The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByAvgHunger($avgHunger = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::AVG_HUNGER, $avgHunger, $comparison);
	}

	/**
	 * Filter the query on the avg_hitPoints column
	 * 
	 * @param     int|array $avgHitpoints The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByAvgHitpoints($avgHitpoints = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::AVG_HITPOINTS, $avgHitpoints, $comparison);
	}

	/**
	 * Filter the query on the number_of_newborn column
	 * 
	 * @param     int|array $numberOfNewborn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByNumberOfNewborn($numberOfNewborn = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RoundPeer::NUMBER_OF_NEWBORN, $numberOfNewborn, $comparison);
	}

	/**
	 * Filter the query by a related Organism object
	 *
	 * @param     Organism $organism  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterByOrganism($organism, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(RoundPeer::ID_ORGANISM, $organism->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Organism relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function joinOrganism($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Organism');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
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
	public function useOrganismQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOrganism($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Organism', 'OrganismQuery');
	}

	/**
	 * Filter the query by a related Simulation object
	 *
	 * @param     Simulation $simulation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RoundQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(RoundPeer::ID_SIMULATION, $simulation->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Simulation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RoundQuery The current query, for fluid interface
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

} // BaseRoundQuery
