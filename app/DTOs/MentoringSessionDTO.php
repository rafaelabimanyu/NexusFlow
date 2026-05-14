<?php

namespace App\DTOs;

/**
 * Data Transfer Object untuk penjadwalan Sesi Mentoring.
 */
readonly class MentoringSessionDTO
{
    public function __construct(
        public string $title,
        public int $mentor_id,
        public int $member_id,
        public string $scheduled_at,
        public int $duration = 60,
        public ?string $meeting_link = null
    ) {}
}
