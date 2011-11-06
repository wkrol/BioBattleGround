<<<<<<< HEAD
<?php

/**
 * Base class that represents a row from the 'simulation' table.
 *
 * 
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseSimulation extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'SimulationPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SimulationPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the id_climate field.
	 * @var        int
	 */
	protected $id_climate;

	/**
	 * The value for the id_map field.
	 * @var        int
	 */
	protected $id_map;

	/**
	 * The value for the simulation_length field.
	 * @var        int
	 */
	protected $simulation_length;

	/**
	 * The value for the date field.
	 * @var        string
	 */
	protected $date;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
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
	 * Get the [id_map] column value.
	 * 
	 * @return     int
	 */
	public function getIdMap()
	{
		return $this->id_map;
	}

	/**
	 * Get the [simulation_length] column value.
	 * 
	 * @return     int
	 */
	public function getSimulationLength()
	{
		return $this->simulation_length;
	}

	/**
	 * Get the [optionally formatted] temporal [date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDate($format = '%x')
	{
		if ($this->date === null) {
			return null;
		}


		if ($this->date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SimulationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_climate] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setIdClimate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_climate !== $v) {
			$this->id_climate = $v;
			$this->modifiedColumns[] = SimulationPeer::ID_CLIMATE;
		}

		if ($this->aClimate !== null && $this->aClimate->getId() !== $v) {
			$this->aClimate = null;
		}

		return $this;
	} // setIdClimate()

	/**
	 * Set the value of [id_map] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setIdMap($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_map !== $v) {
			$this->id_map = $v;
			$this->modifiedColumns[] = SimulationPeer::ID_MAP;
		}

		if ($this->aMap !== null && $this->aMap->getId() !== $v) {
			$this->aMap = null;
		}

		return $this;
	} // setIdMap()

	/**
	 * Set the value of [simulation_length] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setSimulationLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->simulation_length !== $v) {
			$this->simulation_length = $v;
			$this->modifiedColumns[] = SimulationPeer::SIMULATION_LENGTH;
		}

		return $this;
	} // setSimulationLength()

	/**
	 * Sets the value of [date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = SimulationPeer::DATE;
			}
		} // if either are not null

		return $this;
	} // setDate()

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
			$this->id_climate = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_map = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->simulation_length = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = SimulationPeer::NUM_COLUMNS - SimulationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Simulation object", $e);
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

		if ($this->aClimate !== null && $this->id_climate !== $this->aClimate->getId()) {
			$this->aClimate = null;
		}
		if ($this->aMap !== null && $this->id_map !== $this->aMap->getId()) {
			$this->aMap = null;
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
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SimulationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aMap = null;
			$this->aClimate = null;
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
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SimulationQuery::create()
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
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SimulationPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SimulationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SimulationPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SimulationPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += SimulationPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGroups !== null) {
				foreach ($this->collGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
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


			if (($retval = SimulationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = SimulationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdClimate();
				break;
			case 2:
				return $this->getIdMap();
				break;
			case 3:
				return $this->getSimulationLength();
				break;
			case 4:
				return $this->getDate();
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
		$keys = SimulationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdClimate(),
			$keys[2] => $this->getIdMap(),
			$keys[3] => $this->getSimulationLength(),
			$keys[4] => $this->getDate(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aMap) {
				$result['Map'] = $this->aMap->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aClimate) {
				$result['Climate'] = $this->aClimate->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = SimulationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdClimate($value);
				break;
			case 2:
				$this->setIdMap($value);
				break;
			case 3:
				$this->setSimulationLength($value);
				break;
			case 4:
				$this->setDate($value);
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
		$keys = SimulationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdClimate($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdMap($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSimulationLength($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDate($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SimulationPeer::DATABASE_NAME);

		if ($this->isColumnModified(SimulationPeer::ID)) $criteria->add(SimulationPeer::ID, $this->id);
		if ($this->isColumnModified(SimulationPeer::ID_CLIMATE)) $criteria->add(SimulationPeer::ID_CLIMATE, $this->id_climate);
		if ($this->isColumnModified(SimulationPeer::ID_MAP)) $criteria->add(SimulationPeer::ID_MAP, $this->id_map);
		if ($this->isColumnModified(SimulationPeer::SIMULATION_LENGTH)) $criteria->add(SimulationPeer::SIMULATION_LENGTH, $this->simulation_length);
		if ($this->isColumnModified(SimulationPeer::DATE)) $criteria->add(SimulationPeer::DATE, $this->date);

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
		$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		$criteria->add(SimulationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Simulation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setIdClimate($this->id_climate);
		$copyObj->setIdMap($this->id_map);
		$copyObj->setSimulationLength($this->simulation_length);
		$copyObj->setDate($this->date);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

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
	 * @return     Simulation Clone of current object.
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
	 * @return     SimulationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SimulationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Map object.
	 *
	 * @param      Map $v
	 * @return     Simulation The current object (for fluent API support)
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
			$v->addSimulation($this);
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
			$this->aMap = MapQuery::create()->findPk($this->id_map);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aMap->addSimulations($this);
			 */
		}
		return $this->aMap;
	}

	/**
	 * Declares an association between this object and a Climate object.
	 *
	 * @param      Climate $v
	 * @return     Simulation The current object (for fluent API support)
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
			$v->addSimulation($this);
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
			$this->aClimate = ClimateQuery::create()->findPk($this->id_climate);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aClimate->addSimulations($this);
			 */
		}
		return $this->aClimate;
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
	 * @return     void
	 */
	public function initGroups()
	{
		$this->collGroups = new PropelObjectCollection();
		$this->collGroups->setModel('Group');
	}

	/**
	 * Gets an array of Group objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Simulation is new, it will return
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
					->filterBySimulation($this)
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
					->filterBySimulation($this)
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
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroup(Group $l)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collGroups[]= $l;
			$l->setSimulation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Simulation is new, it will return
	 * an empty collection; or if this Simulation has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Simulation.
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
	 * Otherwise if this Simulation is new, it will return
	 * an empty collection; or if this Simulation has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Simulation.
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
	 * @return     void
	 */
	public function initRounds()
	{
		$this->collRounds = new PropelObjectCollection();
		$this->collRounds->setModel('Round');
	}

	/**
	 * Gets an array of Round objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Simulation is new, it will return
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
					->filterBySimulation($this)
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
					->filterBySimulation($this)
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
	 * @return     void
	 * @throws     PropelException
	 */
	public function addRound(Round $l)
	{
		if ($this->collRounds === null) {
			$this->initRounds();
		}
		if (!$this->collRounds->contains($l)) { // only add it if the **same** object is not already associated
			$this->collRounds[]= $l;
			$l->setSimulation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Simulation is new, it will return
	 * an empty collection; or if this Simulation has previously
	 * been saved, it will retrieve related Rounds from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Simulation.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Round[] List of Round objects
	 */
	public function getRoundsJoinOrganism($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RoundQuery::create(null, $criteria);
		$query->joinWith('Organism', $join_behavior);

		return $this->getRounds($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_climate = null;
		$this->id_map = null;
		$this->simulation_length = null;
		$this->date = null;
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
			if ($this->collGroups) {
				foreach ((array) $this->collGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRounds) {
				foreach ((array) $this->collRounds as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collGroups = null;
		$this->collRounds = null;
		$this->aMap = null;
		$this->aClimate = null;
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

} // BaseSimulation
=======
<?php

/**
 * Base class that represents a row from the 'simulation' table.
 *
 * 
 *
 * @package    biobattleground.om
 */
abstract class BaseSimulation extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SimulationPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the id_climate field.
	 * @var        int
	 */
	protected $id_climate;

	/**
	 * The value for the id_map field.
	 * @var        int
	 */
	protected $id_map;

	/**
	 * The value for the simulation_length field.
	 * @var        int
	 */
	protected $simulation_length;

	/**
	 * The value for the date field.
	 * @var        string
	 */
	protected $date;

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
	 * @var        Criteria The criteria used to select the current contents of collGroups.
	 */
	private $lastGroupCriteria = null;

	/**
	 * @var        array Round[] Collection to store aggregation of Round objects.
	 */
	protected $collRounds;

	/**
	 * @var        Criteria The criteria used to select the current contents of collRounds.
	 */
	private $lastRoundCriteria = null;

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
	 * Get the [id_climate] column value.
	 * 
	 * @return     int
	 */
	public function getIdClimate()
	{
		return $this->id_climate;
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
	 * Get the [simulation_length] column value.
	 * 
	 * @return     int
	 */
	public function getSimulationLength()
	{
		return $this->simulation_length;
	}

	/**
	 * Get the [optionally formatted] temporal [date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDate($format = '%x')
	{
		if ($this->date === null) {
			return null;
		}


		if ($this->date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SimulationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_climate] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setIdClimate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_climate !== $v) {
			$this->id_climate = $v;
			$this->modifiedColumns[] = SimulationPeer::ID_CLIMATE;
		}

		if ($this->aClimate !== null && $this->aClimate->getId() !== $v) {
			$this->aClimate = null;
		}

		return $this;
	} // setIdClimate()

	/**
	 * Set the value of [id_map] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setIdMap($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_map !== $v) {
			$this->id_map = $v;
			$this->modifiedColumns[] = SimulationPeer::ID_MAP;
		}

		if ($this->aMap !== null && $this->aMap->getId() !== $v) {
			$this->aMap = null;
		}

		return $this;
	} // setIdMap()

	/**
	 * Set the value of [simulation_length] column.
	 * 
	 * @param      int $v new value
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setSimulationLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->simulation_length !== $v) {
			$this->simulation_length = $v;
			$this->modifiedColumns[] = SimulationPeer::SIMULATION_LENGTH;
		}

		return $this;
	} // setSimulationLength()

	/**
	 * Sets the value of [date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Simulation The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = SimulationPeer::DATE;
			}
		} // if either are not null

		return $this;
	} // setDate()

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
			$this->id_climate = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_map = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->simulation_length = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = SimulationPeer::NUM_COLUMNS - SimulationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Simulation object", $e);
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

		if ($this->aClimate !== null && $this->id_climate !== $this->aClimate->getId()) {
			$this->aClimate = null;
		}
		if ($this->aMap !== null && $this->id_map !== $this->aMap->getId()) {
			$this->aMap = null;
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
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SimulationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aMap = null;
			$this->aClimate = null;
			$this->collGroups = null;
			$this->lastGroupCriteria = null;

			$this->collRounds = null;
			$this->lastRoundCriteria = null;

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
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SimulationPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SimulationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SimulationPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SimulationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SimulationPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += SimulationPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGroups !== null) {
				foreach ($this->collGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
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


			if (($retval = SimulationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SimulationPeer::DATABASE_NAME);

		if ($this->isColumnModified(SimulationPeer::ID)) $criteria->add(SimulationPeer::ID, $this->id);
		if ($this->isColumnModified(SimulationPeer::ID_CLIMATE)) $criteria->add(SimulationPeer::ID_CLIMATE, $this->id_climate);
		if ($this->isColumnModified(SimulationPeer::ID_MAP)) $criteria->add(SimulationPeer::ID_MAP, $this->id_map);
		if ($this->isColumnModified(SimulationPeer::SIMULATION_LENGTH)) $criteria->add(SimulationPeer::SIMULATION_LENGTH, $this->simulation_length);
		if ($this->isColumnModified(SimulationPeer::DATE)) $criteria->add(SimulationPeer::DATE, $this->date);

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
		$criteria = new Criteria(SimulationPeer::DATABASE_NAME);

		$criteria->add(SimulationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Simulation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdClimate($this->id_climate);

		$copyObj->setIdMap($this->id_map);

		$copyObj->setSimulationLength($this->simulation_length);

		$copyObj->setDate($this->date);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

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
	 * @return     Simulation Clone of current object.
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
	 * @return     SimulationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SimulationPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Map object.
	 *
	 * @param      Map $v
	 * @return     Simulation The current object (for fluent API support)
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
			$v->addSimulation($this);
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
			$this->aMap = MapPeer::retrieveByPk($this->id_map);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aMap->addSimulations($this);
			 */
		}
		return $this->aMap;
	}

	/**
	 * Declares an association between this object and a Climate object.
	 *
	 * @param      Climate $v
	 * @return     Simulation The current object (for fluent API support)
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
			$v->addSimulation($this);
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
			$this->aClimate = ClimatePeer::retrieveByPk($this->id_climate);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aClimate->addSimulations($this);
			 */
		}
		return $this->aClimate;
	}

	/**
	 * Clears out the collGroups collection (array).
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
	 * Initializes the collGroups collection (array).
	 *
	 * By default this just sets the collGroups collection to an empty array (like clearcollGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGroups()
	{
		$this->collGroups = array();
	}

	/**
	 * Gets an array of Group objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Simulation has previously been saved, it will retrieve
	 * related Groups from storage. If this Simulation is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Group[]
	 * @throws     PropelException
	 */
	public function getGroups($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroups === null) {
			if ($this->isNew()) {
			   $this->collGroups = array();
			} else {

				$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

				GroupPeer::addSelectColumns($criteria);
				$this->collGroups = GroupPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

				GroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastGroupCriteria) || !$this->lastGroupCriteria->equals($criteria)) {
					$this->collGroups = GroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGroupCriteria = $criteria;
		return $this->collGroups;
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
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collGroups === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

				$count = GroupPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

				if (!isset($this->lastGroupCriteria) || !$this->lastGroupCriteria->equals($criteria)) {
					$count = GroupPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collGroups);
				}
			} else {
				$count = count($this->collGroups);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Group object to this object
	 * through the Group foreign key attribute.
	 *
	 * @param      Group $l Group
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroup(Group $l)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!in_array($l, $this->collGroups, true)) { // only add it if the **same** object is not already associated
			array_push($this->collGroups, $l);
			$l->setSimulation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Simulation is new, it will return
	 * an empty collection; or if this Simulation has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Simulation.
	 */
	public function getGroupsJoinOrganism($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroups === null) {
			if ($this->isNew()) {
				$this->collGroups = array();
			} else {

				$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

				$this->collGroups = GroupPeer::doSelectJoinOrganism($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

			if (!isset($this->lastGroupCriteria) || !$this->lastGroupCriteria->equals($criteria)) {
				$this->collGroups = GroupPeer::doSelectJoinOrganism($criteria, $con, $join_behavior);
			}
		}
		$this->lastGroupCriteria = $criteria;

		return $this->collGroups;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Simulation is new, it will return
	 * an empty collection; or if this Simulation has previously
	 * been saved, it will retrieve related Groups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Simulation.
	 */
	public function getGroupsJoinUserPrivileges($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGroups === null) {
			if ($this->isNew()) {
				$this->collGroups = array();
			} else {

				$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

				$this->collGroups = GroupPeer::doSelectJoinUserPrivileges($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(GroupPeer::ID_SIMULATION, $this->id);

			if (!isset($this->lastGroupCriteria) || !$this->lastGroupCriteria->equals($criteria)) {
				$this->collGroups = GroupPeer::doSelectJoinUserPrivileges($criteria, $con, $join_behavior);
			}
		}
		$this->lastGroupCriteria = $criteria;

		return $this->collGroups;
	}

	/**
	 * Clears out the collRounds collection (array).
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
	 * Initializes the collRounds collection (array).
	 *
	 * By default this just sets the collRounds collection to an empty array (like clearcollRounds());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initRounds()
	{
		$this->collRounds = array();
	}

	/**
	 * Gets an array of Round objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Simulation has previously been saved, it will retrieve
	 * related Rounds from storage. If this Simulation is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Round[]
	 * @throws     PropelException
	 */
	public function getRounds($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRounds === null) {
			if ($this->isNew()) {
			   $this->collRounds = array();
			} else {

				$criteria->add(RoundPeer::ID_SIMULATION, $this->id);

				RoundPeer::addSelectColumns($criteria);
				$this->collRounds = RoundPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(RoundPeer::ID_SIMULATION, $this->id);

				RoundPeer::addSelectColumns($criteria);
				if (!isset($this->lastRoundCriteria) || !$this->lastRoundCriteria->equals($criteria)) {
					$this->collRounds = RoundPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRoundCriteria = $criteria;
		return $this->collRounds;
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
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRounds === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RoundPeer::ID_SIMULATION, $this->id);

				$count = RoundPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(RoundPeer::ID_SIMULATION, $this->id);

				if (!isset($this->lastRoundCriteria) || !$this->lastRoundCriteria->equals($criteria)) {
					$count = RoundPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collRounds);
				}
			} else {
				$count = count($this->collRounds);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Round object to this object
	 * through the Round foreign key attribute.
	 *
	 * @param      Round $l Round
	 * @return     void
	 * @throws     PropelException
	 */
	public function addRound(Round $l)
	{
		if ($this->collRounds === null) {
			$this->initRounds();
		}
		if (!in_array($l, $this->collRounds, true)) { // only add it if the **same** object is not already associated
			array_push($this->collRounds, $l);
			$l->setSimulation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Simulation is new, it will return
	 * an empty collection; or if this Simulation has previously
	 * been saved, it will retrieve related Rounds from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Simulation.
	 */
	public function getRoundsJoinOrganism($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(SimulationPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRounds === null) {
			if ($this->isNew()) {
				$this->collRounds = array();
			} else {

				$criteria->add(RoundPeer::ID_SIMULATION, $this->id);

				$this->collRounds = RoundPeer::doSelectJoinOrganism($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(RoundPeer::ID_SIMULATION, $this->id);

			if (!isset($this->lastRoundCriteria) || !$this->lastRoundCriteria->equals($criteria)) {
				$this->collRounds = RoundPeer::doSelectJoinOrganism($criteria, $con, $join_behavior);
			}
		}
		$this->lastRoundCriteria = $criteria;

		return $this->collRounds;
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
			if ($this->collGroups) {
				foreach ((array) $this->collGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRounds) {
				foreach ((array) $this->collRounds as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collGroups = null;
		$this->collRounds = null;
			$this->aMap = null;
			$this->aClimate = null;
	}

} // BaseSimulation
>>>>>>> branch 'master' of git@github.com:Szorstki/BioBattleGround.git
