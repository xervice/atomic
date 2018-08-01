<?php


namespace Xervice\Gui\Business\Twig;


use Xervice\Gui\Business\Twig\Extension\AtomExtension;
use Xervice\Gui\Business\Twig\Extension\MoleculeExtension;
use Xervice\Gui\Business\Twig\Extension\OrganismExtension;
use Xervice\Gui\Business\Twig\Extension\PageExtension;
use Xervice\Gui\Business\Twig\Extension\SettingParser;
use Xervice\Gui\Business\Twig\Extension\TemplateExtension;
use Xervice\Twig\Business\Twig\Extensions\TwigExtensionInterface;

class AtomicTwigExtension implements TwigExtensionInterface
{
    /**
     * @param \Twig_Environment $environment
     *
     * @return \Twig_Environment
     */
    public function register(\Twig_Environment $environment): \Twig_Environment
    {
        $environment->addExtension(
            new AtomExtension()
        );

        $environment->addExtension(
            new MoleculeExtension()
        );

        $environment->addExtension(
            new OrganismExtension()
        );

        $environment->addExtension(
            new TemplateExtension()
        );

        $environment->addExtension(
            new PageExtension()
        );

        $environment->addTokenParser(
            new SettingParser()
        );

        return $environment;
    }
}