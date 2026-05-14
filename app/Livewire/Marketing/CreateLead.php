<?php

namespace App\Livewire\Marketing;

use Livewire\Component;
use App\Services\MarketingService;
use App\DTOs\MarketingLeadDTO;
use Livewire\Attributes\Validate;

class CreateLead extends Component
{
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('nullable|min:10')]
    public $phone = '';

    #[Validate('required')]
    public $source = 'Facebook';

    public $notes = '';

    public $marketer_id = 1; // Dummy for now, should be Auth::id()

    /**
     * Submit form dan panggil MarketingService.
     */
    public function save(MarketingService $marketingService)
    {
        $this->validate();

        try {
            $dto = new MarketingLeadDTO(
                name: $this->name,
                email: $this->email,
                phone: $this->phone,
                source: $this->source,
                marketer_id: $this->marketer_id,
                notes: $this->notes
            );

            $marketingService->createLeadWithTask($dto);

            $this->dispatch('leadAdded');

            session()->flash('success', 'Lead berhasil dibuat dan tugas follow-up telah dijadwalkan!');
            
            $this->reset(['name', 'email', 'phone', 'notes']);
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.marketing.create-lead');
    }
}
