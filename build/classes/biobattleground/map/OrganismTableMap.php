<?php


/**
 * This class defines the structure of the 'organism' table.
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
class OrganismTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.OrganismTableMap';

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
		$this->setName('organism');
		$this->setPhpName('Organism');
		$this->setClassname('Organism');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 45, null);
		$this->addColumn('INSTINCT', 'Instinct', 'INTEGER', false, null, null);
		$this->addColumn('TOUGHNESS', 'Toughness', 'INTEGER', false, null, null);
		$this->addColumn('VITALITY', 'Vitality', 'INTEGER', false, null, null);
		$this->addColumn('TYPE', 'Type', 'CHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserPrivileges', 'UserPrivileges', RelationMap::ONE_TO_MANY, array('id' => 'id_organism', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Group', 'Group', RelationMap::ONE_TO_MANY, array('id' => 'id_organism', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Round', 'Round', RelationMap::ONE_TO_MANY, array('id' => 'id_organism', ), null, null);
	} // buildRelations()

} // OrganismTableMap
