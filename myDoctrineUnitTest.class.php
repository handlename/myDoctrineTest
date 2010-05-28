<?php

require_once 'unit.php';
require_once 'MyDoctrineTest.class.php';

/**
 * 単体テストを補助するクラス。
 *
 * @author  NAGATA Hiroaki
 * @date    2010/05/25
 */
class MyDoctrineUnitTest extends MyDoctrineTest
{
    /**
     * コンストラクタ
     *
     * @param  string  $app      アプリケーションの種類 (ex. front, dev,... )
     * @param  string  $test_num テストの数
     */
    public function __construct($app, $test_num = null)
    {
        parent::__construct($app);
        
        if($test_num === null) {
            $this->test = new lime_test();
        }
        else {
            $this->test = new lime_test($test_num);
        }
    }
}