<?php

/*
 * (c) sides <sides@sides.tv>
 */

namespace Sides\Autovid\TextFormatter\Plugins\Autovideo;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $attrName = 'src';
    protected $quickMatch = '://';
    protected $regexp = '#https?://[-.\\w]+/[-./%\\w]+\\.(?:mp4|webm|ogv)(?!\\S)#';
    protected $tagName = 'AUTOVIDEO';

    protected function setUp()
    {
        if (isset($this->configurator->tags[$this->tagName])) {
            return;
        }
        $tag = $this->configurator->tags->add($this->tagName);
        $filter = $this->configurator->attributeFilters->get('#url');
        $tag->attributes->add($this->attrName)->filterChain->append($filter);
        $tag->template = '<video style="max-width:100%" src="{@' . $this->attrName . '}" controls loop>{@' . $this->attrName . '}</video>';
    }

    public function getJSParser()
    {
        return \file_get_contents(realpath(__DIR__.'/Parser.js'));
    }
}
