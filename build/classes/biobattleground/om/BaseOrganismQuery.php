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
 * @method     OrganismQuery leftJoinUserPrivileges($relationAlias = '') Adds a LEFT JOIN clause to the query using the UserPrivileges relation
 * @method     OrganismQuery rightJoinUserPrivileges($relationAlias = '') Adds a RIGHT JOIN clause to the query using the UserPrivileges relation
 * @method     OrganismQuery innerJoinUserPrivileges($relationAlias = '') Adds a INNER JOIN clause to the query using the UserPrivileges relation
 *
 * @method     OrganismQuery leftJoinGroup($relationAlias = '') Adds a LEFT JOIN clause to the query using the Group relation
 * @method     OrganismQuery rightJoinGroup($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     OrganismQuery innerJoinGroup($relationAlias = '') Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     OrganismQuery leftJoinRound($relationAlias = '') Adds a LEFT JOIN clause to the query using the Round relation
 * @method     OrganismQuery rightJoinRound($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Round relation
 * @method     OrganismQuery innerJoinRound($relationAlias = '') Adds a INNER JOIN clause to the query using the Round relation
 *
 * @method     Organism findOne(PropelPDO $con = null) Return the first Organism matching the query
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
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Organism|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = OrganismPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($id) && $comparison == Criteria::EQUAL) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(OrganismPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
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
		return $this->addUsingAlias(OrganismPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the instinct column
	 * 
	 * @param     int|array $instinct The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByInstinct($instinct = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrganismPeer::INSTINCT, $instinct, $comparison);
	}

	/**
	 * Filter the query on the toughness column
	 * 
	 * @param     int|array $toughness The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByToughness($toughness = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrganismPeer::TOUGHNESS, $toughness, $comparison);
	}

	/**
	 * Filter the query on the vitality column
	 * 
	 * @param     int|array $vitality The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByVitality($vitality = null, $comparison = Criteria::EQUAL)
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
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(OrganismPeer::VITALITY, $vitality, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = Criteria::EQUAL)
	{
		if (is_array($type)) {
			if ($comparison == Criteria::EQUAL) {
				$comparison = Criteria::IN;
			}
		} elseif (preg_match('/[\%\*]/', $type)) {
			$type = str_replace('*', '%', $type);
			if ($comparison == Criteria::EQUAL) {
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
	public function filterByUserPrivileges($userPrivileges, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(OrganismPeer::ID, $userPrivileges->getIdOrganism(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserPrivileges relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrganismQuery The current query, for fluid interface
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
	 * Filter the query by a related Group object
	 *
	 * @param     Group $group  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(OrganismPeer::ID, $group->getIdOrganism(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Group relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrganismQuery The current query, for fluid interface
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
	 * Filter the query by a related Round object
	 *
	 * @param     Round $round  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function filterByRound($round, $comparison = Criteria::EQUAL)
	{
		return $this
			->addUsingAlias(OrganismPeer::ID, $round->getIdOrganism(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Round relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OrganismQuery The current query, for fluid interface
	 */
	public function joinRound($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Round');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		
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
	public function useRoundQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
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

} // BaseOrganismQuery
