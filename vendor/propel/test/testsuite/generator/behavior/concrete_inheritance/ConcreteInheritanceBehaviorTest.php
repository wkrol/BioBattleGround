<?php

/*
 *	$Id: ConcreteInheritanceBehaviorTest.php 1458 2010-01-13 16:09:51Z francois $
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

require_once 'tools/helpers/bookstore/BookstoreTestBase.php';

/**
 * Tests for ConcreteInheritanceBehavior class
 *
 * @author    François Zaniontto
 * @version   $Revision: 1612 $
 * @package   generator.behavior.concrete_inheritance
 */
class ConcreteInheritanceBehaviorTest extends BookstoreTestBase
{
	public function testParentBehavior()
	{
		$behaviors = ConcreteContentPeer::getTableMap()->getBehaviors();
		$this->assertTrue(array_key_exists('concrete_inheritance_parent', $behaviors), 'modifyTable() gives the parent table the concrete_inheritance_parent behavior');
		$this->assertEquals('descendant_class', $behaviors['concrete_inheritance_parent']['descendant_column'], 'modifyTable() passed the descendent_column parameter to the parent behavior');
	}
	
	public function testModifyTableAddsParentColumn()
	{
		$contentColumns = array('id', 'title', 'category_id');
		$article = ConcreteArticlePeer::getTableMap();
		foreach ($contentColumns as $column) {
			$this->assertTrue($article->containsColumn($column), 'modifyTable() adds the columns of the parent table');
		}
		$quizz = ConcreteQuizzPeer::getTableMap();
		$this->assertEquals(3, count($quizz->getColumns()), 'modifyTable() does not add a column of the parent table if a similar column exists');
	}
	
	public function testModifyTableCopyDataAddsOneToOneRelationships()
	{
		$article = ConcreteArticlePeer::getTableMap();
		$this->assertTrue($article->hasRelation('ConcreteContent'), 'modifyTable() adds a relationship to the parent');
		$relation = $article->getRelation('ConcreteContent');
		$this->assertEquals(RelationMap::MANY_TO_ONE, $relation->getType(), 'modifyTable adds a one-to-one relationship');
		$content = ConcreteContentPeer::getTableMap();
		$relation = $content->getRelation('ConcreteArticle');
		$this->assertEquals(RelationMap::ONE_TO_ONE, $relation->getType(), 'modifyTable adds a one-to-one relationship');
	}

	public function testModifyTableNoCopyDataNoParentRelationship()
	{
		$quizz = ConcreteQuizzPeer::getTableMap();
		$this->assertFalse($quizz->hasRelation('ConcreteContent'), 'modifyTable() does not add a relationship to the parent when copy_data is false');
	}
	
	public function testModifyTableCopyDataRemovesAutoIncrement()
	{
		$content = new ConcreteContent();
		$content->save();
		$c = new Criteria;
		$c->add(ConcreteArticlePeer::ID, $content->getId());
		try {
			ConcreteArticlePeer::doInsert($c);
			$this->assertTrue(true, 'modifyTable() removed autoIncrement from copied Primary keys');
		} catch (PropelException $e) {
			$this->fail('modifyTable() removed autoIncrement from copied Primary keys');
		}
	}

	/**
	 * @expectedException PropelException
	 */
	public function testModifyTableNoCopyDataKeepsAutoIncrement()
	{
		$content = new ConcreteContent();
		$content->save();
		$c = new Criteria;
		$c->add(ConcreteQuizzPeer::ID, $content->getId());
		ConcreteQuizzPeer::doInsert($c);
	}
	
	public function testModifyTableAddsForeignKeys()
	{
		$article = ConcreteArticlePeer::getTableMap();
		$this->assertTrue($article->hasRelation('ConcreteCategory'), 'modifyTable() copies relationships from parent table');
	}

	public function testModifyTableAddsValidators()
	{
		$article = ConcreteArticlePeer::getTableMap();
		$this->assertTrue($article->getColumn('title')->hasValidators(), 'modifyTable() copies validators from parent table');
	}
	
	// no way to test copying of indices and uniques, except by reverse engineering the db...
	
	public function testParentObjectClass()
	{
		$article = new ConcreteArticle(); // to autoload the BaseConcreteArticle class
		$r = new ReflectionClass('BaseConcreteArticle');
		$this->assertEquals('ConcreteContent', $r->getParentClass()->getName(), 'concrete_inheritance changes the parent class of the Model Object to the parent object class');
		$quizz = new ConcreteQuizz(); // to autoload the BaseConcreteQuizz class
		$r = new ReflectionClass('BaseConcreteQuizz');
		$this->assertEquals('ConcreteContent', $r->getParentClass()->getName(), 'concrete_inheritance changes the parent class of the Model Object to the parent object class');
	}
	
	public function testParentQueryClass()
	{
		$q = new ConcreteArticleQuery(); // to autoload the BaseConcreteArticleQuery class
		$r = new ReflectionClass('BaseConcreteArticleQuery');
		$this->assertEquals('ConcreteContentQuery', $r->getParentClass()->getName(), 'concrete_inheritance changes the parent class of the Query Object to the parent object class');
		$q = new ConcreteQuizzQuery(); // to autoload the BaseConcreteQuizzQuery class
		$r = new ReflectionClass('BaseConcreteQuizzQuery');
		$this->assertEquals('ConcreteContentQuery', $r->getParentClass()->getName(), 'concrete_inheritance changes the parent class of the Query Object to the parent object class');
	}
	
	public function testPreSaveCopyData()
	{
		ConcreteArticleQuery::create()->deleteAll();
		ConcreteQuizzQuery::create()->deleteAll();
		ConcreteContentQuery::create()->deleteAll();
		ConcreteCategoryQuery::create()->deleteAll();
		$category = new ConcreteCategory();
		$category->setName('main');
		$article = new ConcreteArticle();
		$article->setConcreteCategory($category);
		$article->save();
		$this->assertNotNull($article->getId());
		$this->assertNotNull($category->getId());
		$content = ConcreteContentQuery::create()->findPk($article->getId());
		$this->assertNotNull($content);
		$this->assertEquals($category->getId(), $content->getCategoryId());
	}

	public function testPreSaveNoCopyData()
	{
		ConcreteArticleQuery::create()->deleteAll();
		ConcreteQuizzQuery::create()->deleteAll();
		ConcreteContentQuery::create()->deleteAll();
		$quizz = new ConcreteQuizz();
		$quizz->save();
		$this->assertNotNull($quizz->getId());
		$content = ConcreteContentQuery::create()->findPk($quizz->getId());
		$this->assertNull($content);
	}
	
	public function testGetParentOrCreateNew()
	{
		$article = new ConcreteArticle();
		$content = $article->getParentOrCreate();
		$this->assertTrue($content instanceof ConcreteContent, 'getParentOrCreate() returns an instance of the parent class');
		$this->assertTrue($content->isNew(), 'getParentOrCreate() returns a new instance of the parent class if the object is new');
		$this->assertEquals('ConcreteArticle', $content->getDescendantClass(), 'getParentOrCreate() correctly sets the descendant_class of the parent object');
	}

	public function testGetParentOrCreateExisting()
	{
		$article = new ConcreteArticle();
		$article->save();
		ConcreteContentPeer::clearInstancePool();
		$content = $article->getParentOrCreate();
		$this->assertTrue($content instanceof ConcreteContent, 'getParentOrCreate() returns an instance of the parent class');
		$this->assertFalse($content->isNew(), 'getParentOrCreate() returns an existing instance of the parent class if the object is persisted');
		$this->assertEquals($article->getId(), $content->getId(), 'getParentOrCreate() returns the parent object related to the current object');
	}
	
	public function testGetSyncParent()
	{
		$category = new ConcreteCategory();
		$category->setName('main');
		$article = new ConcreteArticle();
		$article->setTitle('FooBar');
		$article->setConcreteCategory($category);
		$content = $article->getSyncParent();
		$this->assertEquals('FooBar', $content->getTitle(), 'getSyncParent() returns a synchronized parent object');
		$this->assertEquals($category, $content->getConcreteCategory(), 'getSyncParent() returns a synchronized parent object');
	}
	
	public function testPostDeleteCopyData()
	{
	  ConcreteArticleQuery::create()->deleteAll();
		ConcreteQuizzQuery::create()->deleteAll();
		ConcreteContentQuery::create()->deleteAll();
		ConcreteCategoryQuery::create()->deleteAll();
		$category = new ConcreteCategory();
		$category->setName('main');
		$article = new ConcreteArticle();
		$article->setConcreteCategory($category);
		$article->save();
		$id = $article->getId();
    $article->delete();
    $this->assertNull(ConcreteContentQuery::create()->findPk($id), 'delete() removes the parent record as well');
	}
	
}
