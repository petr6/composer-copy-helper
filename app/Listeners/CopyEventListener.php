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
            ['C:\wamp64\www\eshop-v2.1.x\src','C:\wamp64\www\abel-base-v1.x\vendor\liquiddesign\eshop\src',],
            ['C:\wamp64\www\eshop-v2.1.x\src','C:\wamp64\www\lindemh\vendor\liquiddesign\eshop\src',],
            ['C:\wamp64\www\eshop-v2.1.x\src','C:\wamp64\www\finnsub\vendor\liquiddesign\eshop\src',],
            ['C:\wamp64\www\eshop-v2.1.x\src','C:\wamp64\www\flumasys\vendor\liquiddesign\eshop\src',],
            ['C:\wamp64\www\admin\src','C:\wamp64\www\abel\vendor\liquiddesign\admin\src',],
            ['C:\wamp64\www\admin\src','C:\wamp64\www\abel-base-v1.x\vendor\liquiddesign\admin\src',],
            ['C:\wamp64\www\base\src','C:\wamp64\www\abel-base-v1.x\vendor\liquiddesign\base\src',],
            ['C:\wamp64\www\abel-base-v1.x\src','C:\wamp64\www\abel\vendor\liquiddesign\abel-base\src',],
            ['C:\wamp64\www\abel-base-v1.x\src','C:\wamp64\www\rajtiskaren\vendor\liquiddesign\abel-base\src',],
            ['C:\wamp64\www\liquid-monitor-connector\src','C:\wamp64\www\abel\vendor\liquiddesign\liquid-monitor-connector\src',],
            ['C:\wamp64\www\liquid-monitor-connector\src','C:\wamp64\www\eshop-v2.1.x\vendor\liquiddesign\liquid-monitor-connector\src',],
            ['C:\wamp64\www\liquid-monitor-connector\src','C:\wamp64\www\abel-base-v1.x\vendor\liquiddesign\liquid-monitor-connector\src',],
            ['C:\wamp64\www\migrator\src','C:\wamp64\www\abel\vendor\liquiddesign\migrator\src',],
            ['C:\wamp64\www\storm\src','C:\wamp64\www\abel\vendor\liquiddesign\storm\src',],
            ['C:\wamp64\www\storm\src','C:\wamp64\www\rajtiskaren\vendor\liquiddesign\storm\src',],
            ['C:\wamp64\www\storm\src','C:\wamp64\www\flumasys\vendor\liquiddesign\storm\src',],
        ];

        foreach ($folders as $subFolders) {
            if (! \is_dir($subFolders[0]) || ! \is_dir($subFolders[1])) {
                continue;
            }

            \exec("Robocopy.exe $subFolders[0] $subFolders[1] /mir");
//            \exec("rsync -avz --delete {$subFolders[0]} {$subFolders[1]}");
        }

        Notification::title('Composer Copy Helper')
            ->message('Copied!')
            ->show();
    }
}
