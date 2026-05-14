<x-layouts.app>
    <x-slot:header>
        {{ __('messages.marketing') }}
    </x-slot:header>

    <div class="space-y-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-slate-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Manajemen Leads
                </h2>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <livewire:marketing.create-lead />
            </div>
            <div class="space-y-6">
                <div class="bg-indigo-50 rounded-2xl p-6 border border-indigo-100">
                    <h4 class="text-indigo-900 font-semibold mb-2">💡 Tips</h4>
                    <p class="text-sm text-indigo-700">Setiap lead baru otomatis membuat tugas follow-up.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
