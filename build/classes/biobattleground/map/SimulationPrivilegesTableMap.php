<<<<<<< HEAD
<?php


/**
 * This class defines the structure of the 'simulation_privileges' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.biobattleground.map
 */
class SimulationPrivilegesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.SimulationPrivilegesTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('simulation_privileges');
		$this->setPhpName('SimulationPrivileges');
		$this->setClassname('SimulationPrivileges');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_USER', 'IdUser', 'INTEGER', 'user', 'ID', false, null, null);
		$this->addColumn('CREATE', 'Create', 'TINYINT', false, null, null);
		$this->addColumn('JOIN', 'Join', 'TINYINT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id_user' => 'id', ), null, null);
	} // buildRelations()

} // SimulationPrivilegesTableMap
=======
<?php


/**
 * This class defines the structure of the 'simulation_privileges' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    biobattleground.map
 */
class SimulationPrivilegesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.SimulationPrivilegesTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('simulation_privileges');
		$this->setPhpName('SimulationPrivileges');
		$this->setClassname('SimulationPrivileges');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_USER', 'IdUser', 'INTEGER', 'user', 'ID', false, null, null);
		$this->addColumn('CREATE', 'Create', 'TINYINT', false, null, null);
		$this->addColumn('JOIN', 'Join', 'TINYINT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id_user' => 'id', ), null, null);
	} // buildRelations()

} // SimulationPrivilegesTableMap
>>>>>>> branch 'master' of git@github.com:Szorstki/BioBattleGround.git
