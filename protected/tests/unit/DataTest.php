<?php
class DataTest extends CDbTestCase
{
    public $fixtures = array(
        'data' => 'Data',
    );
    
    public static function setUpBeforeClass()
    {
        if(!extension_loaded('pdo') ||
            !extension_loaded('pdo_sqlite'))
            markTestSkipped('PDO and SQLite extensions are required.');
            
        $config=array(
            'basePath'=>dirname(__FILE__),
            'components'=>array(
                'db'=>array(
                    'class'=>'system.db.CDbConnection',
                    'connectionString'=>'sqlite::memory:',
                ),
                'fixture'=>array(
                    'class'=>'system.test.CDbFixtureManager',
                ),
            ), 
        );
        
        Yii::app()->configure($config);
        
        $c = Yii::app()->getDb()->createCommand();
        $c->createTable('data', array(
                'id' => 'varchar(255) PRIMARY KEY NOT NULL',
                'title' => 'text',
            ));
        }
 
        public static function tearDownAfterClass()
        {
            if(Yii::app()->getDb())
                Yii::app()->getDb()->active=false;
        }
        
        protected function setUp()
        {
            parent::setUp();
            $_GET['existing_code'] = 'discount_for_me';
            $_GET['non_existing_code'] = 'non_existing';
        }
        
        public function testCodeAcceptance()
        {
            $cm = new DataManager();
            $this->assertTrue($cm->registerData($_GET['existing_code']));
            $this->assertFalse((boolean)Data::model()->findByPk
                ($_GET['existing_code']));
        }
        
        public function testCodeNotFound()
        {
            $countBefore = Data::model()->count();
            $cm = new DataManager();
            $this->assertFalse($cm->registerData($_GET['non_existing_code']));
            $countAfter = Data::model()->count();
            $this->assertEquals($countBefore, $countAfter);
        }
}