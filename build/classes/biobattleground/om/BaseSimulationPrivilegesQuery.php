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
 * @method     SimulationPrivilegesQuery leftJoinUser($relationAlias = '') Adds a LEFT JOIN clause to the query using the User relation
 * @method     SimulationPrivilegesQuery rightJoinUser($relationAlias = '') Adds a RIGHT JOIN clause to the query using the User relation
 * @method     SimulationPrivilegesQuery innerJoinUser($relationAlias = '') Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     SimulationPrivileges findOne(PropelPDO $con = null) Return the first SimulationPrivileges matching the query
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
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SimulationPrivileges|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SimulationPrivilegesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_user column
	 * 
	 * @param     int|array $idUser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdUser($idUser = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $idUser, $comparison);
	}

	/**
	 * Filter the query on the create column
	 * 
	 * @param     int|array $create The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByCreate($create = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::CREATE, $create, $comparison);
	}

	/**
	 * Filter the query on the join column
	 * 
	 * @param     int|array $join The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByJoin($join = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SimulationPrivilegesPeer::JOIN, $join, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(SimulationPrivilegesPeer::ID_USER, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationPrivilegesQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
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
	public function useUserQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
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

} // BaseSimulationPrivilegesQuery
