<?php


/**
 * Base class that represents a row from the 'organism' table.
 *
 * 
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseOrganism extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'OrganismPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        OrganismPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the instinct field.
	 * @var        int
	 */
	protected $instinct;

	/**
	 * The value for the toughness field.
	 * @var        int
	 */
	protected $toughness;

	/**
	 * The value for the vitality field.
	 * @var        int
	 */
	protected $vitality;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * @var        array UserPrivileges[] Collection to store aggregation of UserPrivileges objects.
	 */
	protected $collUserPrivilegess;

	/**
	 * @var        array Group[] Collection to store aggregation of Group objects.
	 */
	protected $collGroups;

	/**
	 * @var        array Round[] Collection to store aggregation of Round objects.
	 */
	protected $collRounds;

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
	protected $userPrivilegessScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $groupsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $roundsScheduledForDeletion = null;

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
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [instinct] column value.
	 * 
	 * @return     int
	 */
	public function getInstinct()
	{
		return $this->instinct;
	}

	/**
	 * Get the [toughness] column value.
	 * 
	 * @return     int
	 */
	public function getToughness()
	{
		return $this->toughness;
	}

	/**
	 * Get the [vitality] column value.
	 * 
	 * @return     int
	 */
	public function getVitality()
	{
		return $this->vitality;
	}

	/**
	 * Get the [type] column value.
	 * 
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Organism The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OrganismPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Organism The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = OrganismPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [instinct] column.
	 * 
	 * @param      int $v new value
	 * @return     Organism The current object (for fluent API support)
	 */
	public function setInstinct($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->instinct !== $v) {
			$this->instinct = $v;
			$this->modifiedColumns[] = OrganismPeer::INSTINCT;
		}

		return $this;
	} // setInstinct()

	/**
	 * Set the value of [toughness] column.
	 * 
	 * @param      int $v new value
	 * @return     Organism The current object (for fluent API support)
	 */
	public function setToughness($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->toughness !== $v) {
			$this->toughness = $v;
			$this->modifiedColumns[] = OrganismPeer::TOUGHNESS;
		}

		return $this;
	} // setToughness()

	/**
	 * Set the value of [vitality] column.
	 * 
	 * @param      int $v new value
	 * @return     Organism The current object (for fluent API support)
	 */
	public function setVitality($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->vitality !== $v) {
			$this->vitality = $v;
			$this->modifiedColumns[] = OrganismPeer::VITALITY;
		}

		return $this;
	} // setVitality()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     Organism The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = OrganismPeer::TYPE;
		}

		return $this;
	} // setType()

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
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->instinct = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->toughness = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->vitality = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->type = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = OrganismPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Organism object", $e);
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
			$con = Propel::getConnection(OrganismPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = OrganismPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserPrivilegess = null;

			$this->collGroups = null;

			$this->collRounds = null;

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
			$con = Propel::getConnection(OrganismPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = OrganismQuery::create()
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
			$con = Propel::getConnection(OrganismPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				OrganismPeer::addInstanceToPool($this);
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

			if ($this->userPrivilegessScheduledForDeletion !== null) {
				if (!$this->userPrivilegessScheduledForDeletion->isEmpty()) {
					UserPrivilegesQuery::create()
						->filterByPrimaryKeys($this->userPrivilegessScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->userPrivilegessScheduledForDeletion = null;
				}
			}

			if ($this->collUserPrivilegess !== null) {
				foreach ($this->collUserPrivilegess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

			if ($this->roundsScheduledForDeletion !== null) {
				if (!$this->roundsScheduledForDeletion->isEmpty()) {
					RoundQuery::create()
						->filterByPrimaryKeys($this->roundsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->roundsScheduledForDeletion = null;
				}
			}

			if ($this->collRounds !== null) {
				foreach ($this->collRounds as $referrerFK) {
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

		$this->modifiedColumns[] = OrganismPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrganismPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(OrganismPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(OrganismPeer::NAME)) {
			$modifiedColumns[':p' . $index++]  = '`NAME`';
		}
		if ($this->isColumnModified(OrganismPeer::INSTINCT)) {
			$modifiedColumns[':p' . $index++]  = '`INSTINCT`';
		}
		if ($this->isColumnModified(OrganismPeer::TOUGHNESS)) {
			$modifiedColumns[':p' . $index++]  = '`TOUGHNESS`';
		}
		if ($this->isColumnModified(OrganismPeer::VITALITY)) {
			$modifiedColumns[':p' . $index++]  = '`VITALITY`';
		}
		if ($this->isColumnModified(OrganismPeer::TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`TYPE`';
		}

		$sql = sprintf(
			'INSERT INTO `organism` (%s) VALUES (%s)',
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
					case '`NAME`':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
						break;
					case '`INSTINCT`':
						$stmt->bindValue($identifier, $this->instinct, PDO::PARAM_INT);
						break;
					case '`TOUGHNESS`':
						$stmt->bindValue($identifier, $this->toughness, PDO::PARAM_INT);
						break;
					case '`VITALITY`':
						$stmt->bindValue($identifier, $this->vitality, PDO::PARAM_INT);
						break;
					case '`TYPE`':
						$stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
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


			if (($retval = OrganismPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserPrivilegess !== null) {
					foreach ($this->collUserPrivilegess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGroups !== null) {
					foreach ($this->collGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRounds !== null) {
					foreach ($this->collRounds as $referrerFK) {
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
		$pos = OrganismPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 2:
				return $this->getInstinct();
				break;
			case 3:
				return $this->getToughness();
				break;
			case 4:
				return $this->getVitality();
				break;
			case 5:
				return $this->getType();
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
		if (isset($alreadyDumpedObjects['Organism'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Organism'][$this->getPrimaryKey()] = true;
		$keys = OrganismPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getInstinct(),
			$keys[3] => $this->getToughness(),
			$keys[4] => $this->getVitality(),
			$keys[5] => $this->getType(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collUserPrivilegess) {
				$result['UserPrivilegess'] = $this->collUserPrivilegess->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroups) {
				$result['Groups'] = $this->collGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collRounds) {
				$result['Rounds'] = $this->collRounds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = OrganismPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 2:
				$this->setInstinct($value);
				break;
			case 3:
				$this->setToughness($value);
				break;
			case 4:
				$this->setVitality($value);
				break;
			case 5:
				$this->setType($value);
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
		$keys = OrganismPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInstinct($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setToughness($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setVitality($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(OrganismPeer::DATABASE_NAME);

		if ($this->isColumnModified(OrganismPeer::ID)) $criteria->add(OrganismPeer::ID, $this->id);
		if ($this->isColumnModified(OrganismPeer::NAME)) $criteria->add(OrganismPeer::NAME, $this->name);
		if ($this->isColumnModified(OrganismPeer::INSTINCT)) $criteria->add(OrganismPeer::INSTINCT, $this->instinct);
		if ($this->isColumnModified(OrganismPeer::TOUGHNESS)) $criteria->add(OrganismPeer::TOUGHNESS, $this->toughness);
		if ($this->isColumnModified(OrganismPeer::VITALITY)) $criteria->add(OrganismPeer::VITALITY, $this->vitality);
		if ($this->isColumnModified(OrganismPeer::TYPE)) $criteria->add(OrganismPeer::TYPE, $this->type);

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
		$criteria = new Criteria(OrganismPeer::DATABASE_NAME);
		$criteria->add(OrganismPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Organism (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setName($this->getName());
		$copyObj->setInstinct($this->getInstinct());
		$copyObj->setToughness($this->getToughness());
		$copyObj->setVitality($this->getVitality());
		$copyObj->setType($this->getType());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserPrivilegess() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserPrivileges($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRounds() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRound($relObj->copy($deepCopy));
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
	 * @return     Organism Clone of current object.
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
	 * @return     OrganismPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OrganismPeer();
		}
		return self::$peer;
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
		if ('UserPrivileges' == $relationName) {
			return $this->initUserPrivilegess();
		}
		if ('Group' == $relationName) {
			return $this->initGroups();
		}
		if ('Round' == $relationName) {
			return $this->initRounds();
		}
	}

	/**
	 * Clears out the collUserPrivilegess collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserPrivilegess()
	 */
	public function clearUserPrivilegess()
	{
		$this->collUserPrivilegess = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserPrivilegess collection.
	 *
	 * By default this just sets the collUserPrivilegess collection to an empty array (like clearcollUserPrivilegess());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserPrivilegess($overrideExisting = true)
	{
		if (null !== $this->collUserPrivilegess && !$overrideExisting) {
			return;
		}
		$this->collUserPrivilegess = new PropelObjectCollection();
		$this->collUserPrivilegess->setModel('UserPrivileges');
	}

	/**
	 * Gets an array of UserPrivileges objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Organism is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserPrivileges[] List of UserPrivileges objects
	 * @throws     PropelException
	 */
	public function getUserPrivilegess($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserPrivilegess || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserPrivilegess) {
				// return empty collection
				$this->initUserPrivilegess();
			} else {
				$collUserPrivilegess = UserPrivilegesQuery::create(null, $criteria)
					->filterByOrganism($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserPrivilegess;
				}
				$this->collUserPrivilegess = $collUserPrivilegess;
			}
		}
		return $this->collUserPrivilegess;
	}

	/**
	 * Sets a collection of UserPrivileges objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $userPrivilegess A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUserPrivilegess(PropelCollection $userPrivilegess, PropelPDO $con = null)
	{
		$this->userPrivilegessScheduledForDeletion = $this->getUserPrivilegess(new Criteria(), $con)->diff($userPrivilegess);

		foreach ($userPrivilegess as $userPrivileges) {
			// Fix issue with collection modified by reference
			if ($userPrivileges->isNew()) {
				$userPrivileges->setOrganism($this);
			}
			$this->addUserPrivileges($userPrivileges);
		}

		$this->collUserPrivilegess = $userPrivilegess;
	}

	/**
	 * Returns the number of related UserPrivileges objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserPrivileges objects.
	 * @throws     PropelException
	 */
	public function countUserPrivilegess(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserPrivilegess || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserPrivilegess) {
				return 0;
			} else {
				$query = UserPrivilegesQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByOrganism($this)
					->count($con);
			}
		} else {
			return count($this->collUserPrivilegess);
		}
	}

	/**
	 * Method called to associate a UserPrivileges object to this object
	 * through the UserPrivileges foreign key attribute.
	 *
	 * @param      UserPrivileges $l UserPrivileges
	 * @return     Organism The current object (for fluent API support)
	 */
	public function addUserPrivileges(UserPrivileges $l)
	{
		if ($this->collUserPrivilegess === null) {
			$this->initUserPrivilegess();
		}
		if (!$this->collUserPrivilegess->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddUserPrivileges($l);
		}

		return $this;
	}

	/**
	 * @param	UserPrivileges $userPrivileges The userPrivileges object to add.
	 */
	protected function doAddUserPrivileges($userPrivileges)
	{
		$this->collUserPrivilegess[]= $userPrivileges;
		$userPrivileges->setOrganism($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Organism is new, it will return
	 * an empty collection; or if this Organism has previously
	 * been saved, it will retrieve related UserPrivilegess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Organism.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserPrivileges[] List of UserPrivileges objects
	 */
	public function getUserPrivilegessJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserPrivilegesQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getUserPrivilegess($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Organism is new, it will return
	 * an empty collection; or if this Organism has previously
	 * been saved, it will retrieve related UserPrivilegess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Organism.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserPrivileges[] List of UserPrivileges objects
	 */
	public function getUserPrivilegessJoinMap($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserPrivilegesQuery::create(null, $criteria);
		$query->joinWith('Map', $join_behavior);

		return $this->getUserPrivilegess($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Organism is new, it will return
	 * an empty collection; or if this Organism has previously
	 * been saved, it will retrieve related UserPrivilegess from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Organism.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserPrivileges[] List of UserPrivileges objects
	 */
	public function getUserPrivilegessJoinClimate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserPrivilegesQuery::create(null, $criteria);
		$query->joinWith('Climate', $join_behavior);

		return $this->getUserPrivilegess($query, $con);
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
	 * If this Organism is new, it will return
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
					->filterByOrganism($this)
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
				$group->setOrganism($this);
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
					->filterByOrganism($this)
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
	 * @return     Organism The current object (for fluent API support)
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
		$group->setOrganism($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Organism is new, it will return
	 * an empty collection; or if this Organism has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Organism.
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
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Organism is new, it will return
	 * an empty collection; or if this Organism has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Organism.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Group[] List of Group objects
	 */
	public function getGroupsJoinUserPrivileges($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupQuery::create(null, $criteria);
		$query->joinWith('UserPrivileges', $join_behavior);

		return $this->getGroups($query, $con);
	}

	/**
	 * Clears out the collRounds collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRounds()
	 */
	public function clearRounds()
	{
		$this->collRounds = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRounds collection.
	 *
	 * By default this just sets the collRounds collection to an empty array (like clearcollRounds());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initRounds($overrideExisting = true)
	{
		if (null !== $this->collRounds && !$overrideExisting) {
			return;
		}
		$this->collRounds = new PropelObjectCollection();
		$this->collRounds->setModel('Round');
	}

	/**
	 * Gets an array of Round objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Organism is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Round[] List of Round objects
	 * @throws     PropelException
	 */
	public function getRounds($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRounds || null !== $criteria) {
			if ($this->isNew() && null === $this->collRounds) {
				// return empty collection
				$this->initRounds();
			} else {
				$collRounds = RoundQuery::create(null, $criteria)
					->filterByOrganism($this)
					->find($con);
				if (null !== $criteria) {
					return $collRounds;
				}
				$this->collRounds = $collRounds;
			}
		}
		return $this->collRounds;
	}

	/**
	 * Sets a collection of Round objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $rounds A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setRounds(PropelCollection $rounds, PropelPDO $con = null)
	{
		$this->roundsScheduledForDeletion = $this->getRounds(new Criteria(), $con)->diff($rounds);

		foreach ($rounds as $round) {
			// Fix issue with collection modified by reference
			if ($round->isNew()) {
				$round->setOrganism($this);
			}
			$this->addRound($round);
		}

		$this->collRounds = $rounds;
	}

	/**
	 * Returns the number of related Round objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Round objects.
	 * @throws     PropelException
	 */
	public function countRounds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRounds || null !== $criteria) {
			if ($this->isNew() && null === $this->collRounds) {
				return 0;
			} else {
				$query = RoundQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByOrganism($this)
					->count($con);
			}
		} else {
			return count($this->collRounds);
		}
	}

	/**
	 * Method called to associate a Round object to this object
	 * through the Round foreign key attribute.
	 *
	 * @param      Round $l Round
	 * @return     Organism The current object (for fluent API support)
	 */
	public function addRound(Round $l)
	{
		if ($this->collRounds === null) {
			$this->initRounds();
		}
		if (!$this->collRounds->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddRound($l);
		}

		return $this;
	}

	/**
	 * @param	Round $round The round object to add.
	 */
	protected function doAddRound($round)
	{
		$this->collRounds[]= $round;
		$round->setOrganism($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Organism is new, it will return
	 * an empty collection; or if this Organism has previously
	 * been saved, it will retrieve related Rounds from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Organism.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Round[] List of Round objects
	 */
	public function getRoundsJoinSimulation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RoundQuery::create(null, $criteria);
		$query->joinWith('Simulation', $join_behavior);

		return $this->getRounds($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->instinct = null;
		$this->toughness = null;
		$this->vitality = null;
		$this->type = null;
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
			if ($this->collUserPrivilegess) {
				foreach ($this->collUserPrivilegess as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroups) {
				foreach ($this->collGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRounds) {
				foreach ($this->collRounds as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collUserPrivilegess instanceof PropelCollection) {
			$this->collUserPrivilegess->clearIterator();
		}
		$this->collUserPrivilegess = null;
		if ($this->collGroups instanceof PropelCollection) {
			$this->collGroups->clearIterator();
		}
		$this->collGroups = null;
		if ($this->collRounds instanceof PropelCollection) {
			$this->collRounds->clearIterator();
		}
		$this->collRounds = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(OrganismPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseOrganism
