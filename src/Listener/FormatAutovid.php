<?php

/*
 * (c) sides <sides@sides.tv>
 */

namespace Sides\Autovid\Listener;

use Flarum\Event\ConfigureFormatter;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

class FormatAutovid
{
    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * @param SettingsRepositoryInterface $settings
     */
    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureFormatter::class, [$this, 'addAutovidFormatter']);
    }

    /**
     * @param ConfigureFormatter $event
     */
    public function addAutovidFormatter(ConfigureFormatter $event)
    {
        $name = "Autovideo";
        $event->configurator->plugins->set(
            $name,
            "Sides\\Autovid\\TextFormatter\\Plugins\\{$name}\\Configurator"
        );
    }
}
