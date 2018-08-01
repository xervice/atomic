<?php

namespace XerviceTest\Atomic;

use Xervice\Core\Locator\Locator;
use Xervice\Twig\TwigFacade;

require_once __DIR__ . '/Injector/TwigDependencyProvider.php';

class IntegrationTest extends \Codeception\Test\Unit
{
    /**
     * @var \XerviceTest\XerviceTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @group Xervice
     * @group Atomic
     * @group Integration
     */
    public function testRenderTemplates()
    {
        $response = $this->getTwigFacade()->render('@Atomic/pages/index.twig');
        $this->assertEquals(
            'Layout    Test    molecule',
            $response
        );
    }

    /**
     * @return \Xervice\Twig\TwigFacade
     */
    private function getTwigFacade(): TwigFacade
    {
        return Locator::getInstance()->twig()->facade();
    }
}