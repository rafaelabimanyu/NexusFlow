<x-layouts.app>
    <x-slot:header>
        {{ __('messages.dashboard') }}
    </x-slot:header>

    <div class="space-y-8">
        <!-- Stats Section -->
        <livewire:dashboard.stats />

        <!-- Welcome Banner -->
        <div class="relative overflow-hidden rounded-3xl bg-indigo-600 px-8 py-12 shadow-xl sm:px-12">
            <div class="relative z-10 max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">@lang('messages.welcome'), Admin!</h2>
                <p class="mt-4 text-lg leading-8 text-indigo-100">
                    Kelola Leads Pemasaran dan Sesi Mentoring Anda dalam satu platform terintegrasi. Semua data tersinkronisasi secara real-time.
                </p>
                <div class="mt-8 flex gap-x-4">
                    <a href="/marketing" class="rounded-xl bg-white px-6 py-3 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition-all">Mulai Kelola Leads</a>
                </div>
            </div>
            <!-- Decorative SVG circles -->
            <div class="absolute -right-20 -top-20 size-96 rounded-full bg-indigo-500 opacity-20"></div>
            <div class="absolute -right-10 -bottom-10 size-64 rounded-full bg-indigo-400 opacity-20"></div>
        </div>
    </div>
</x-layouts.app>
