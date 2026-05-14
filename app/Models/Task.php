<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[Fillable(['title', 'description', 'assigned_to', 'due_date', 'priority', 'status', 'linkable_id', 'linkable_type'])]
class Task extends Model
{
    protected function casts(): array
    {
        return [
            'due_date' => 'date',
            'priority' => TaskPriority::class,
            'status' => TaskStatus::class,
        ];
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }
}
