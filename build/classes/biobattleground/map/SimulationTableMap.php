<<<<<<< HEAD
<?php


/**
 * This class defines the structure of the 'simulation' table.
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
class SimulationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.SimulationTableMap';

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
		$this->setName('simulation');
		$this->setPhpName('Simulation');
		$this->setClassname('Simulation');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_CLIMATE', 'IdClimate', 'INTEGER', 'climate', 'ID', false, null, null);
		$this->addForeignKey('ID_MAP', 'IdMap', 'INTEGER', 'map', 'ID', false, null, null);
		$this->addColumn('SIMULATION_LENGTH', 'SimulationLength', 'INTEGER', false, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Map', 'Map', RelationMap::MANY_TO_ONE, array('id_map' => 'id', ), null, null);
    $this->addRelation('Climate', 'Climate', RelationMap::MANY_TO_ONE, array('id_climate' => 'id', ), null, null);
    $this->addRelation('Group', 'Group', RelationMap::ONE_TO_MANY, array('id' => 'id_simulation', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Round', 'Round', RelationMap::ONE_TO_MANY, array('id' => 'id_simulation', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // SimulationTableMap
=======
<?php


/**
 * This class defines the structure of the 'simulation' table.
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
class SimulationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.SimulationTableMap';

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
		$this->setName('simulation');
		$this->setPhpName('Simulation');
		$this->setClassname('Simulation');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_CLIMATE', 'IdClimate', 'INTEGER', 'climate', 'ID', false, null, null);
		$this->addForeignKey('ID_MAP', 'IdMap', 'INTEGER', 'map', 'ID', false, null, null);
		$this->addColumn('SIMULATION_LENGTH', 'SimulationLength', 'INTEGER', false, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Map', 'Map', RelationMap::MANY_TO_ONE, array('id_map' => 'id', ), null, null);
    $this->addRelation('Climate', 'Climate', RelationMap::MANY_TO_ONE, array('id_climate' => 'id', ), null, null);
    $this->addRelation('Group', 'Group', RelationMap::ONE_TO_MANY, array('id' => 'id_simulation', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Round', 'Round', RelationMap::ONE_TO_MANY, array('id' => 'id_simulation', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // SimulationTableMap
>>>>>>> branch 'master' of git@github.com:Szorstki/BioBattleGround.git
