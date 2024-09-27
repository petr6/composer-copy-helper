<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public ?string $message = null;

    #[On('notify')]
    public function notify(?string $message): void
    {
        $this->message = Carbon::now()->format('Y-m-d H:i:s').' - '.$message;
    }

    public function render(): View
    {
        return view('livewire.dashboard', ['message' => $this->message]);
    }
}
