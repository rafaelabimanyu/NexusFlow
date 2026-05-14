<?php

namespace App\Livewire\Mentoring;

use Livewire\Component;
use App\Services\MentoringService;
use App\DTOs\MentoringSessionDTO;
use App\Exceptions\MentoringOverlapException;
use Livewire\Attributes\Validate;

class ScheduleSession extends Component
{
    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required')]
    public $mentor_id = 1; // Dummy

    #[Validate('required')]
    public $member_id = 2; // Dummy

    #[Validate('required')]
    public $scheduled_at = '';

    #[Validate('required|integer|min:15')]
    public $duration = 60;

    public $meeting_link = '';

    /**
     * Jadwalkan sesi dan tangani pengecualian overlap.
     */
    public function save(MentoringService $mentoringService)
    {
        $this->validate();

        try {
            $dto = new MentoringSessionDTO(
                title: $this->title,
                mentor_id: $this->mentor_id,
                member_id: $this->member_id,
                scheduled_at: $this->scheduled_at,
                duration: $this->duration,
                meeting_link: $this->meeting_link
            );

            $mentoringService->scheduleSession($dto);

            session()->flash('success', 'Sesi mentoring berhasil dijadwalkan!');
            
            $this->reset(['title', 'scheduled_at', 'duration', 'meeting_link']);
        } catch (MentoringOverlapException $e) {
            // Tangani error bentrok jadwal secara elegan di UI
            session()->flash('error', $e->getMessage());
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menjadwalkan sesi: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.mentoring.schedule-session');
    }
}
