<?php

//Forçando o carregamento do bootstrap, quando executado da raiz
require_once realpath(dirname(__FILE__) . '/../../bootstrap.php');
class IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testIndexAction()
    {
        $params = array('action' => 'index', 'controller' => 'Index', 'module' => 'default');
        $url = $this->url($this->urlizeOptions($params));
        $this->dispatch($url);

        // assertions
        $this->assertModule($params['module']);
        $this->assertController($params['controller']);
        $this->assertAction($params['action']);
        $this->assertQueryContentContains("div#welcome h3", "This is your project's main page");
    }


    public function testCanDoUnitTest()
    {
        $this->assertTrue(true);
    }

}




