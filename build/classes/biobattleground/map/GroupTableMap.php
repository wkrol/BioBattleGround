<?php


/**
 * This class defines the structure of the 'group' table.
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
class GroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.GroupTableMap';

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
		$this->setName('group');
		$this->setPhpName('Group');
		$this->setClassname('Group');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_USER_PRIVILEGES', 'IdUserPrivileges', 'INTEGER', 'user_privileges', 'ID_USER', false, null, null);
		$this->addForeignKey('ID_ORGANISM', 'IdOrganism', 'INTEGER', 'organism', 'ID', false, null, null);
		$this->addForeignKey('ID_SIMULATION', 'IdSimulation', 'INTEGER', 'simulation', 'ID', false, null, null);
		$this->addColumn('SURVIVE', 'Survive', 'TINYINT', false, null, null);
		$this->addColumn('AVERAGE_LIFE_LENGTH', 'AverageLifeLength', 'INTEGER', false, null, null);
		$this->addColumn('QUANTITY', 'Quantity', 'INTEGER', false, null, null);
		$this->addColumn('DEATHS', 'Deaths', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Organism', 'Organism', RelationMap::MANY_TO_ONE, array('id_organism' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Simulation', 'Simulation', RelationMap::MANY_TO_ONE, array('id_simulation' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('UserPrivileges', 'UserPrivileges', RelationMap::MANY_TO_ONE, array('id_user_privileges' => 'id_user', ), null, null);
	} // buildRelations()

} // GroupTableMap
