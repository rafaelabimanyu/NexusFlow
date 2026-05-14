<?php

namespace App\Services;

use App\Models\MarketingLead;
use App\DTOs\MarketingLeadDTO;
use App\DTOs\TaskDTO;
use Illuminate\Support\Facades\DB;
use Exception;

class MarketingService
{
    /**
     * Dependency injection melalui constructor untuk TaskService.
     */
    public function __construct(
        protected TaskService $taskService
    ) {}

    /**
     * Membuat Lead baru sekaligus tugas (Task) awal untuk Marketer.
     * Menggunakan DB Transaction untuk memastikan integritas data.
     * 
     * @param MarketingLeadDTO $data
     * @return MarketingLead
     * @throws Exception
     */
    public function createLeadWithTask(MarketingLeadDTO $data): MarketingLead
    {
        return DB::transaction(function () use ($data) {
            // 1. Simpan data Lead Marketing
            $lead = MarketingLead::create([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'source' => $data->source,
                'marketer_id' => $data->marketer_id,
                'notes' => $data->notes,
            ]);

            // 2. Buat tugas follow-up awal menggunakan TaskService
            $this->taskService->createTask(new TaskDTO(
                title: 'Follow up lead: ' . $lead->name,
                description: 'Segera hubungi lead baru ini melalui email atau telepon.',
                assigned_to: $lead->marketer_id,
                due_date: now()->addDays(1)->toDateString(),
                linkable_id: $lead->id,
                linkable_type: MarketingLead::class
            ));

            return $lead;
        });
    }
}
