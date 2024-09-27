<?php

namespace App\Livewire;

use App\Events\CopyEvent;
use Livewire\Component;

class CopyFiles extends Component
{
    /**
     * @var array<string, string>
     */
    public array $folders = [
        'C:\wamp64\www\eshop-v2.1.x' => 'C:\wamp64\www\flumasys\vendor\liquiddesign\eshop',
    ];

    protected string $copyBtnText = 'Copy';

    public function copy(): void
    {
        CopyEvent::dispatch();

        $this->dispatch('notify', 'Copied!');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.copy-files', ['folders' => $this->folders, 'copyBtnText' => $this->copyBtnText]);
    }
}
