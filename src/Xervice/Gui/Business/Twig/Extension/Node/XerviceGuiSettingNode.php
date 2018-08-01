<?php


namespace Xervice\Gui\Business\Twig\Extension\Node;


use Twig_Compiler;
use Twig_Node_Expression;

class XerviceGuiSettingNode extends \Twig_Node
{
    /**
     * XerviceGuiSettingNode constructor.
     *
     * @param $name
     * @param \Twig_Node_Expression $value
     * @param $line
     * @param null $tag
     */
    public function __construct($name, Twig_Node_Expression $value, $line, $tag = null)
    {
        parent::__construct(array('value' => $value), array('name' => $name), $line, $tag);
    }

    /**
     * @param \Twig_Compiler $compiler
     *
     * @return \Twig_Compiler
     */
    public function compile(Twig_Compiler $compiler): Twig_Compiler
    {
        $setting = "'" . $this->getAttribute('name') . "'";

        return $compiler
            ->addDebugInfo($this)
            ->raw('if (!array_key_exists(' . $setting . ', $context)) {')
            ->raw('$context[' . $setting . '] = [];')
            ->raw('}')
            ->raw('$context[' . $setting . '] = array_replace_recursive(')
            ->subcompile($this->getNode('value'))
            ->raw(', $context[' . $setting . ']);');
    }

}