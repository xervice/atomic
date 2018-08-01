<?php
declare(strict_types=1);


namespace Xervice\Gui\Business\Twig\Extension;


class AtomExtension extends \Twig_Extension
{
    protected const FUNCTION_NAME = 'atom';

    protected const ATOM_MODULE = 'Gui';

    /**
     * @return array|\Twig_Function[]
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction(
                self::FUNCTION_NAME,
                function (string $atomName, string $atomModule = self::ATOM_MODULE) {
                    return $this->twigAtom($atomName, $atomModule);
                },
                [
                    $this,
                    self::FUNCTION_NAME
                ]
            )
        ];
    }

    /**
     * @param $atomName
     * @param $atomModule
     *
     * @return string
     */
    private function twigAtom(string $atomName, string $atomModule): string
    {
        return '@' . $atomModule . '/atomic/atoms/' . $atomName . '/' . $atomName . '.twig';
    }

}