<?php


/**
 * Base class that represents a row from the 'round' table.
 *
 * 
 *
 * @package    propel.generator.biobattleground.om
 */
abstract class BaseRound extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RoundPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RoundPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * The value for the day field.
	 * @var        int
	 */
	protected $day;

	/**
	 * The value for the quantity field.
	 * @var        int
	 */
	protected $quantity;

	/**
	 * The value for the avg_hunger field.
	 * @var        int
	 */
	protected $avg_hunger;

	/**
	 * The value for the avg_hitpoints field.
	 * @var        int
	 */
	protected $avg_hitpoints;

	/**
	 * The value for the number_of_newborn field.
	 * @var        int
	 */
	protected $number_of_newborn;

	/**
	 * @var        Organism
	 */
	protected $aOrganism;

	/**
	 * @var        Simulation
	 */
	protected $aSimulation;

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
	 * Get the [day] column value.
	 * 
	 * @return     int
	 */
	public function getDay()
	{
		return $this->day;
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
	 * Get the [avg_hunger] column value.
	 * 
	 * @return     int
	 */
	public function getAvgHunger()
	{
		return $this->avg_hunger;
	}

	/**
	 * Get the [avg_hitpoints] column value.
	 * 
	 * @return     int
	 */
	public function getAvgHitpoints()
	{
		return $this->avg_hitpoints;
	}

	/**
	 * Get the [number_of_newborn] column value.
	 * 
	 * @return     int
	 */
	public function getNumberOfNewborn()
	{
		return $this->number_of_newborn;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RoundPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_organism] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setIdOrganism($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_organism !== $v) {
			$this->id_organism = $v;
			$this->modifiedColumns[] = RoundPeer::ID_ORGANISM;
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
	 * @return     Round The current object (for fluent API support)
	 */
	public function setIdSimulation($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_simulation !== $v) {
			$this->id_simulation = $v;
			$this->modifiedColumns[] = RoundPeer::ID_SIMULATION;
		}

		if ($this->aSimulation !== null && $this->aSimulation->getId() !== $v) {
			$this->aSimulation = null;
		}

		return $this;
	} // setIdSimulation()

	/**
	 * Set the value of [day] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setDay($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->day !== $v) {
			$this->day = $v;
			$this->modifiedColumns[] = RoundPeer::DAY;
		}

		return $this;
	} // setDay()

	/**
	 * Set the value of [quantity] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[] = RoundPeer::QUANTITY;
		}

		return $this;
	} // setQuantity()

	/**
	 * Set the value of [avg_hunger] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setAvgHunger($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->avg_hunger !== $v) {
			$this->avg_hunger = $v;
			$this->modifiedColumns[] = RoundPeer::AVG_HUNGER;
		}

		return $this;
	} // setAvgHunger()

	/**
	 * Set the value of [avg_hitpoints] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setAvgHitpoints($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->avg_hitpoints !== $v) {
			$this->avg_hitpoints = $v;
			$this->modifiedColumns[] = RoundPeer::AVG_HITPOINTS;
		}

		return $this;
	} // setAvgHitpoints()

	/**
	 * Set the value of [number_of_newborn] column.
	 * 
	 * @param      int $v new value
	 * @return     Round The current object (for fluent API support)
	 */
	public function setNumberOfNewborn($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->number_of_newborn !== $v) {
			$this->number_of_newborn = $v;
			$this->modifiedColumns[] = RoundPeer::NUMBER_OF_NEWBORN;
		}

		return $this;
	} // setNumberOfNewborn()

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
			$this->id_organism = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_simulation = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->day = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->quantity = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->avg_hunger = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->avg_hitpoints = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->number_of_newborn = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = RoundPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Round object", $e);
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
			$con = Propel::getConnection(RoundPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RoundPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aOrganism = null;
			$this->aSimulation = null;
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
			$con = Propel::getConnection(RoundPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RoundQuery::create()
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
			$con = Propel::getConnection(RoundPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RoundPeer::addInstanceToPool($this);
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

			if ($this->aSimulation !== null) {
				if ($this->aSimulation->isModified() || $this->aSimulation->isNew()) {
					$affectedRows += $this->aSimulation->save($con);
				}
				$this->setSimulation($this->aSimulation);
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


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RoundPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RoundPeer::ID_ORGANISM)) {
			$modifiedColumns[':p' . $index++]  = '`ID_ORGANISM`';
		}
		if ($this->isColumnModified(RoundPeer::ID_SIMULATION)) {
			$modifiedColumns[':p' . $index++]  = '`ID_SIMULATION`';
		}
		if ($this->isColumnModified(RoundPeer::DAY)) {
			$modifiedColumns[':p' . $index++]  = '`DAY`';
		}
		if ($this->isColumnModified(RoundPeer::QUANTITY)) {
			$modifiedColumns[':p' . $index++]  = '`QUANTITY`';
		}
		if ($this->isColumnModified(RoundPeer::AVG_HUNGER)) {
			$modifiedColumns[':p' . $index++]  = '`AVG_HUNGER`';
		}
		if ($this->isColumnModified(RoundPeer::AVG_HITPOINTS)) {
			$modifiedColumns[':p' . $index++]  = '`AVG_HITPOINTS`';
		}
		if ($this->isColumnModified(RoundPeer::NUMBER_OF_NEWBORN)) {
			$modifiedColumns[':p' . $index++]  = '`NUMBER_OF_NEWBORN`';
		}

		$sql = sprintf(
			'INSERT INTO `round` (%s) VALUES (%s)',
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
					case '`ID_ORGANISM`':
						$stmt->bindValue($identifier, $this->id_organism, PDO::PARAM_INT);
						break;
					case '`ID_SIMULATION`':
						$stmt->bindValue($identifier, $this->id_simulation, PDO::PARAM_INT);
						break;
					case '`DAY`':
						$stmt->bindValue($identifier, $this->day, PDO::PARAM_INT);
						break;
					case '`QUANTITY`':
						$stmt->bindValue($identifier, $this->quantity, PDO::PARAM_INT);
						break;
					case '`AVG_HUNGER`':
						$stmt->bindValue($identifier, $this->avg_hunger, PDO::PARAM_INT);
						break;
					case '`AVG_HITPOINTS`':
						$stmt->bindValue($identifier, $this->avg_hitpoints, PDO::PARAM_INT);
						break;
					case '`NUMBER_OF_NEWBORN`':
						$stmt->bindValue($identifier, $this->number_of_newborn, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

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

			if ($this->aSimulation !== null) {
				if (!$this->aSimulation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSimulation->getValidationFailures());
				}
			}


			if (($retval = RoundPeer::doValidate($this, $columns)) !== true) {
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
		$pos = RoundPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdOrganism();
				break;
			case 2:
				return $this->getIdSimulation();
				break;
			case 3:
				return $this->getDay();
				break;
			case 4:
				return $this->getQuantity();
				break;
			case 5:
				return $this->getAvgHunger();
				break;
			case 6:
				return $this->getAvgHitpoints();
				break;
			case 7:
				return $this->getNumberOfNewborn();
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
		if (isset($alreadyDumpedObjects['Round'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Round'][$this->getPrimaryKey()] = true;
		$keys = RoundPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdOrganism(),
			$keys[2] => $this->getIdSimulation(),
			$keys[3] => $this->getDay(),
			$keys[4] => $this->getQuantity(),
			$keys[5] => $this->getAvgHunger(),
			$keys[6] => $this->getAvgHitpoints(),
			$keys[7] => $this->getNumberOfNewborn(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aOrganism) {
				$result['Organism'] = $this->aOrganism->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aSimulation) {
				$result['Simulation'] = $this->aSimulation->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = RoundPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdOrganism($value);
				break;
			case 2:
				$this->setIdSimulation($value);
				break;
			case 3:
				$this->setDay($value);
				break;
			case 4:
				$this->setQuantity($value);
				break;
			case 5:
				$this->setAvgHunger($value);
				break;
			case 6:
				$this->setAvgHitpoints($value);
				break;
			case 7:
				$this->setNumberOfNewborn($value);
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
		$keys = RoundPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdOrganism($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdSimulation($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDay($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setQuantity($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAvgHunger($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAvgHitpoints($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumberOfNewborn($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RoundPeer::DATABASE_NAME);

		if ($this->isColumnModified(RoundPeer::ID)) $criteria->add(RoundPeer::ID, $this->id);
		if ($this->isColumnModified(RoundPeer::ID_ORGANISM)) $criteria->add(RoundPeer::ID_ORGANISM, $this->id_organism);
		if ($this->isColumnModified(RoundPeer::ID_SIMULATION)) $criteria->add(RoundPeer::ID_SIMULATION, $this->id_simulation);
		if ($this->isColumnModified(RoundPeer::DAY)) $criteria->add(RoundPeer::DAY, $this->day);
		if ($this->isColumnModified(RoundPeer::QUANTITY)) $criteria->add(RoundPeer::QUANTITY, $this->quantity);
		if ($this->isColumnModified(RoundPeer::AVG_HUNGER)) $criteria->add(RoundPeer::AVG_HUNGER, $this->avg_hunger);
		if ($this->isColumnModified(RoundPeer::AVG_HITPOINTS)) $criteria->add(RoundPeer::AVG_HITPOINTS, $this->avg_hitpoints);
		if ($this->isColumnModified(RoundPeer::NUMBER_OF_NEWBORN)) $criteria->add(RoundPeer::NUMBER_OF_NEWBORN, $this->number_of_newborn);

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
		$criteria = new Criteria(RoundPeer::DATABASE_NAME);
		$criteria->add(RoundPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Round (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setId($this->getId());
		$copyObj->setIdOrganism($this->getIdOrganism());
		$copyObj->setIdSimulation($this->getIdSimulation());
		$copyObj->setDay($this->getDay());
		$copyObj->setQuantity($this->getQuantity());
		$copyObj->setAvgHunger($this->getAvgHunger());
		$copyObj->setAvgHitpoints($this->getAvgHitpoints());
		$copyObj->setNumberOfNewborn($this->getNumberOfNewborn());
		if ($makeNew) {
			$copyObj->setNew(true);
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
	 * @return     Round Clone of current object.
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
	 * @return     RoundPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RoundPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Organism object.
	 *
	 * @param      Organism $v
	 * @return     Round The current object (for fluent API support)
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
			$v->addRound($this);
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
				$this->aOrganism->addRounds($this);
			 */
		}
		return $this->aOrganism;
	}

	/**
	 * Declares an association between this object and a Simulation object.
	 *
	 * @param      Simulation $v
	 * @return     Round The current object (for fluent API support)
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
			$v->addRound($this);
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
			$this->aSimulation = SimulationQuery::create()->findPk($this->id_simulation, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSimulation->addRounds($this);
			 */
		}
		return $this->aSimulation;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_organism = null;
		$this->id_simulation = null;
		$this->day = null;
		$this->quantity = null;
		$this->avg_hunger = null;
		$this->avg_hitpoints = null;
		$this->number_of_newborn = null;
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
		} // if ($deep)

		$this->aOrganism = null;
		$this->aSimulation = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RoundPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRound
