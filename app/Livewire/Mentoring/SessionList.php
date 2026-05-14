<?php

namespace App\Livewire\Mentoring;

use Livewire\Component;
use App\Models\MentoringSession;
use Livewire\WithPagination;

class SessionList extends Component
{
    use WithPagination;

    protected $listeners = ['sessionScheduled' => '$refresh'];

    public function render()
    {
        return view('livewire.mentoring.session-list', [
            'sessions' => MentoringSession::with(['mentor', 'member'])->latest()->paginate(10)
        ]);
    }
}
