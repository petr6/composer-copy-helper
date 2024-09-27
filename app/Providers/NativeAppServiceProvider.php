<?php

namespace App\Providers;

use App\Events\CopyEvent;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Facades\Window;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        GlobalShortcut::key('CmdOrCtrl+Shift+A')
            ->event(CopyEvent::class)
            ->register();

        Window::open()
            ->width(800)
            ->height(800);
    }

    /**
     * Return an array of php.ini directives to be set.
     *
     * @return array<string, string>
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
