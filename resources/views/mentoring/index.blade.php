<x-layouts.app>
    <x-slot:header>
        {{ __('messages.mentoring') }}
    </x-slot:header>

    <div class="space-y-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Sistem Mentoring
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <livewire:mentoring.schedule-session />
            </div>
            <div class="space-y-6">
                <div class="bg-amber-50 rounded-2xl p-6 border border-amber-100">
                    <h4 class="text-amber-900 font-semibold mb-2">⚠️ Aturan Jadwal</h4>
                    <p class="text-sm text-amber-700">Sistem tidak akan mengizinkan jadwal yang bentrok dengan sesi mentor lainnya.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
