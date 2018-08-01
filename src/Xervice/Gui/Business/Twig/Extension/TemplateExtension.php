<?php
declare(strict_types=1);


namespace Xervice\Gui\Business\Twig\Extension;


class TemplateExtension extends \Twig_Extension
{
    protected const FUNCTION_NAME = 'template';

    protected const MODULE = 'Gui';

    /**
     * @return array|\Twig_Function[]
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction(
                self::FUNCTION_NAME,
                function (string $templateName, string $templateModule = self::MODULE) {
                    return $this->twigTemplate($templateName, $templateModule);
                },
                [
                    $this,
                    self::FUNCTION_NAME
                ]
            )
        ];
    }

    /**
     * @param $templateName
     * @param $templateModule
     *
     * @return string
     */
    private function twigTemplate(string $templateName, string $templateModule): string
    {
        return '@' . $templateModule . '/templates/' . $templateName . '/' . $templateName . '.twig';
    }

}