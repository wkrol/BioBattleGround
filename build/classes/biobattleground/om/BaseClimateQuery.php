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
 * @method     ClimateQuery leftJoinUserPrivileges($relationAlias = '') Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     ClimateQuery rightJoinUserPrivileges($relationAlias = '') Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     ClimateQuery innerJoinUserPrivileges($relationAlias = '') Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     ClimateQuery leftJoinSimulation($relationAlias = '') Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     ClimateQuery rightJoinSimulation($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     ClimateQuery innerJoinSimulation($relationAlias = '') Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     Climate findOne(PropelPDO $con = null) Return the first Climate matching the query
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
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Climate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClimatePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClimatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClimatePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the sun column
	 * 
	 * @param     int|array $sun The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterBySun($sun = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClimatePeer::SUN, $sun, $comparison);
	}

	/**
	 * Filter the query on the rain column
	 * 
	 * @param     int|array $rain The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByRain($rain = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClimatePeer::RAIN, $rain, $comparison);
	}

	/**
	 * Filter the query on the wind column
	 * 
	 * @param     int|array $wind The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterByWind($wind = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
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
	public function filterByUserPrivileges($userPrivileges, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(ClimatePeer::ID, $userPrivileges->getIdClimate(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserPrivileges relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClimateQuery The current query, for fluid interface
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
	 * @return    ClimateQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(ClimatePeer::ID, $simulation->getIdClimate(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Simulation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClimateQuery The current query, for fluid interface
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

} // BaseClimateQuery
