<?php
declare(strict_types=1);


namespace Xervice\Atomic\Business\Twig\Extension;


class OrganismExtension extends \Twig_Extension
{
    protected const FUNCTION_NAME = 'organism';

    protected const MODULE = 'Atomic';

    /**
     * @return array|\Twig_Function[]
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction(
                self::FUNCTION_NAME,
                function (string $organismName, string $organismModule = self::MODULE) {
                    return $this->twigOrganism($organismName, $organismModule);
                },
                [
                    $this,
                    self::FUNCTION_NAME
                ]
            )
        ];
    }

    /**
     * @param $organismName
     * @param $organismModule
     *
     * @return string
     */
    private function twigOrganism(string $organismName, string $organismModule): string
    {
        return '@' . $organismModule . '/atomic/organisms/' . $organismName . '/' . $organismName . '.twig';
    }

}