<x-layouts.app>
    <x-slot:header>
        {{ __('messages.dashboard') }}
    </x-slot:header>

    <div class="space-y-12">
        <!-- Stats Section -->
        <livewire:dashboard.stats />

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Welcome Banner -->
            <div class="lg:col-span-2 relative overflow-hidden rounded-[32px] bg-indigo-600 px-8 py-16 shadow-[0_20px_50px_rgba(79,70,229,0.2)] sm:px-12">
                <div class="relative z-10 max-w-xl">
                    <h2 class="text-4xl premium-heading text-white sm:text-5xl">@lang('messages.welcome'), Admin!</h2>
                    <p class="mt-6 text-xl leading-8 text-indigo-100/90 font-medium">
                        Optimalkan performa tim Anda dengan wawasan data real-time dan manajemen tugas terpadu.
                    </p>
                    <div class="mt-10 flex gap-x-6">
                        <a href="/marketing" class="rounded-2xl bg-white px-8 py-4 text-sm font-bold text-indigo-600 shadow-xl hover:bg-indigo-50 transition-all duration-300 hover:scale-105 active:scale-95">Eksplorasi Leads</a>
                    </div>
                </div>
                <!-- Decorative SVG circles -->
                <div class="absolute -right-20 -top-20 size-96 rounded-full bg-indigo-500 opacity-20"></div>
                <div class="absolute -right-10 -bottom-10 size-64 rounded-full bg-white opacity-10"></div>
            </div>

            <!-- Recent Activity Bento -->
            <div class="bento-card p-8">
                <h3 class="text-xl premium-heading text-slate-900 mb-6">Aktivitas Terakhir</h3>
                <div class="flow-root">
                    <ul role="list" class="-mb-8">
                        @foreach([
                            ['title' => 'Lead Baru: TechCorp', 'time' => '2m ago', 'icon' => 'user-plus', 'color' => 'indigo'],
                            ['title' => 'Sesi Mentoring Selesai', 'time' => '1h ago', 'icon' => 'check-circle', 'color' => 'emerald'],
                            ['title' => 'Tugas Baru Ditugaskan', 'time' => '3h ago', 'icon' => 'clipboard', 'color' => 'amber'],
                        ] as $activity)
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-slate-100" aria-hidden="true"></span>
                                <div class="relative flex items-start space-x-3">
                                    <div class="relative">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-{{ $activity['color'] }}-50 ring-8 ring-white">
                                            <div class="h-5 w-5 text-{{ $activity['color'] }}-600">
                                                <!-- Simple Dot for activity -->
                                                <div class="size-2.5 rounded-full bg-current"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1 py-1.5">
                                        <p class="text-sm font-bold text-slate-900">{{ $activity['title'] }}</p>
                                        <p class="text-xs font-medium text-slate-400 mt-0.5">{{ $activity['time'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
