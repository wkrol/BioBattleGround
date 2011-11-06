<<<<<<< HEAD
<?php

/**
 * Base class that represents a row from the 'group' table.
 *
 * 
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseGroup extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'GroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        GroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the id_user_privileges field.
	 * @var        int
	 */
	protected $id_user_privileges;

	/**
	 * The value for the id_organism field.
	 * @var        int
	 */
	protected $id_organism;

	/**
	 * The value for the id_simulation field.
	 * @var        int
	 */
	protected $id_simulation;

	/**
	 * The value for the survive field.
	 * @var        int
	 */
	protected $survive;

	/**
	 * The value for the average_life_length field.
	 * @var        int
	 */
	protected $average_life_length;

	/**
	 * The value for the quantity field.
	 * @var        int
	 */
	protected $quantity;

	/**
	 * The value for the deaths field.
	 * @var        int
	 */
	protected $deaths;

	/**
	 * @var        Organism
	 */
	protected $aOrganism;

	/**
	 * @var        Simulation
	 */
	protected $aSimulation;

	/**
	 * @var        UserPrivileges
	 */
	protected $aUserPrivileges;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [id_user_privileges] column value.
	 * 
	 * @return     int
	 */
	public function getIdUserPrivileges()
	{
		return $this->id_user_privileges;
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
	 * Get the [id_simulation] column value.
	 * 
	 * @return     int
	 */
	public function getIdSimulation()
	{
		return $this->id_simulation;
	}

	/**
	 * Get the [survive] column value.
	 * 
	 * @return     int
	 */
	public function getSurvive()
	{
		return $this->survive;
	}

	/**
	 * Get the [average_life_length] column value.
	 * 
	 * @return     int
	 */
	public function getAverageLifeLength()
	{
		return $this->average_life_length;
	}

	/**
	 * Get the [quantity] column value.
	 * 
	 * @return     int
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Get the [deaths] column value.
	 * 
	 * @return     int
	 */
	public function getDeaths()
	{
		return $this->deaths;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_user_privileges] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setIdUserPrivileges($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_user_privileges !== $v) {
			$this->id_user_privileges = $v;
			$this->modifiedColumns[] = GroupPeer::ID_USER_PRIVILEGES;
		}

		if ($this->aUserPrivileges !== null && $this->aUserPrivileges->getIdUser() !== $v) {
			$this->aUserPrivileges = null;
		}

		return $this;
	} // setIdUserPrivileges()

	/**
	 * Set the value of [id_organism] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setIdOrganism($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_organism !== $v) {
			$this->id_organism = $v;
			$this->modifiedColumns[] = GroupPeer::ID_ORGANISM;
		}

		if ($this->aOrganism !== null && $this->aOrganism->getId() !== $v) {
			$this->aOrganism = null;
		}

		return $this;
	} // setIdOrganism()

	/**
	 * Set the value of [id_simulation] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setIdSimulation($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_simulation !== $v) {
			$this->id_simulation = $v;
			$this->modifiedColumns[] = GroupPeer::ID_SIMULATION;
		}

		if ($this->aSimulation !== null && $this->aSimulation->getId() !== $v) {
			$this->aSimulation = null;
		}

		return $this;
	} // setIdSimulation()

	/**
	 * Set the value of [survive] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setSurvive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->survive !== $v) {
			$this->survive = $v;
			$this->modifiedColumns[] = GroupPeer::SURVIVE;
		}

		return $this;
	} // setSurvive()

	/**
	 * Set the value of [average_life_length] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setAverageLifeLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->average_life_length !== $v) {
			$this->average_life_length = $v;
			$this->modifiedColumns[] = GroupPeer::AVERAGE_LIFE_LENGTH;
		}

		return $this;
	} // setAverageLifeLength()

	/**
	 * Set the value of [quantity] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = GroupPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

	/**
	 * Set the value of [deaths] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setDeaths($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->deaths !== $v) {
			$this->deaths = $v;
			$this->modifiedColumns[] = GroupPeer::DEATHS;
		}

		return $this;
	} // setDeaths()

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
			$this->id_user_privileges = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_organism = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id_simulation = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->survive = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->average_life_length = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->quantity = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->deaths = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = GroupPeer::NUM_COLUMNS - GroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Group object", $e);
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

		if ($this->aUserPrivileges !== null && $this->id_user_privileges !== $this->aUserPrivileges->getIdUser()) {
			$this->aUserPrivileges = null;
		}
		if ($this->aOrganism !== null && $this->id_organism !== $this->aOrganism->getId()) {
			$this->aOrganism = null;
		}
		if ($this->aSimulation !== null && $this->id_simulation !== $this->aSimulation->getId()) {
			$this->aSimulation = null;
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
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = GroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aOrganism = null;
			$this->aSimulation = null;
			$this->aUserPrivileges = null;
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
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				GroupQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
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
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				GroupPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
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

			if ($this->aSimulation !== null) {
				if ($this->aSimulation->isModified() || $this->aSimulation->isNew()) {
					$affectedRows += $this->aSimulation->save($con);
				}
				$this->setSimulation($this->aSimulation);
			}

			if ($this->aUserPrivileges !== null) {
				if ($this->aUserPrivileges->isModified() || $this->aUserPrivileges->isNew()) {
					$affectedRows += $this->aUserPrivileges->save($con);
				}
				$this->setUserPrivileges($this->aUserPrivileges);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = GroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(GroupPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.GroupPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += GroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

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

			if ($this->aSimulation !== null) {
				if (!$this->aSimulation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSimulation->getValidationFailures());
				}
			}

			if ($this->aUserPrivileges !== null) {
				if (!$this->aUserPrivileges->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserPrivileges->getValidationFailures());
				}
			}


			if (($retval = GroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = GroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdUserPrivileges();
				break;
			case 2:
				return $this->getIdOrganism();
				break;
			case 3:
				return $this->getIdSimulation();
				break;
			case 4:
				return $this->getSurvive();
				break;
			case 5:
				return $this->getAverageLifeLength();
				break;
			case 6:
				return $this->getQuantity();
				break;
			case 7:
				return $this->getDeaths();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = GroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdUserPrivileges(),
			$keys[2] => $this->getIdOrganism(),
			$keys[3] => $this->getIdSimulation(),
			$keys[4] => $this->getSurvive(),
			$keys[5] => $this->getAverageLifeLength(),
			$keys[6] => $this->getQuantity(),
			$keys[7] => $this->getDeaths(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aOrganism) {
				$result['Organism'] = $this->aOrganism->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aSimulation) {
				$result['Simulation'] = $this->aSimulation->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aUserPrivileges) {
				$result['UserPrivileges'] = $this->aUserPrivileges->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = GroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdUserPrivileges($value);
				break;
			case 2:
				$this->setIdOrganism($value);
				break;
			case 3:
				$this->setIdSimulation($value);
				break;
			case 4:
				$this->setSurvive($value);
				break;
			case 5:
				$this->setAverageLifeLength($value);
				break;
			case 6:
				$this->setQuantity($value);
				break;
			case 7:
				$this->setDeaths($value);
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
		$keys = GroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdUserPrivileges($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdOrganism($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdSimulation($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSurvive($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAverageLifeLength($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setQuantity($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDeaths($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(GroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(GroupPeer::ID)) $criteria->add(GroupPeer::ID, $this->id);
		if ($this->isColumnModified(GroupPeer::ID_USER_PRIVILEGES)) $criteria->add(GroupPeer::ID_USER_PRIVILEGES, $this->id_user_privileges);
		if ($this->isColumnModified(GroupPeer::ID_ORGANISM)) $criteria->add(GroupPeer::ID_ORGANISM, $this->id_organism);
		if ($this->isColumnModified(GroupPeer::ID_SIMULATION)) $criteria->add(GroupPeer::ID_SIMULATION, $this->id_simulation);
		if ($this->isColumnModified(GroupPeer::SURVIVE)) $criteria->add(GroupPeer::SURVIVE, $this->survive);
		if ($this->isColumnModified(GroupPeer::AVERAGE_LIFE_LENGTH)) $criteria->add(GroupPeer::AVERAGE_LIFE_LENGTH, $this->average_life_length);
		if ($this->isColumnModified(GroupPeer::QUANTITY)) $criteria->add(GroupPeer::QUANTITY, $this->quantity);
		if ($this->isColumnModified(GroupPeer::DEATHS)) $criteria->add(GroupPeer::DEATHS, $this->deaths);

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
		$criteria = new Criteria(GroupPeer::DATABASE_NAME);
		$criteria->add(GroupPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Group (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setIdUserPrivileges($this->id_user_privileges);
		$copyObj->setIdOrganism($this->id_organism);
		$copyObj->setIdSimulation($this->id_simulation);
		$copyObj->setSurvive($this->survive);
		$copyObj->setAverageLifeLength($this->average_life_length);
		$copyObj->setQuantity($this->quantity);
		$copyObj->setDeaths($this->deaths);

		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Group Clone of current object.
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
	 * @return     GroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Organism object.
	 *
	 * @param      Organism $v
	 * @return     Group The current object (for fluent API support)
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
			$v->addGroup($this);
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
			$this->aOrganism = OrganismQuery::create()->findPk($this->id_organism);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aOrganism->addGroups($this);
			 */
		}
		return $this->aOrganism;
	}

	/**
	 * Declares an association between this object and a Simulation object.
	 *
	 * @param      Simulation $v
	 * @return     Group The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSimulation(Simulation $v = null)
	{
		if ($v === null) {
			$this->setIdSimulation(NULL);
		} else {
			$this->setIdSimulation($v->getId());
		}

		$this->aSimulation = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Simulation object, it will not be re-added.
		if ($v !== null) {
			$v->addGroup($this);
		}

		return $this;
	}


	/**
	 * Get the associated Simulation object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Simulation The associated Simulation object.
	 * @throws     PropelException
	 */
	public function getSimulation(PropelPDO $con = null)
	{
		if ($this->aSimulation === null && ($this->id_simulation !== null)) {
			$this->aSimulation = SimulationQuery::create()->findPk($this->id_simulation);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSimulation->addGroups($this);
			 */
		}
		return $this->aSimulation;
	}

	/**
	 * Declares an association between this object and a UserPrivileges object.
	 *
	 * @param      UserPrivileges $v
	 * @return     Group The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserPrivileges(UserPrivileges $v = null)
	{
		if ($v === null) {
			$this->setIdUserPrivileges(NULL);
		} else {
			$this->setIdUserPrivileges($v->getIdUser());
		}

		$this->aUserPrivileges = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the UserPrivileges object, it will not be re-added.
		if ($v !== null) {
			$v->addGroup($this);
		}

		return $this;
	}


	/**
	 * Get the associated UserPrivileges object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     UserPrivileges The associated UserPrivileges object.
	 * @throws     PropelException
	 */
	public function getUserPrivileges(PropelPDO $con = null)
	{
		if ($this->aUserPrivileges === null && ($this->id_user_privileges !== null)) {
			$this->aUserPrivileges = UserPrivilegesQuery::create()
				->filterByGroup($this) // here
				->findOne($con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUserPrivileges->addGroups($this);
			 */
		}
		return $this->aUserPrivileges;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_user_privileges = null;
		$this->id_organism = null;
		$this->id_simulation = null;
		$this->survive = null;
		$this->average_life_length = null;
		$this->quantity = null;
		$this->deaths = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aOrganism = null;
		$this->aSimulation = null;
		$this->aUserPrivileges = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches) && $this->hasVirtualColumn($matches[1])) {
			return $this->getVirtualColumn($matches[1]);
		}
		throw new PropelException('Call to undefined method: ' . $name);
	}

} // BaseGroup
=======
<?php

/**
 * Base class that represents a row from the 'group' table.
 *
 * 
 *
 * @package    biobattleground.om
 */
abstract class BaseGroup extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        GroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the id_user_privileges field.
	 * @var        int
	 */
	protected $id_user_privileges;

	/**
	 * The value for the id_organism field.
	 * @var        int
	 */
	protected $id_organism;

	/**
	 * The value for the id_simulation field.
	 * @var        int
	 */
	protected $id_simulation;

	/**
	 * The value for the survive field.
	 * @var        int
	 */
	protected $survive;

	/**
	 * The value for the average_life_length field.
	 * @var        int
	 */
	protected $average_life_length;

	/**
	 * The value for the quantity field.
	 * @var        int
	 */
	protected $quantity;

	/**
	 * The value for the deaths field.
	 * @var        int
	 */
	protected $deaths;

	/**
	 * @var        Organism
	 */
	protected $aOrganism;

	/**
	 * @var        Simulation
	 */
	protected $aSimulation;

	/**
	 * @var        UserPrivileges
	 */
	protected $aUserPrivileges;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [id_user_privileges] column value.
	 * 
	 * @return     int
	 */
	public function getIdUserPrivileges()
	{
		return $this->id_user_privileges;
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
	 * Get the [id_simulation] column value.
	 * 
	 * @return     int
	 */
	public function getIdSimulation()
	{
		return $this->id_simulation;
	}

	/**
	 * Get the [survive] column value.
	 * 
	 * @return     int
	 */
	public function getSurvive()
	{
		return $this->survive;
	}

	/**
	 * Get the [average_life_length] column value.
	 * 
	 * @return     int
	 */
	public function getAverageLifeLength()
	{
		return $this->average_life_length;
	}

	/**
	 * Get the [quantity] column value.
	 * 
	 * @return     int
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Get the [deaths] column value.
	 * 
	 * @return     int
	 */
	public function getDeaths()
	{
		return $this->deaths;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_user_privileges] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setIdUserPrivileges($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_user_privileges !== $v) {
			$this->id_user_privileges = $v;
			$this->modifiedColumns[] = GroupPeer::ID_USER_PRIVILEGES;
		}

		if ($this->aUserPrivileges !== null && $this->aUserPrivileges->getIdUser() !== $v) {
			$this->aUserPrivileges = null;
		}

		return $this;
	} // setIdUserPrivileges()

	/**
	 * Set the value of [id_organism] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setIdOrganism($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_organism !== $v) {
			$this->id_organism = $v;
			$this->modifiedColumns[] = GroupPeer::ID_ORGANISM;
		}

		if ($this->aOrganism !== null && $this->aOrganism->getId() !== $v) {
			$this->aOrganism = null;
		}

		return $this;
	} // setIdOrganism()

	/**
	 * Set the value of [id_simulation] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setIdSimulation($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_simulation !== $v) {
			$this->id_simulation = $v;
			$this->modifiedColumns[] = GroupPeer::ID_SIMULATION;
		}

		if ($this->aSimulation !== null && $this->aSimulation->getId() !== $v) {
			$this->aSimulation = null;
		}

		return $this;
	} // setIdSimulation()

	/**
	 * Set the value of [survive] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setSurvive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->survive !== $v) {
			$this->survive = $v;
			$this->modifiedColumns[] = GroupPeer::SURVIVE;
		}

		return $this;
	} // setSurvive()

	/**
	 * Set the value of [average_life_length] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setAverageLifeLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->average_life_length !== $v) {
			$this->average_life_length = $v;
			$this->modifiedColumns[] = GroupPeer::AVERAGE_LIFE_LENGTH;
		}

		return $this;
	} // setAverageLifeLength()

	/**
	 * Set the value of [quantity] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = GroupPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

	/**
	 * Set the value of [deaths] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setDeaths($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->deaths !== $v) {
			$this->deaths = $v;
			$this->modifiedColumns[] = GroupPeer::DEATHS;
		}

		return $this;
	} // setDeaths()

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
			$this->id_user_privileges = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_organism = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id_simulation = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->survive = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->average_life_length = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->quantity = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->deaths = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = GroupPeer::NUM_COLUMNS - GroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Group object", $e);
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

		if ($this->aUserPrivileges !== null && $this->id_user_privileges !== $this->aUserPrivileges->getIdUser()) {
			$this->aUserPrivileges = null;
		}
		if ($this->aOrganism !== null && $this->id_organism !== $this->aOrganism->getId()) {
			$this->aOrganism = null;
		}
		if ($this->aSimulation !== null && $this->id_simulation !== $this->aSimulation->getId()) {
			$this->aSimulation = null;
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
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = GroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aOrganism = null;
			$this->aSimulation = null;
			$this->aUserPrivileges = null;
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
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				GroupPeer::doDelete($this, $con);
				$this->postDelete($con);
				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
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
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				GroupPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
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

			if ($this->aSimulation !== null) {
				if ($this->aSimulation->isModified() || $this->aSimulation->isNew()) {
					$affectedRows += $this->aSimulation->save($con);
				}
				$this->setSimulation($this->aSimulation);
			}

			if ($this->aUserPrivileges !== null) {
				if ($this->aUserPrivileges->isModified() || $this->aUserPrivileges->isNew()) {
					$affectedRows += $this->aUserPrivileges->save($con);
				}
				$this->setUserPrivileges($this->aUserPrivileges);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = GroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GroupPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += GroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

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

			if ($this->aSimulation !== null) {
				if (!$this->aSimulation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSimulation->getValidationFailures());
				}
			}

			if ($this->aUserPrivileges !== null) {
				if (!$this->aUserPrivileges->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserPrivileges->getValidationFailures());
				}
			}


			if (($retval = GroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(GroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(GroupPeer::ID)) $criteria->add(GroupPeer::ID, $this->id);
		if ($this->isColumnModified(GroupPeer::ID_USER_PRIVILEGES)) $criteria->add(GroupPeer::ID_USER_PRIVILEGES, $this->id_user_privileges);
		if ($this->isColumnModified(GroupPeer::ID_ORGANISM)) $criteria->add(GroupPeer::ID_ORGANISM, $this->id_organism);
		if ($this->isColumnModified(GroupPeer::ID_SIMULATION)) $criteria->add(GroupPeer::ID_SIMULATION, $this->id_simulation);
		if ($this->isColumnModified(GroupPeer::SURVIVE)) $criteria->add(GroupPeer::SURVIVE, $this->survive);
		if ($this->isColumnModified(GroupPeer::AVERAGE_LIFE_LENGTH)) $criteria->add(GroupPeer::AVERAGE_LIFE_LENGTH, $this->average_life_length);
		if ($this->isColumnModified(GroupPeer::QUANTITY)) $criteria->add(GroupPeer::QUANTITY, $this->quantity);
		if ($this->isColumnModified(GroupPeer::DEATHS)) $criteria->add(GroupPeer::DEATHS, $this->deaths);

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
		$criteria = new Criteria(GroupPeer::DATABASE_NAME);

		$criteria->add(GroupPeer::ID, $this->id);

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
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Group (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdUserPrivileges($this->id_user_privileges);

		$copyObj->setIdOrganism($this->id_organism);

		$copyObj->setIdSimulation($this->id_simulation);

		$copyObj->setSurvive($this->survive);

		$copyObj->setAverageLifeLength($this->average_life_length);

		$copyObj->setQuantity($this->quantity);

		$copyObj->setDeaths($this->deaths);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

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
	 * @return     Group Clone of current object.
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
	 * @return     GroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Organism object.
	 *
	 * @param      Organism $v
	 * @return     Group The current object (for fluent API support)
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
			$v->addGroup($this);
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
			$this->aOrganism = OrganismPeer::retrieveByPk($this->id_organism);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aOrganism->addGroups($this);
			 */
		}
		return $this->aOrganism;
	}

	/**
	 * Declares an association between this object and a Simulation object.
	 *
	 * @param      Simulation $v
	 * @return     Group The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSimulation(Simulation $v = null)
	{
		if ($v === null) {
			$this->setIdSimulation(NULL);
		} else {
			$this->setIdSimulation($v->getId());
		}

		$this->aSimulation = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Simulation object, it will not be re-added.
		if ($v !== null) {
			$v->addGroup($this);
		}

		return $this;
	}


	/**
	 * Get the associated Simulation object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Simulation The associated Simulation object.
	 * @throws     PropelException
	 */
	public function getSimulation(PropelPDO $con = null)
	{
		if ($this->aSimulation === null && ($this->id_simulation !== null)) {
			$this->aSimulation = SimulationPeer::retrieveByPk($this->id_simulation);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSimulation->addGroups($this);
			 */
		}
		return $this->aSimulation;
	}

	/**
	 * Declares an association between this object and a UserPrivileges object.
	 *
	 * @param      UserPrivileges $v
	 * @return     Group The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserPrivileges(UserPrivileges $v = null)
	{
		if ($v === null) {
			$this->setIdUserPrivileges(NULL);
		} else {
			$this->setIdUserPrivileges($v->getIdUser());
		}

		$this->aUserPrivileges = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the UserPrivileges object, it will not be re-added.
		if ($v !== null) {
			$v->addGroup($this);
		}

		return $this;
	}


	/**
	 * Get the associated UserPrivileges object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     UserPrivileges The associated UserPrivileges object.
	 * @throws     PropelException
	 */
	public function getUserPrivileges(PropelPDO $con = null)
	{
		if ($this->aUserPrivileges === null && ($this->id_user_privileges !== null)) {
			$c = new Criteria(UserPrivilegesPeer::DATABASE_NAME);
			$c->add(UserPrivilegesPeer::ID_USER, $this->id_user_privileges);
			$this->aUserPrivileges = UserPrivilegesPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUserPrivileges->addGroups($this);
			 */
		}
		return $this->aUserPrivileges;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aOrganism = null;
			$this->aSimulation = null;
			$this->aUserPrivileges = null;
	}

} // BaseGroup
>>>>>>> branch 'master' of git@github.com:Szorstki/BioBattleGround.git
