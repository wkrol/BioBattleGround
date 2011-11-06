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
 * @method     UserPrivilegesQuery leftJoinOrganism($relationAlias = null) Adds a LEFT JOIN clause to the query using the Organism relation
 * @method     UserPrivilegesQuery rightJoinOrganism($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Organism relation
 * @method     UserPrivilegesQuery innerJoinOrganism($relationAlias = null) Adds a INNER JOIN clause to the query using the Organism relation
 *
 * @method     UserPrivilegesQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     UserPrivilegesQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     UserPrivilegesQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     UserPrivilegesQuery leftJoinMap($relationAlias = null) Adds a LEFT JOIN clause to the query using the Map relation
 * @method     UserPrivilegesQuery rightJoinMap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Map relation
 * @method     UserPrivilegesQuery innerJoinMap($relationAlias = null) Adds a INNER JOIN clause to the query using the Map relation
 *
 * @method     UserPrivilegesQuery leftJoinClimate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Climate relation
 * @method     UserPrivilegesQuery rightJoinClimate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Climate relation
 * @method     UserPrivilegesQuery innerJoinClimate($relationAlias = null) Adds a INNER JOIN clause to the query using the Climate relation
 *
 * @method     UserPrivilegesQuery leftJoinGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Group relation
 * @method     UserPrivilegesQuery rightJoinGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     UserPrivilegesQuery innerJoinGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     UserPrivileges findOne(PropelPDO $con = null) Return the first UserPrivileges matching the query
 * @method     UserPrivileges findOneOrCreate(PropelPDO $con = null) Return the first UserPrivileges matching the query, or a new UserPrivileges object populated from the query conditions when no match is found
 *
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
	 * @return    UserPrivileges|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UserPrivilegesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UserPrivilegesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    UserPrivileges A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_USER`, `ID_ORGANISM`, `ID_MAP`, `ID_CLIMATE`, `PLAY`, `FIGHT`, `EDIT`, `SHOW_STATS` FROM `user_privileges` WHERE `ID` = :p0';
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
			$obj = new UserPrivileges();
			$obj->hydrate($row);
			UserPrivilegesPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    UserPrivileges|array|mixed the result, formatted by the current formatter
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
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_user column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdUser(1234); // WHERE id_user = 1234
	 * $query->filterByIdUser(array(12, 34)); // WHERE id_user IN (12, 34)
	 * $query->filterByIdUser(array('min' => 12)); // WHERE id_user > 12
	 * </code>
	 *
	 * @see       filterByUser()
	 *
	 * @param     mixed $idUser The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdUser($idUser = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_USER, $idUser, $comparison);
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
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdOrganism($idOrganism = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $idOrganism, $comparison);
	}

	/**
	 * Filter the query on the id_map column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdMap(1234); // WHERE id_map = 1234
	 * $query->filterByIdMap(array(12, 34)); // WHERE id_map IN (12, 34)
	 * $query->filterByIdMap(array('min' => 12)); // WHERE id_map > 12
	 * </code>
	 *
	 * @see       filterByMap()
	 *
	 * @param     mixed $idMap The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdMap($idMap = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_MAP, $idMap, $comparison);
	}

	/**
	 * Filter the query on the id_climate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdClimate(1234); // WHERE id_climate = 1234
	 * $query->filterByIdClimate(array(12, 34)); // WHERE id_climate IN (12, 34)
	 * $query->filterByIdClimate(array('min' => 12)); // WHERE id_climate > 12
	 * </code>
	 *
	 * @see       filterByClimate()
	 *
	 * @param     mixed $idClimate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByIdClimate($idClimate = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $idClimate, $comparison);
	}

	/**
	 * Filter the query on the play column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPlay(1234); // WHERE play = 1234
	 * $query->filterByPlay(array(12, 34)); // WHERE play IN (12, 34)
	 * $query->filterByPlay(array('min' => 12)); // WHERE play > 12
	 * </code>
	 *
	 * @param     mixed $play The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByPlay($play = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::PLAY, $play, $comparison);
	}

	/**
	 * Filter the query on the fight column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFight(1234); // WHERE fight = 1234
	 * $query->filterByFight(array(12, 34)); // WHERE fight IN (12, 34)
	 * $query->filterByFight(array('min' => 12)); // WHERE fight > 12
	 * </code>
	 *
	 * @param     mixed $fight The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByFight($fight = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::FIGHT, $fight, $comparison);
	}

	/**
	 * Filter the query on the edit column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEdit(1234); // WHERE edit = 1234
	 * $query->filterByEdit(array(12, 34)); // WHERE edit IN (12, 34)
	 * $query->filterByEdit(array('min' => 12)); // WHERE edit > 12
	 * </code>
	 *
	 * @param     mixed $edit The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByEdit($edit = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::EDIT, $edit, $comparison);
	}

	/**
	 * Filter the query on the show_stats column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShowStats(1234); // WHERE show_stats = 1234
	 * $query->filterByShowStats(array(12, 34)); // WHERE show_stats IN (12, 34)
	 * $query->filterByShowStats(array('min' => 12)); // WHERE show_stats > 12
	 * </code>
	 *
	 * @param     mixed $showStats The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByShowStats($showStats = null, $comparison = null)
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
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPrivilegesPeer::SHOW_STATS, $showStats, $comparison);
	}

	/**
	 * Filter the query by a related Organism object
	 *
	 * @param     Organism|PropelCollection $organism The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByOrganism($organism, $comparison = null)
	{
		if ($organism instanceof Organism) {
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $organism->getId(), $comparison);
		} elseif ($organism instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_ORGANISM, $organism->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    UserPrivilegesQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_USER, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_USER, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');

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
	public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related Map object
	 *
	 * @param     Map|PropelCollection $map The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByMap($map, $comparison = null)
	{
		if ($map instanceof Map) {
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_MAP, $map->getId(), $comparison);
		} elseif ($map instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_MAP, $map->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMap() only accepts arguments of type Map or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Map relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function joinMap($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Map');

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
	public function useMapQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMap($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Map', 'MapQuery');
	}

	/**
	 * Filter the query by a related Climate object
	 *
	 * @param     Climate|PropelCollection $climate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function filterByClimate($climate, $comparison = null)
	{
		if ($climate instanceof Climate) {
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $climate->getId(), $comparison);
		} elseif ($climate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_CLIMATE, $climate->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByClimate() only accepts arguments of type Climate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Climate relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPrivilegesQuery The current query, for fluid interface
	 */
	public function joinClimate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Climate');

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
	public function useClimateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function filterByGroup($group, $comparison = null)
	{
		if ($group instanceof Group) {
			return $this
				->addUsingAlias(UserPrivilegesPeer::ID_USER, $group->getIdUserPrivileges(), $comparison);
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
	 * @return    UserPrivilegesQuery The current query, for fluid interface
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

} // BaseUserPrivilegesQuery