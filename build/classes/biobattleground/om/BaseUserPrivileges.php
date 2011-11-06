<?php


/**
 * Base class that represents a row from the 'user_privileges' table.
 *
 * 
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseUserPrivileges extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UserPrivilegesPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserPrivilegesPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the id_user field.
	 * @var        int
	 */
	protected $id_user;

	/**
	 * The value for the id_organism field.
	 * @var        int
	 */
	protected $id_organism;

	/**
	 * The value for the id_map field.
	 * @var        int
	 */
	protected $id_map;

	/**
	 * The value for the id_climate field.
	 * @var        int
	 */
	protected $id_climate;

	/**
	 * The value for the play field.
	 * @var        int
	 */
	protected $play;

	/**
	 * The value for the fight field.
	 * @var        int
	 */
	protected $fight;

	/**
	 * The value for the edit field.
	 * @var        int
	 */
	protected $edit;

	/**
	 * The value for the show_stats field.
	 * @var        int
	 */
	protected $show_stats;

	/**
	 * @var        Organism
	 */
	protected $aOrganism;

	/**
	 * @var        User
	 */
	protected $aUser;

	/**
	 * @var        Map
	 */
	protected $aMap;

	/**
	 * @var        Climate
	 */
	protected $aClimate;

	/**
	 * @var        array Group[] Collection to store aggregation of Group objects.
	 */
	protected $collGroups;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $groupsScheduledForDeletion = null;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [id_user] column value.
	 * 
	 * @return     int
	 */
	public function getIdUser()
	{
		return $this->id_user;
	}

	/**
	 * Get the [id_organism] column value.
	 * 
	 * @return     int
	 */
	public function getIdOrganism()
	{
		return $this->id_organism;
	}

	/**
	 * Get the [id_map] column value.
	 * 
	 * @return     int
	 */
	public function getIdMap()
	{
		return $this->id_map;
	}

	/**
	 * Get the [id_climate] column value.
	 * 
	 * @return     int
	 */
	public function getIdClimate()
	{
		return $this->id_climate;
	}

	/**
	 * Get the [play] column value.
	 * 
	 * @return     int
	 */
	public function getPlay()
	{
		return $this->play;
	}

	/**
	 * Get the [fight] column value.
	 * 
	 * @return     int
	 */
	public function getFight()
	{
		return $this->fight;
	}

	/**
	 * Get the [edit] column value.
	 * 
	 * @return     int
	 */
	public function getEdit()
	{
		return $this->edit;
	}

	/**
	 * Get the [show_stats] column value.
	 * 
	 * @return     int
	 */
	public function getShowStats()
	{
		return $this->show_stats;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_user] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setIdUser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_user !== $v) {
			$this->id_user = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::ID_USER;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

		return $this;
	} // setIdUser()

	/**
	 * Set the value of [id_organism] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setIdOrganism($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_organism !== $v) {
			$this->id_organism = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::ID_ORGANISM;
		}

		if ($this->aOrganism !== null && $this->aOrganism->getId() !== $v) {
			$this->aOrganism = null;
		}

		return $this;
	} // setIdOrganism()

	/**
	 * Set the value of [id_map] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setIdMap($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_map !== $v) {
			$this->id_map = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::ID_MAP;
		}

		if ($this->aMap !== null && $this->aMap->getId() !== $v) {
			$this->aMap = null;
		}

		return $this;
	} // setIdMap()

	/**
	 * Set the value of [id_climate] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setIdClimate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_climate !== $v) {
			$this->id_climate = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::ID_CLIMATE;
		}

		if ($this->aClimate !== null && $this->aClimate->getId() !== $v) {
			$this->aClimate = null;
		}

		return $this;
	} // setIdClimate()

	/**
	 * Set the value of [play] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setPlay($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->play !== $v) {
			$this->play = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::PLAY;
		}

		return $this;
	} // setPlay()

	/**
	 * Set the value of [fight] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setFight($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fight !== $v) {
			$this->fight = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::FIGHT;
		}

		return $this;
	} // setFight()

	/**
	 * Set the value of [edit] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setEdit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->edit !== $v) {
			$this->edit = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::EDIT;
		}

		return $this;
	} // setEdit()

	/**
	 * Set the value of [show_stats] column.
	 * 
	 * @param      int $v new value
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function setShowStats($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->show_stats !== $v) {
			$this->show_stats = $v;
			$this->modifiedColumns[] = UserPrivilegesPeer::SHOW_STATS;
		}

		return $this;
	} // setShowStats()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->id_user = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_organism = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id_map = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->id_climate = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->play = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->fight = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->edit = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->show_stats = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = UserPrivilegesPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating UserPrivileges object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aUser !== null && $this->id_user !== $this->aUser->getId()) {
			$this->aUser = null;
		}
		if ($this->aOrganism !== null && $this->id_organism !== $this->aOrganism->getId()) {
			$this->aOrganism = null;
		}
		if ($this->aMap !== null && $this->id_map !== $this->aMap->getId()) {
			$this->aMap = null;
		}
		if ($this->aClimate !== null && $this->id_climate !== $this->aClimate->getId()) {
			$this->aClimate = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPrivilegesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserPrivilegesPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aOrganism = null;
			$this->aUser = null;
			$this->aMap = null;
			$this->aClimate = null;
			$this->collGroups = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPrivilegesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = UserPrivilegesQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPrivilegesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				UserPrivilegesPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aOrganism !== null) {
				if ($this->aOrganism->isModified() || $this->aOrganism->isNew()) {
					$affectedRows += $this->aOrganism->save($con);
				}
				$this->setOrganism($this->aOrganism);
			}

			if ($this->aUser !== null) {
				if ($this->aUser->isModified() || $this->aUser->isNew()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aMap !== null) {
				if ($this->aMap->isModified() || $this->aMap->isNew()) {
					$affectedRows += $this->aMap->save($con);
				}
				$this->setMap($this->aMap);
			}

			if ($this->aClimate !== null) {
				if ($this->aClimate->isModified() || $this->aClimate->isNew()) {
					$affectedRows += $this->aClimate->save($con);
				}
				$this->setClimate($this->aClimate);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->groupsScheduledForDeletion !== null) {
				if (!$this->groupsScheduledForDeletion->isEmpty()) {
					GroupQuery::create()
						->filterByPrimaryKeys($this->groupsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->groupsScheduledForDeletion = null;
				}
			}

			if ($this->collGroups !== null) {
				foreach ($this->collGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = UserPrivilegesPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPrivilegesPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(UserPrivilegesPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::ID_USER)) {
			$modifiedColumns[':p' . $index++]  = '`ID_USER`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::ID_ORGANISM)) {
			$modifiedColumns[':p' . $index++]  = '`ID_ORGANISM`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::ID_MAP)) {
			$modifiedColumns[':p' . $index++]  = '`ID_MAP`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::ID_CLIMATE)) {
			$modifiedColumns[':p' . $index++]  = '`ID_CLIMATE`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::PLAY)) {
			$modifiedColumns[':p' . $index++]  = '`PLAY`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::FIGHT)) {
			$modifiedColumns[':p' . $index++]  = '`FIGHT`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::EDIT)) {
			$modifiedColumns[':p' . $index++]  = '`EDIT`';
		}
		if ($this->isColumnModified(UserPrivilegesPeer::SHOW_STATS)) {
			$modifiedColumns[':p' . $index++]  = '`SHOW_STATS`';
		}

		$sql = sprintf(
			'INSERT INTO `user_privileges` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`ID_USER`':
						$stmt->bindValue($identifier, $this->id_user, PDO::PARAM_INT);
						break;
					case '`ID_ORGANISM`':
						$stmt->bindValue($identifier, $this->id_organism, PDO::PARAM_INT);
						break;
					case '`ID_MAP`':
						$stmt->bindValue($identifier, $this->id_map, PDO::PARAM_INT);
						break;
					case '`ID_CLIMATE`':
						$stmt->bindValue($identifier, $this->id_climate, PDO::PARAM_INT);
						break;
					case '`PLAY`':
						$stmt->bindValue($identifier, $this->play, PDO::PARAM_INT);
						break;
					case '`FIGHT`':
						$stmt->bindValue($identifier, $this->fight, PDO::PARAM_INT);
						break;
					case '`EDIT`':
						$stmt->bindValue($identifier, $this->edit, PDO::PARAM_INT);
						break;
					case '`SHOW_STATS`':
						$stmt->bindValue($identifier, $this->show_stats, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aOrganism !== null) {
				if (!$this->aOrganism->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrganism->getValidationFailures());
				}
			}

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aMap !== null) {
				if (!$this->aMap->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMap->getValidationFailures());
				}
			}

			if ($this->aClimate !== null) {
				if (!$this->aClimate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClimate->getValidationFailures());
				}
			}


			if (($retval = UserPrivilegesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroups !== null) {
					foreach ($this->collGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPrivilegesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdUser();
				break;
			case 2:
				return $this->getIdOrganism();
				break;
			case 3:
				return $this->getIdMap();
				break;
			case 4:
				return $this->getIdClimate();
				break;
			case 5:
				return $this->getPlay();
				break;
			case 6:
				return $this->getFight();
				break;
			case 7:
				return $this->getEdit();
				break;
			case 8:
				return $this->getShowStats();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['UserPrivileges'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['UserPrivileges'][$this->getPrimaryKey()] = true;
		$keys = UserPrivilegesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdUser(),
			$keys[2] => $this->getIdOrganism(),
			$keys[3] => $this->getIdMap(),
			$keys[4] => $this->getIdClimate(),
			$keys[5] => $this->getPlay(),
			$keys[6] => $this->getFight(),
			$keys[7] => $this->getEdit(),
			$keys[8] => $this->getShowStats(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aOrganism) {
				$result['Organism'] = $this->aOrganism->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUser) {
				$result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aMap) {
				$result['Map'] = $this->aMap->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aClimate) {
				$result['Climate'] = $this->aClimate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collGroups) {
				$result['Groups'] = $this->collGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPrivilegesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdUser($value);
				break;
			case 2:
				$this->setIdOrganism($value);
				break;
			case 3:
				$this->setIdMap($value);
				break;
			case 4:
				$this->setIdClimate($value);
				break;
			case 5:
				$this->setPlay($value);
				break;
			case 6:
				$this->setFight($value);
				break;
			case 7:
				$this->setEdit($value);
				break;
			case 8:
				$this->setShowStats($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPrivilegesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdUser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdOrganism($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdMap($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdClimate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPlay($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFight($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEdit($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setShowStats($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPrivilegesPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPrivilegesPeer::ID)) $criteria->add(UserPrivilegesPeer::ID, $this->id);
		if ($this->isColumnModified(UserPrivilegesPeer::ID_USER)) $criteria->add(UserPrivilegesPeer::ID_USER, $this->id_user);
		if ($this->isColumnModified(UserPrivilegesPeer::ID_ORGANISM)) $criteria->add(UserPrivilegesPeer::ID_ORGANISM, $this->id_organism);
		if ($this->isColumnModified(UserPrivilegesPeer::ID_MAP)) $criteria->add(UserPrivilegesPeer::ID_MAP, $this->id_map);
		if ($this->isColumnModified(UserPrivilegesPeer::ID_CLIMATE)) $criteria->add(UserPrivilegesPeer::ID_CLIMATE, $this->id_climate);
		if ($this->isColumnModified(UserPrivilegesPeer::PLAY)) $criteria->add(UserPrivilegesPeer::PLAY, $this->play);
		if ($this->isColumnModified(UserPrivilegesPeer::FIGHT)) $criteria->add(UserPrivilegesPeer::FIGHT, $this->fight);
		if ($this->isColumnModified(UserPrivilegesPeer::EDIT)) $criteria->add(UserPrivilegesPeer::EDIT, $this->edit);
		if ($this->isColumnModified(UserPrivilegesPeer::SHOW_STATS)) $criteria->add(UserPrivilegesPeer::SHOW_STATS, $this->show_stats);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPrivilegesPeer::DATABASE_NAME);
		$criteria->add(UserPrivilegesPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of UserPrivileges (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setIdUser($this->getIdUser());
		$copyObj->setIdOrganism($this->getIdOrganism());
		$copyObj->setIdMap($this->getIdMap());
		$copyObj->setIdClimate($this->getIdClimate());
		$copyObj->setPlay($this->getPlay());
		$copyObj->setFight($this->getFight());
		$copyObj->setEdit($this->getEdit());
		$copyObj->setShowStats($this->getShowStats());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroup($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     UserPrivileges Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     UserPrivilegesPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPrivilegesPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Organism object.
	 *
	 * @param      Organism $v
	 * @return     UserPrivileges The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setOrganism(Organism $v = null)
	{
		if ($v === null) {
			$this->setIdOrganism(NULL);
		} else {
			$this->setIdOrganism($v->getId());
		}

		$this->aOrganism = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Organism object, it will not be re-added.
		if ($v !== null) {
			$v->addUserPrivileges($this);
		}

		return $this;
	}


	/**
	 * Get the associated Organism object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Organism The associated Organism object.
	 * @throws     PropelException
	 */
	public function getOrganism(PropelPDO $con = null)
	{
		if ($this->aOrganism === null && ($this->id_organism !== null)) {
			$this->aOrganism = OrganismQuery::create()->findPk($this->id_organism, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aOrganism->addUserPrivilegess($this);
			 */
		}
		return $this->aOrganism;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     UserPrivileges The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUser(User $v = null)
	{
		if ($v === null) {
			$this->setIdUser(NULL);
		} else {
			$this->setIdUser($v->getId());
		}

		$this->aUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addUserPrivileges($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUser(PropelPDO $con = null)
	{
		if ($this->aUser === null && ($this->id_user !== null)) {
			$this->aUser = UserQuery::create()->findPk($this->id_user, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUser->addUserPrivilegess($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Map object.
	 *
	 * @param      Map $v
	 * @return     UserPrivileges The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setMap(Map $v = null)
	{
		if ($v === null) {
			$this->setIdMap(NULL);
		} else {
			$this->setIdMap($v->getId());
		}

		$this->aMap = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Map object, it will not be re-added.
		if ($v !== null) {
			$v->addUserPrivileges($this);
		}

		return $this;
	}


	/**
	 * Get the associated Map object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Map The associated Map object.
	 * @throws     PropelException
	 */
	public function getMap(PropelPDO $con = null)
	{
		if ($this->aMap === null && ($this->id_map !== null)) {
			$this->aMap = MapQuery::create()->findPk($this->id_map, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aMap->addUserPrivilegess($this);
			 */
		}
		return $this->aMap;
	}

	/**
	 * Declares an association between this object and a Climate object.
	 *
	 * @param      Climate $v
	 * @return     UserPrivileges The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClimate(Climate $v = null)
	{
		if ($v === null) {
			$this->setIdClimate(NULL);
		} else {
			$this->setIdClimate($v->getId());
		}

		$this->aClimate = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Climate object, it will not be re-added.
		if ($v !== null) {
			$v->addUserPrivileges($this);
		}

		return $this;
	}


	/**
	 * Get the associated Climate object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Climate The associated Climate object.
	 * @throws     PropelException
	 */
	public function getClimate(PropelPDO $con = null)
	{
		if ($this->aClimate === null && ($this->id_climate !== null)) {
			$this->aClimate = ClimateQuery::create()->findPk($this->id_climate, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aClimate->addUserPrivilegess($this);
			 */
		}
		return $this->aClimate;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Group' == $relationName) {
			return $this->initGroups();
		}
	}

	/**
	 * Clears out the collGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroups()
	 */
	public function clearGroups()
	{
		$this->collGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroups collection.
	 *
	 * By default this just sets the collGroups collection to an empty array (like clearcollGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initGroups($overrideExisting = true)
	{
		if (null !== $this->collGroups && !$overrideExisting) {
			return;
		}
		$this->collGroups = new PropelObjectCollection();
		$this->collGroups->setModel('Group');
	}

	/**
	 * Gets an array of Group objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this UserPrivileges is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Group[] List of Group objects
	 * @throws     PropelException
	 */
	public function getGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroups) {
				// return empty collection
				$this->initGroups();
			} else {
				$collGroups = GroupQuery::create(null, $criteria)
					->filterByUserPrivileges($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroups;
				}
				$this->collGroups = $collGroups;
			}
		}
		return $this->collGroups;
	}

	/**
	 * Sets a collection of Group objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $groups A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setGroups(PropelCollection $groups, PropelPDO $con = null)
	{
		$this->groupsScheduledForDeletion = $this->getGroups(new Criteria(), $con)->diff($groups);

		foreach ($groups as $group) {
			// Fix issue with collection modified by reference
			if ($group->isNew()) {
				$group->setUserPrivileges($this);
			}
			$this->addGroup($group);
		}

		$this->collGroups = $groups;
	}

	/**
	 * Returns the number of related Group objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Group objects.
	 * @throws     PropelException
	 */
	public function countGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroups) {
				return 0;
			} else {
				$query = GroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUserPrivileges($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Method called to associate a Group object to this object
	 * through the Group foreign key attribute.
	 *
	 * @param      Group $l Group
	 * @return     UserPrivileges The current object (for fluent API support)
	 */
	public function addGroup(Group $l)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddGroup($l);
		}

		return $this;
	}

	/**
	 * @param	Group $group The group object to add.
	 */
	protected function doAddGroup($group)
	{
		$this->collGroups[]= $group;
		$group->setUserPrivileges($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UserPrivileges is new, it will return
	 * an empty collection; or if this UserPrivileges has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UserPrivileges.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Group[] List of Group objects
	 */
	public function getGroupsJoinOrganism($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupQuery::create(null, $criteria);
		$query->joinWith('Organism', $join_behavior);

		return $this->getGroups($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this UserPrivileges is new, it will return
	 * an empty collection; or if this UserPrivileges has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in UserPrivileges.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Group[] List of Group objects
	 */
	public function getGroupsJoinSimulation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupQuery::create(null, $criteria);
		$query->joinWith('Simulation', $join_behavior);

		return $this->getGroups($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_user = null;
		$this->id_organism = null;
		$this->id_map = null;
		$this->id_climate = null;
		$this->play = null;
		$this->fight = null;
		$this->edit = null;
		$this->show_stats = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collGroups) {
				foreach ($this->collGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collGroups instanceof PropelCollection) {
			$this->collGroups->clearIterator();
		}
		$this->collGroups = null;
		$this->aOrganism = null;
		$this->aUser = null;
		$this->aMap = null;
		$this->aClimate = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UserPrivilegesPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseUserPrivileges
