<?php
declare(strict_types=1);


namespace Xervice\Atomic\Business\Twig\Extension;


use Twig_Token;
use Xervice\Atomic\Business\Twig\Extension\Node\XerviceAtomicSettingNode;

class SettingParser extends \Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $name = $stream->expect(Twig_Token::NAME_TYPE)->getValue();
        $stream->expect(Twig_Token::OPERATOR_TYPE, '=');
        $value = $parser->getExpressionParser()->parseExpression();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new XerviceAtomicSettingNode($name, $value, $token->getLine(), $this->getTag());
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return 'setting';
    }

}