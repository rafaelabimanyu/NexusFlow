<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\LeadStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable(['name', 'email', 'phone', 'source', 'status', 'marketer_id', 'notes'])]
class MarketingLead extends Model
{
    protected function casts(): array
    {
        return [
            'status' => LeadStatus::class,
        ];
    }

    public function marketer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'marketer_id');
    }

    public function tasks(): MorphMany
    {
        return $this->morphMany(Task::class, 'linkable');
    }
}
