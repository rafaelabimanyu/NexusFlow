<?php

namespace App\Services;

use App\Models\Task;
use App\DTOs\TaskDTO;
use App\Enums\TaskStatus;
use App\Enums\LeadStatus;
use App\Models\MarketingLead;

class TaskService
{
    /**
     * Membuat tugas baru.
     * 
     * @param TaskDTO $data
     * @return Task
     */
    public function createTask(TaskDTO $data): Task
    {
        return Task::create([
            'title' => $data->title,
            'description' => $data->description,
            'assigned_to' => $data->assigned_to,
            'due_date' => $data->due_date,
            'priority' => $data->priority,
            'status' => $data->status,
            'linkable_id' => $data->linkable_id,
            'linkable_type' => $data->linkable_type,
        ]);
    }

    /**
     * Memperbarui status tugas dan memicu logic terkait.
     * 
     * @param Task $task
     * @param TaskStatus $status
     * @return Task
     */
    public function updateStatus(Task $task, TaskStatus $status): Task
    {
        $task->update(['status' => $status]);

        // Logic Engine: Jika tugas Lead selesai, ubah status Lead menjadi 'Contacted'
        if ($status === TaskStatus::COMPLETED && $task->linkable_type === MarketingLead::class) {
            $task->linkable->update(['status' => LeadStatus::CONTACTED]);
        }

        return $task;
    }
}
