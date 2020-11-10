<?php

namespace Sortarad\Facepalm;

use Statamic\Providers\AddonServiceProvider;
use Sortarad\Facepalm\Widgets\Facepalm;

class ServiceProvider extends AddonServiceProvider
{
    protected $viewNamespace = 'sortarad';

    protected $widgets = [
        Facepalm::class
    ];
}
