<x-layouts.app>
    <x-slot:header>
        {{ __('messages.marketing') }}
    </x-slot:header>

    <div class="space-y-12">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl premium-heading text-slate-900 tracking-[-0.04em]">Manajemen Leads</h2>
                <p class="mt-2 text-slate-500 font-medium">Kelola dan pantau pertumbuhan calon klien Anda.</p>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = true" class="glass-button glass-button-primary gap-x-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Lead
                </button>
                
                <!-- Modal Placeholder (Conceptual) -->
                <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm" x-cloak>
                    <div class="bento-card w-full max-w-2xl bg-white p-10" @click.away="open = false">
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-2xl premium-heading">Form Lead Baru</h3>
                            <button @click="open = false" class="text-slate-400 hover:text-slate-600">&times;</button>
                        </div>
                        <livewire:marketing.create-lead />
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <h3 class="text-lg font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">Daftar Objek Leads</h3>
            <livewire:marketing.lead-list />
        </div>
    </div>
</x-layouts.app>
