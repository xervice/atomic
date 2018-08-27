<?php

namespace XerviceTest\Atomic;

use Xervice\Core\Business\Model\Locator\Locator;
use Xervice\Twig\Business\TwigFacade;

require_once __DIR__ . '/Injector/TwigDependencyProvider.php';

class IntegrationTest extends \Codeception\Test\Unit
{
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
     * @return \Xervice\Twig\Business\TwigFacade
     */
    private function getTwigFacade(): TwigFacade
    {
        return Locator::getInstance()->twig()->facade();
    }
}