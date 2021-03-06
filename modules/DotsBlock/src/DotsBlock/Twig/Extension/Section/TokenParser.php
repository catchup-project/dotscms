<?php
/**
 * This file is part of DotsCMS
 *
 * (c) 2012 DotsCMS <team@dotscms.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DotsBlock\Twig\Extension\Section;
use Twig_TokenParser,
    Twig_Token,
    Twig_Node_Expression_Array,
    Twig_Node_Expression_Constant;

class TokenParser extends Twig_TokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param \Twig_Token $token A Twig_Token instance
     * @return \Twig_NodeInterface A Twig_NodeInterface instance
     */
    function parse(Twig_Token $token)
    {
        $name = $this->parser->getExpressionParser()->parseExpression();

        // target
        if ($this->parser->getStream()->test(Twig_Token::NAME_TYPE, 'on')) {
            $this->parser->getStream()->next();
            $target = $this->parser->getExpressionParser()->parseExpression();
        } else {
            $target = new Twig_Node_Expression_Constant(null, $token->getLine());
        }

        // attributes
        if ($this->parser->getStream()->test(Twig_Token::NAME_TYPE, 'with')) {
            $this->parser->getStream()->next();
            $attributes = $this->parser->getExpressionParser()->parseExpression();
        } else {
            $attributes = new Twig_Node_Expression_Array(array(), $token->getLine());
        }

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
        return new RenderNode($name, $target, $attributes, $token->getLine(), $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    function getTag()
    {
        return 'section';
    }

}