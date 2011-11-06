<?php


/**
 * This class defines the structure of the 'round' table.
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
class RoundTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.RoundTableMap';

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
		$this->setName('round');
		$this->setPhpName('Round');
		$this->setClassname('Round');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_ORGANISM', 'IdOrganism', 'INTEGER', 'organism', 'ID', false, null, null);
		$this->addForeignKey('ID_SIMULATION', 'IdSimulation', 'INTEGER', 'simulation', 'ID', false, null, null);
		$this->addColumn('DAY', 'Day', 'INTEGER', false, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', false, null, null);
		$this->addColumn('AVG_HUNGER', 'AvgHunger', 'INTEGER', false, null, null);
		$this->addColumn('AVG_HITPOINTS', 'AvgHitpoints', 'INTEGER', false, null, null);
		$this->addColumn('NUMBER_OF_NEWBORN', 'NumberOfNewborn', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Organism', 'Organism', RelationMap::MANY_TO_ONE, array('id_organism' => 'id', ), null, null);
    $this->addRelation('Simulation', 'Simulation', RelationMap::MANY_TO_ONE, array('id_simulation' => 'id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // RoundTableMap
