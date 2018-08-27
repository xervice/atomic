<?php
declare(strict_types=1);


namespace Xervice\Atomic\Communication\Twig\Extension;


class MoleculeExtension extends \Twig_Extension
{
    protected const FUNCTION_NAME = 'molecule';

    protected const MODULE = 'Atomic';

    /**
     * @return array|\Twig_Function[]
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction(
                self::FUNCTION_NAME,
                function (string $moleculeName, string $moleculeModule = self::MODULE) {
                    return $this->twigMolecule($moleculeName, $moleculeModule);
                },
                [
                    $this,
                    self::FUNCTION_NAME
                ]
            )
        ];
    }

    /**
     * @param $moleculeName
     * @param $moleculeModule
     *
     * @return string
     */
    private function twigMolecule(string $moleculeName, string $moleculeModule): string
    {
        return '@' . $moleculeModule . '/atomic/molecules/' . $moleculeName . '/' . $moleculeName . '.twig';
    }

}