<?php

namespace App\Livewire\Marketing;

use Livewire\Component;
use App\Models\MarketingLead;
use Livewire\WithPagination;

class LeadList extends Component
{
    use WithPagination;

    protected $listeners = ['leadAdded' => '$refresh'];

    public function render()
    {
        return view('livewire.marketing.lead-list', [
            'leads' => MarketingLead::with('marketer')->latest()->paginate(10)
        ]);
    }
}
