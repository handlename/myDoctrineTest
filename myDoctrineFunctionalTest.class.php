<?php

require_once dirname(__FILE__) .'/functional.php';
require_once dirname(__FILE__) .'/MyDoctrineTest.class.php';

/**
 * 機能テストを補助するクラス。
 *
 * @author  NAGATA Hiroaki
 * @date    2010/05/25
 */
class MyDoctrineFunctionalTest extends MyDoctrineTest
{
    /**
     * コンストラクタ
     *
     * @param  string  $app         アプリケーションの種類 (ex. front, dev,... )
     * @param  string  $test_class  テストに用いるテストクラス (default = sfBrowser)
     */
    public function __construct($app, $test_class = 'sfBrowser')
    {
        parent::__construct($app);

        if($test_class == 'sfBrowser') {
            $this->test = new $test_class();
        }
        else {
            $this->test = new $test_class(new sfBrowser);
        }
    }

    public function getBrowser()
    {
        return $this->getTest();
    }
}