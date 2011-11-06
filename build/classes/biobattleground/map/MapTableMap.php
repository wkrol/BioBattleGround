<?php


/**
 * This class defines the structure of the 'map' table.
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
class MapTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'biobattleground.map.MapTableMap';

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
		$this->setName('map');
		$this->setPhpName('Map');
		$this->setClassname('Map');
		$this->setPackage('biobattleground');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 45, null);
		$this->addColumn('MAP_STRING', 'MapString', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserPrivileges', 'UserPrivileges', RelationMap::ONE_TO_MANY, array('id' => 'id_map', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Simulation', 'Simulation', RelationMap::ONE_TO_MANY, array('id' => 'id_map', ), null, null);
	} // buildRelations()

} // MapTableMap
