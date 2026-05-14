<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\MarketingLead;
use App\Models\MentoringSession;
use App\Models\Task;

use App\Enums\UserRole;

class Stats extends Component
{
    public function render()
    {
        $user = auth()->user();
        
        // Default values for guests (optional, usually protected by middleware)
        if (!$user) {
            return view('livewire.dashboard.stats', [
                'totalLeads' => 0,
                'activeSessions' => 0,
                'pendingTasks' => 0,
            ]);
        }

        // Logic RBAC: Admin melihat semua, Role lain melihat data masing-masing
        $leadsQuery = MarketingLead::query();
        $sessionsQuery = MentoringSession::where('status', 'scheduled');
        $tasksQuery = Task::where('status', 'pending');

        if ($user->role !== UserRole::ADMIN) {
            $leadsQuery->where('marketer_id', $user->id);
            
            $sessionsQuery->where(function($q) use ($user) {
                $q->where('mentor_id', $user->id)
                  ->orWhere('member_id', $user->id);
            });

            $tasksQuery->where('assigned_to', $user->id);
        }

        return view('livewire.dashboard.stats', [
            'totalLeads' => $leadsQuery->count(),
            'activeSessions' => $sessionsQuery->count(),
            'pendingTasks' => $tasksQuery->count(),
        ]);
    }
}
