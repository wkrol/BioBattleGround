<?php


/**
 * Base class that represents a query for the 'user_privileges' table.
 *
 * 
 *
 * @method     UserPrivilegesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserPrivilegesQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method     UserPrivilegesQuery orderByIdOrganism($order = Criteria::ASC) Order by the id_organism column
 * @method     UserPrivilegesQuery orderByIdMap($order = Criteria::ASC) Order by the id_map column
 * @method     UserPrivilegesQuery orderByIdClimate($order = Criteria::ASC) Order by the id_climate column
 * @method     UserPrivilegesQuery orderByPlay($order = Criteria::ASC) Order by the play column
 * @method     UserPrivilegesQuery orderByFight($order = Criteria::ASC) Order by the fight column
 * @method     UserPrivilegesQuery orderByEdit($order = Criteria::ASC) Order by the edit column
 * @method     UserPrivilegesQuery orderByShowStats($order = Criteria::ASC) Order by the show_stats column
 *
 * @method     UserPrivilegesQuery groupById() Group by the id column
 * @method     UserPrivilegesQuery groupByIdUser() Group by the id_user column
 * @method     UserPrivilegesQuery groupByIdOrganism() Group by the id_organism column
 * @method     UserPrivilegesQuery groupByIdMap() Group by the id_map column
 * @method     UserPrivilegesQuery groupByIdClimate() Group by the id_climate column
 * @method     UserPrivilegesQuery groupByPlay() Group by the play column
 * @method     UserPrivilegesQuery groupByFight() Group by the fight column
 * @method     UserPrivilegesQuery groupByEdit() Group by the edit column
 * @method     UserPrivilegesQuery groupByShowStats() Group by the show_stats column
 *
 * @method     UserPrivilegesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserPrivilegesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserPrivilegesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserPrivilegesQuery leftJoinOrganism($relationAlias = '') Adds a LEFT JOIN clause to the query using the Organism relation
 * @method     UserPrivilegesQuery rightJoinOrganism($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Organism relation
 * @method     UserPrivilegesQuery innerJoinOrganism($relationAlias = '') Adds a INNER JOIN clause to the query using the Organism relation
 *
 * @method     UserPrivilegesQuery leftJoinUser($relationAlias = '') Adds a LEFT JOIN clause to the query using the User relation
 * @method     UserPrivilegesQuery rightJoinUser($relationAlias = '') Adds a RIGHT JOIN clause to the query using the User relation
 * @method     UserPrivilegesQuery innerJoinUser($relationAlias = '') Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     UserPrivilegesQuery leftJoinMap($relationAlias = '') Adds a LEFT JOIN clause to the query using the Map relation
 * @method     UserPrivilegesQuery rightJoinMap($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Map relation
 * @method     UserPrivilegesQuery innerJoinMap($relationAlias = '') Adds a INNER JOIN clause to the query using the Map relation
 *
 * @method     UserPrivilegesQuery leftJoinClimate($relationAlias = '') Adds a LEFT JOIN clause to the query using the Climate relation
 * @method     UserPrivilegesQuery rightJoinClimate($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Climate relation
 * @method     UserPrivilegesQuery innerJoinClimate($relationAlias = '') Adds a INNER JOIN clause to the query using the Climate relation
 *
 * @method     UserPrivilegesQuery leftJoinGroup($relationAlias = '') Adds a LEFT JOIN clause to the query using the Group relation
 * @method     UserPrivilegesQuery rightJoinGroup($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     UserPrivilegesQuery innerJoinGroup($relationAlias = '') Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     UserPrivileges findOne(PropelPDO $con = null) Return the first UserPrivileges matching the query
 * @method     UserPrivileges findOneById(int $id) Return the first UserPrivileges filtered by the id column
 * @method     UserPrivileges findOneByIdUser(int $id_user) Return the first UserPrivileges filtered by the id_user column
 * @method     UserPrivileges findOneByIdOrganism(int $id_organism) Return the first UserPrivileges filtered by the id_organism column
 * @method     UserPrivileges findOneByIdMap(int $id_map) Return the first UserPrivileges filtered by the id_map column
 * @method     UserPrivileges findOneByIdClimate(int $id_climate) Return the first UserPrivileges filtered by the id_climate column
 * @method     UserPrivileges findOneByPlay(int $play) Return the first UserPrivileges filtered by the play column
 * @method     UserPrivileges findOneByFight(int $fight) Return the first UserPrivileges filtered by the fight column
 * @method     UserPrivileges findOneByEdit(int $edit) Return the first UserPrivileges filtered by the edit column
 * @method     UserPrivileges findOneByShowStats(int $show_stats) Return the first UserPrivileges filtered by the show_stats column
 *
 * @method     array findById(int $id) Return UserPrivileges objects filtered by the id column
 * @method     array findByIdUser(int $id_user) Return UserPrivileges objects filtered by the id_user column
 * @method     array findByIdOrganism(int $id_organism) Return UserPrivileges objects filtered by the id_organism column
 * @method     array findByIdMap(int $id_map) Return UserPrivileges objects filtered by the id_map column
 * @method     array findByIdClimate(int $id_climate) Return UserPrivileges objects filtered by the id_climate column
 * @method     array findByPlay(int $play) Return UserPrivileges objects filtered by the play column
 * @method     array findByFight(int $fight) Return UserPrivileges objects filtered by the fight column
 * @method     array findByEdit(int $edit) Return UserPrivileges objects filtered by the edit column
 * @method     array findByShowStats(int $show_stats) Return UserPrivileges objects filtered by the show_stats column
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseUserPrivilegesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserPrivilegesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'biobattleground', $modelName = 'UserPrivileges', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserPrivilegesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserPrivilegesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserPrivilegesQuery) {
			return $criteria;
		}
		$query = new UserPrivilegesQuery();
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
	 * @return    UserPrivileges|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserPrivilegesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserPrivilegesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserPrivilegesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_user column
	 * 
	 * @param     int|array $idUser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdUser($idUser = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($idUser)) {
			$useMinMax = false;
			if (isset($idUser['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idUser['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_USER, $idUser, $comparison);
	}

	/**
	 * Filter the query on the id_organism column
	 * 
	 * @param     int|array $idOrganism The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdOrganism($idOrganism = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($idOrganism)) {
			$useMinMax = false;
			if (isset($idOrganism['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $idOrganism['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idOrganism['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $idOrganism['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $idOrganism, $comparison);
	}

	/**
	 * Filter the query on the id_map column
	 * 
	 * @param     int|array $idMap The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdMap($idMap = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($idMap)) {
			$useMinMax = false;
			if (isset($idMap['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_MAP, $idMap['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idMap['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_MAP, $idMap['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_MAP, $idMap, $comparison);
	}

	/**
	 * Filter the query on the id_climate column
	 * 
	 * @param     int|array $idClimate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdClimate($idClimate = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($idClimate)) {
			$useMinMax = false;
			if (isset($idClimate['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $idClimate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idClimate['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $idClimate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $idClimate, $comparison);
	}

	/**
	 * Filter the query on the play column
	 * 
	 * @param     int|array $play The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByPlay($play = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($play)) {
			$useMinMax = false;
			if (isset($play['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::PLAY, $play['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($play['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::PLAY, $play['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::PLAY, $play, $comparison);
	}

	/**
	 * Filter the query on the fight column
	 * 
	 * @param     int|array $fight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByFight($fight = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($fight)) {
			$useMinMax = false;
			if (isset($fight['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::FIGHT, $fight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fight['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::FIGHT, $fight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::FIGHT, $fight, $comparison);
	}

	/**
	 * Filter the query on the edit column
	 * 
	 * @param     int|array $edit The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByEdit($edit = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($edit)) {
			$useMinMax = false;
			if (isset($edit['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::EDIT, $edit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($edit['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::EDIT, $edit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::EDIT, $edit, $comparison);
	}

	/**
	 * Filter the query on the show_stats column
	 * 
	 * @param     int|array $showStats The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByShowStats($showStats = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($showStats)) {
			$useMinMax = false;
			if (isset($showStats['min'])) {
				$this->addUsingAlias(UserPrivilegesPeer::SHOW_STATS, $showStats['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showStats['max'])) {
				$this->addUsingAlias(UserPrivilegesPeer::SHOW_STATS, $showStats['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::SHOW_STATS, $showStats, $comparison);
	}

	/**
	 * Filter the query by a related Organism object
	 *
	 * @param     Organism $organism  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByOrganism($organism, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $organism->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Organism relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPrivilegesPeer::ID_USER, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
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
	 * Filter the query by a related Map object
	 *
	 * @param     Map $map  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByMap($map, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPrivilegesPeer::ID_MAP, $map->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Map relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function joinMap($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Map');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Map');
		}
		
		return $this;
	}

	/**
	 * Use the Map relation Map object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MapQuery A secondary query class using the current class as primary query
	 */
	public function useMapQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMap($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Map', 'MapQuery');
	}

	/**
	 * Filter the query by a related Climate object
	 *
	 * @param     Climate $climate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByClimate($climate, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $climate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Climate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function joinClimate($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Climate');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Climate');
		}
		
		return $this;
	}

	/**
	 * Use the Climate relation Climate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClimateQuery A secondary query class using the current class as primary query
	 */
	public function useClimateQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinClimate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Climate', 'ClimateQuery');
	}

	/**
	 * Filter the query by a related Group object
	 *
	 * @param     Group $group  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(UserPrivilegesPeer::ID_USER, $group->getIdUserPrivileges(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Group relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function joinGroup($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Group');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
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
	public function useGroupQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Group', 'GroupQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UserPrivileges $userPrivileges Object to remove from the list of results
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function prune($userPrivileges = null)
	{
		if ($userPrivileges) {
			$this->addUsingAlias(UserPrivilegesPeer::ID, $userPrivileges->getId(), Criteria::NOT_EQUAL);
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

} // BaseUserPrivilegesQuery
