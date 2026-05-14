<?php

namespace App\Services;

use App\Models\MentoringSession;
use App\DTOs\MentoringSessionDTO;
use App\Exceptions\MentoringOverlapException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MentoringService
{
    /**
     * Menjadwalkan sesi mentoring baru dengan validasi tumpang tindih waktu.
     * 
     * @param MentoringSessionDTO $data
     * @return MentoringSession
     * @throws MentoringOverlapException
     */
    public function scheduleSession(MentoringSessionDTO $data): MentoringSession
    {
        $start = Carbon::parse($data->scheduled_at);
        $end = $start->copy()->addMinutes($data->duration);

        // Validasi Overlap: Cek apakah mentor sudah memiliki sesi pada rentang waktu tersebut
        $isOverlapping = MentoringSession::where('mentor_id', $data->mentor_id)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('scheduled_at', [$start, $end])
                    ->orWhere(DB::raw('DATE_ADD(scheduled_at, INTERVAL duration MINUTE)'), '>', $start);
            })
            ->exists();

        // Catatan: Query di atas disederhanakan. Dalam produksi, logika overlap harus lebih presisi:
        // (StartA < EndB) AND (EndA > StartB)
        $isOverlappingPrecise = MentoringSession::where('mentor_id', $data->mentor_id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($start, $end) {
                $query->where('scheduled_at', '<', $end)
                    ->whereRaw('DATE_ADD(scheduled_at, INTERVAL duration MINUTE) > ?', [$start->toDateTimeString()]);
            })
            ->exists();

        if ($isOverlappingPrecise) {
            throw new MentoringOverlapException();
        }

        return MentoringSession::create([
            'title' => $data->title,
            'mentor_id' => $data->mentor_id,
            'member_id' => $data->member_id,
            'scheduled_at' => $data->scheduled_at,
            'duration' => $data->duration,
            'meeting_link' => $data->meeting_link,
        ]);
    }
}
