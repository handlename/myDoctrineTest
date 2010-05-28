<?php

/**
 * テストを補助するクラス。
 * http://webtech-walker.com/archive/2010/04/14094735.html
 * のものをDoctrineを使うように書き改めたもの。
 *
 * @author  NAGATA Hiroaki
 * @date    2010/05/20
 */
class MyDoctrineTest
{
    protected $connection;
    protected $configuration;
    protected $test;

    /**
     * コンストラクタ
     *
     * @param  string  $app  アプリケーションの種類 (ex. front, dev,... )
     */
    public function __construct($app)
    {
        $this->configuration =
            ProjectConfiguration::getApplicationConfiguration($app, 'test', true);
        new sfDatabaseManager($this->configuration);

        $this->connection = Doctrine_Manager::connection();
        $this->connection->beginTransaction();
    }

    public function __destruct()
    {
        $this->rollback();
    }

    public function loadData($file = null)
    {
        $fixture = sfConfig::get('sf_test_dir').'/fixtures';
        if($file !== null) {
            $fixture .= "/$file";
        }

        Doctrine::loadData($fixture);
    }

    public function getConnection() {
        return $this->connection;
    }

    public function getConfiguration() {
        return $this->configuration;
    }

    public function getTest() {
        return $this->test;
    }

    public function setTest($test) {
        $this->test = $test;
    }

    public function rollback() {
        if($this->connection !== null) {
            $this->connection->rollBack();
            unset($this->connection);
        }
    }
}