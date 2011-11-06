<?php


/**
 * This class defines the structure of the 'user_privileges' table.
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
class UserPrivilegesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.UserPrivilegesTableMap';

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
		$this->setName('user_privileges');
		$this->setPhpName('UserPrivileges');
		$this->setClassname('UserPrivileges');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_USER', 'IdUser', 'INTEGER', 'user', 'ID', false, null, null);
		$this->addForeignKey('ID_ORGANISM', 'IdOrganism', 'INTEGER', 'organism', 'ID', false, null, null);
		$this->addForeignKey('ID_MAP', 'IdMap', 'INTEGER', 'map', 'ID', false, null, null);
		$this->addForeignKey('ID_CLIMATE', 'IdClimate', 'INTEGER', 'climate', 'ID', false, null, null);
		$this->addColumn('PLAY', 'Play', 'TINYINT', false, null, null);
		$this->addColumn('FIGHT', 'Fight', 'TINYINT', false, null, null);
		$this->addColumn('EDIT', 'Edit', 'TINYINT', false, null, null);
		$this->addColumn('SHOW_STATS', 'ShowStats', 'TINYINT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Organism', 'Organism', RelationMap::MANY_TO_ONE, array('id_organism' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id_user' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Map', 'Map', RelationMap::MANY_TO_ONE, array('id_map' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Climate', 'Climate', RelationMap::MANY_TO_ONE, array('id_climate' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Group', 'Group', RelationMap::ONE_TO_MANY, array('id_user' => 'id_user_privileges', ), null, null);
	} // buildRelations()

} // UserPrivilegesTableMap
