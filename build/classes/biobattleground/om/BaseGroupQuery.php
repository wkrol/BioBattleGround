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
 * @method     GroupQuery leftJoinOrganism($relationAlias = '') Adds a LEFT JOIN clause to the query using the Organism relation
 * @method     GroupQuery rightJoinOrganism($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Organism relation
 * @method     GroupQuery innerJoinOrganism($relationAlias = '') Adds a INNER JOIN clause to the query using the Organism relation
 *
 * @method     GroupQuery leftJoinSimulation($relationAlias = '') Adds a LEFT JOIN clause to the query using the Simulation relation
 * @method     GroupQuery rightJoinSimulation($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Simulation relation
 * @method     GroupQuery innerJoinSimulation($relationAlias = '') Adds a INNER JOIN clause to the query using the Simulation relation
 *
 * @method     GroupQuery leftJoinUserPrivileges($relationAlias = '') Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     GroupQuery rightJoinUserPrivileges($relationAlias = '') Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     GroupQuery innerJoinUserPrivileges($relationAlias = '') Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     Group findOne(PropelPDO $con = null) Return the first Group matching the query
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
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Group|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = GroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_user_privileges column
	 * 
	 * @param     int|array $idUserPrivileges The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByIdUserPrivileges($idUserPrivileges = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $idUserPrivileges, $comparison);
	}

	/**
	 * Filter the query on the id_organism column
	 * 
	 * @param     int|array $idOrganism The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByIdOrganism($idOrganism = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::ID_ORGANISM, $idOrganism, $comparison);
	}

	/**
	 * Filter the query on the id_simulation column
	 * 
	 * @param     int|array $idSimulation The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByIdSimulation($idSimulation = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::ID_SIMULATION, $idSimulation, $comparison);
	}

	/**
	 * Filter the query on the survive column
	 * 
	 * @param     int|array $survive The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterBySurvive($survive = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::SURVIVE, $survive, $comparison);
	}

	/**
	 * Filter the query on the average_life_length column
	 * 
	 * @param     int|array $averageLifeLength The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByAverageLifeLength($averageLifeLength = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::AVERAGE_LIFE_LENGTH, $averageLifeLength, $comparison);
	}

	/**
	 * Filter the query on the quantity column
	 * 
	 * @param     int|array $quantity The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::QUANTITY, $quantity, $comparison);
	}

	/**
	 * Filter the query on the deaths column
	 * 
	 * @param     int|array $deaths The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByDeaths($deaths = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::DEATHS, $deaths, $comparison);
	}

	/**
	 * Filter the query by a related Organism object
	 *
	 * @param     Organism $organism  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByOrganism($organism, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(GroupPeer::ID_ORGANISM, $organism->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Organism relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
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
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterBySimulation($simulation, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(GroupPeer::ID_SIMULATION, $simulation->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Simulation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
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
	 * Filter the query by a related UserPrivileges object
	 *
	 * @param     UserPrivileges $userPrivileges  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUserPrivileges($userPrivileges, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(GroupPeer::ID_USER_PRIVILEGES, $userPrivileges->getIdUser(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserPrivileges relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
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

} // BaseGroupQuery
