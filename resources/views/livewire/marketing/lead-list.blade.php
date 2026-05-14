<div class="space-y-4">
    @forelse($leads as $lead)
        <div class="group relative flex items-center gap-x-6 p-6 bento-card border-slate-100/50 bg-white/40 hover:bg-white/80 transition-all duration-500">
            <!-- Avatar / Icon -->
            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-slate-50 text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-colors duration-500">
                <span class="text-xl font-bold uppercase">{{ substr($lead->name, 0, 1) }}</span>
            </div>

            <!-- Content Area -->
            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-x-3">
                    <h3 class="text-lg premium-heading text-slate-900 truncate">{{ $lead->name }}</h3>
                    <span class="pastel-badge @if($lead->status->value === 'new') bg-indigo-50 text-indigo-700 @elseif($lead->status->value === 'contacted') bg-emerald-50 text-emerald-700 @else bg-slate-50 text-slate-700 @endif">
                        {{ $lead->status->label() }}
                    </span>
                </div>
                <div class="mt-1 flex items-center gap-x-4 text-sm font-medium text-slate-400">
                    <span class="flex items-center gap-x-1.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        {{ $lead->email ?? 'N/A' }}
                    </span>
                    <span class="flex items-center gap-x-1.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-.778.099-1.533.284-2.253" />
                        </svg>
                        {{ $lead->source }}
                    </span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <button class="glass-button p-2.5 rounded-xl hover:text-indigo-600 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>
            </div>
        </div>
    @empty
        <!-- Empty State -->
        <div class="flex flex-col items-center justify-center p-20 bento-card bg-slate-50/50 border-dashed border-2 border-slate-200">
            <div class="h-24 w-24 text-slate-200">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
            <h3 class="mt-4 text-xl premium-heading text-slate-900">Belum ada leads</h3>
            <p class="mt-1 text-sm text-slate-500 font-medium">Mulai tambahkan calon klien baru untuk mengembangkan bisnis Anda.</p>
        </div>
    @endforelse

    <div class="mt-8">
        {{ $leads->links() }}
    </div>
</div>