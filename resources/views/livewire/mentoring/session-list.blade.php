<div class="space-y-4">
    @forelse($sessions as $session)
        <div class="group relative flex items-center gap-x-6 p-6 bento-card border-slate-100/50 bg-white/40 hover:bg-white/80 transition-all duration-500">
            <!-- Time Badge -->
            <div class="flex flex-col items-center justify-center w-20 h-20 shrink-0 rounded-3xl bg-indigo-50 border border-indigo-100/50 group-hover:bg-indigo-600 group-hover:border-indigo-600 transition-all duration-500">
                <span class="text-xs font-bold uppercase tracking-widest text-indigo-400 group-hover:text-indigo-100 transition-colors">{{ $session->scheduled_at->format('M') }}</span>
                <span class="text-2xl premium-heading text-indigo-600 group-hover:text-white transition-colors">{{ $session->scheduled_at->format('d') }}</span>
            </div>

            <!-- Content Area -->
            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-x-3">
                    <h3 class="text-lg premium-heading text-slate-900 truncate">{{ $session->title }}</h3>
                    <span class="pastel-badge bg-amber-50 text-amber-700">
                        {{ $session->duration }} Min
                    </span>
                </div>
                <div class="mt-2 flex items-center gap-x-6">
                    <!-- Stacked Avatars -->
                    <div class="flex -space-x-3 overflow-hidden">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name={{ urlencode($session->mentor->name) }}&background=6366f1&color=fff" alt="Mentor">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name={{ urlencode($session->member->name) }}&background=cbd5e1&color=475569" alt="Member">
                    </div>
                    <div class="text-sm font-medium text-slate-400 flex items-center gap-x-2">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ $session->scheduled_at->format('H:i') }} WIB
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-x-4">
                <a href="{{ $session->meeting_link }}" target="_blank" class="glass-button px-4 py-2 gap-x-2 text-xs hover:text-indigo-600">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    Join Meet
                </a>
            </div>
        </div>
    @empty
        <div class="flex flex-col items-center justify-center p-20 bento-card bg-slate-50/50 border-dashed border-2 border-slate-200">
            <h3 class="mt-4 text-xl premium-heading text-slate-900">Belum ada jadwal</h3>
            <p class="mt-1 text-sm text-slate-500 font-medium text-center max-w-xs">Jadwalkan sesi pertama Anda untuk mulai memberikan mentoring berkualitas.</p>
        </div>
    @endforelse

    <div class="mt-8">
        {{ $sessions->links() }}
    </div>
</div>