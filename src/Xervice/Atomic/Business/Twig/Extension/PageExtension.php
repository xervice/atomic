<?php
declare(strict_types=1);


namespace Xervice\Atomic\Business\Twig\Extension;


class PageExtension extends \Twig_Extension
{
    protected const FUNCTION_NAME = 'page';

    protected const MODULE = 'Atomic';

    /**
     * @return array|\Twig_Function[]
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction(
                self::FUNCTION_NAME,
                function (string $pageName, string $pageModule = self::MODULE) {
                    return $this->twigPage($pageName, $pageModule);
                },
                [
                    $this,
                    self::FUNCTION_NAME
                ]
            )
        ];
    }

    /**
     * @param $pageName
     * @param $pageModule
     *
     * @return string
     */
    private function twigPage(string $pageName, string $pageModule): string
    {
        return '@' . $pageModule . '/pages/' . $pageName . '/' . $pageName . '.twig';
    }

}