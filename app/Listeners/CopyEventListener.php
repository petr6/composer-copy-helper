<?php

namespace App\Listeners;

use App\Events\CopyEvent;
use Native\Laravel\Facades\Notification;

class CopyEventListener
{
    public function __construct() {}

    public function handle(CopyEvent $event): void
    {
        $folders = [
            ['C:\wamp64\www\eshop-v2.1.x\src','C:\wamp64\www\abel\vendor\liquiddesign\eshop\src',],
            ['C:\wamp64\www\eshop-v2.1.x\src','C:\wamp64\www\rajtiskaren\vendor\liquiddesign\eshop\src',],
            ['C:\wamp64\www\abel-base-v1.x\src','C:\wamp64\www\abel\vendor\liquiddesign\abel-base\src',],
            ['C:\wamp64\www\abel-base-v1.x\src','C:\wamp64\www\rajtiskaren\vendor\liquiddesign\abel-base\src',],
        ];

        foreach ($folders as $subFolders) {
            if (! \is_dir($subFolders[0]) || ! \is_dir($subFolders[1])) {
                continue;
            }

            \exec("Robocopy.exe $subFolders[0] $subFolders[1] /mir");
        }

        Notification::title('Composer Copy Helper')
            ->message('Copied!')
            ->show();
    }
}
