<?php

/*
 * (c) sides <sides@sides.tv>
 */

use Sides\Autovid\Listener;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listener\FormatAutovid::class);
};
