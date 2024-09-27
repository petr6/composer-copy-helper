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
            'C:\wamp64\www\eshop-v2.1.x' => 'C:\wamp64\www\flumasys\vendor\liquiddesign\eshop',
        ];

        foreach ($folders as $sourceSubFolder => $targetSubFolder) {
            if (! \is_dir($targetSubFolder) || ! \is_dir($sourceSubFolder)) {
                continue;
            }

            \exec("Robocopy.exe $sourceSubFolder $targetSubFolder /mir");
        }

        Notification::title('Composer Copy Helper')
            ->message('Copied!')
            ->show();
    }
}
