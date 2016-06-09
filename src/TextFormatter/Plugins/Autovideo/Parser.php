<?php

/*
 * (c) sides <sides@sides.tv>
 */

namespace Sides\Autovid\TextFormatter\Plugins\Autovideo;

use s9e\TextFormatter\Plugins\ParserBase;

class Parser extends ParserBase
{
    public function parse($text, array $matches)
    {
        $tagName = $this->config['tagName'];
        $attrName = $this->config['attrName'];
        foreach ($matches as $m) {
            $tag = $this->parser->addSelfClosingTag($tagName, $m[0][1], \strlen($m[0][0]));
            $tag->setAttribute($attrName, $m[0][0]);
            $tag->setSortPriority(-1);
        }
    }
}
