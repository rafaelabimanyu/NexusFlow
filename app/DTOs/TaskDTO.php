<?php

namespace App\DTOs;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;

/**
 * Data Transfer Object untuk pengelolaan Tugas (Task).
 */
readonly class TaskDTO
{
    public function __construct(
        public string $title,
        public ?string $description,
        public int $assigned_to,
        public string $due_date,
        public TaskPriority $priority = TaskPriority::MEDIUM,
        public TaskStatus $status = TaskStatus::PENDING,
        public ?int $linkable_id = null,
        public ?string $linkable_type = null
    ) {}
}
