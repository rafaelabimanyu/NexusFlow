<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\SessionStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable(['title', 'mentor_id', 'member_id', 'scheduled_at', 'duration', 'status', 'meeting_link', 'summary'])]
class MentoringSession extends Model
{
    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'status' => SessionStatus::class,
        ];
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function tasks(): MorphMany
    {
        return $this->morphMany(Task::class, 'linkable');
    }
}
