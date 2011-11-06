<?php


/**
 * Base class that represents a query for the 'user' table.
 *
 * 
 *
 * @method     UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     UserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UserQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     UserQuery groupById() Group by the id column
 * @method     UserQuery groupByLogin() Group by the login column
 * @method     UserQuery groupByPassword() Group by the password column
 * @method     UserQuery groupByName() Group by the name column
 *
 * @method     UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserQuery leftJoinUserPrivileges($relationAlias = '') Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     UserQuery rightJoinUserPrivileges($relationAlias = '') Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     UserQuery innerJoinUserPrivileges($relationAlias = '') Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     UserQuery leftJoinSimulationPrivileges($relationAlias = '') Adds a LEFT JOIN clause to the query using the SimulationPrivileges relation
 * @method     UserQuery rightJoinSimulationPrivileges($relationAlias = '') Adds a RIGHT JOIN clause to the query using the SimulationPrivileges relation
 * @method     UserQuery innerJoinSimulationPrivileges($relationAlias = '') Adds a INNER JOIN clause to the query using the SimulationPrivileges relation
 *
 * @method     User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method     User findOneById(int $id) Return the first User filtered by the id column
 * @method     User findOneByLogin(string $login) Return the first User filtered by the login column
 * @method     User findOneByPassword(string $password) Return the first User filtered by the password column
 * @method     User findOneByName(string $name) Return the first User filtered by the name column
 *
 * @method     array findById(int $id) Return User objects filtered by the id column
 * @method     array findByLogin(string $login) Return User objects filtered by the login column
 * @method     array findByPassword(string $password) Return User objects filtered by the password column
 * @method     array findByName(string $name) Return User objects filtered by the name column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'User', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserQuery) {
			return $criteria;
		}
		$query = new UserQuery();
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
	 * @return    User|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the login column
	 * 
	 * @param     string $login The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLogin($login = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($login)) {
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		} elseif (preg_match('/[\%\*]/', $login)) {
			$login = str_replace('*', '%', $login);
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::LOGIN, $login, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($password)) {
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		} elseif (preg_match('/[\%\*]/', $password)) {
			$password = str_replace('*', '%', $password);
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query by a related UserPrivileges object
	 *
	 * @param     UserPrivileges $userPrivileges  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserPrivileges($userPrivileges, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $userPrivileges->getIdUser(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserPrivileges relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related SimulationPrivileges object
	 *
	 * @param     SimulationPrivileges $simulationPrivileges  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySimulationPrivileges($simulationPrivileges, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPeer::ID, $simulationPrivileges->getIdUser(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SimulationPrivileges relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function joinSimulationPrivileges($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SimulationPrivileges');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SimulationPrivileges');
		}
		
		return $this;
	}

	/**
	 * Use the SimulationPrivileges relation SimulationPrivileges object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SimulationPrivilegesQuery A secondary query class using the current class as primary query
	 */
	public function useSimulationPrivilegesQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSimulationPrivileges($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SimulationPrivileges', 'SimulationPrivilegesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     User $user Object to remove from the list of results
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function prune($user = null)
	{
		if ($user) {
			$this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
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

} // BaseUserQuery
