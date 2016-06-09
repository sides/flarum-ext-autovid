<?php

/*
 * (c) sides <sides@sides.tv>
 */

namespace Sides\Autovid\TextFormatter\Plugins\Autovideo;

use s9e\TextFormatter\Plugins\ConfiguratorBase;

class Configurator extends ConfiguratorBase
{
    protected $attrName = 'src';
    protected $regexp = '#https?://[-.\\w]+/[-./\\w]+\\.(?:mp4|webm|ogv)(?!\\S)#';
    protected $tagName = 'AUTOVIDEO';

    protected function setUp()
    {
        if (isset($this->configurator->tags[$this->tagName])) {
            return;
        }
        $tag = $this->configurator->tags->add($this->tagName);
        //$filter = $this->configurator->attributeFilters->get('#url');
        $tag->attributes->add($this->attrName);
        $this->template = '<video src="{@' . $this->attrName . '}" controls>Video playback unsupported</video>';
    }

    public function getJSParser()
    {
        return \file_get_contents(realpath(__DIR__.'/Parser.js'));
    }
}
