<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <!-- Total Leads -->
    <x-stat-card label="Total Leads" :value="$totalLeads" icon="default">
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
        </svg>
    </x-stat-card>

    <!-- Active Mentoring -->
    <x-stat-card label="Active Mentoring" :value="$activeSessions" icon="success">
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </x-stat-card>

    <!-- Pending Tasks -->
    <x-stat-card label="Pending Tasks" :value="$pendingTasks" icon="warning">
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .415.162.798.425 1.081.263.283.629.46 1.026.46.397 0 .763-.177 1.026-.46.263-.283.425-.666.425-1.081 0-.231-.035-.454-.1-.664m-5.801 0A2.251 2.251 0 0 1 13.5 2.25c1.035 0 1.912.7 2.153 1.64m-7.308 0a2.25 2.25 0 0 0-2.022 1.442M4.5 7.031V21a2.25 2.25 0 0 0 2.25 2.25h1.318a2.25 2.25 0 0 0 1.359-.462l1.62-1.215a.75.75 0 0 1 .902 0l1.62 1.215a2.25 2.25 0 0 0 1.359.462h1.318a2.25 2.25 0 0 0 2.25-2.25V7.031a48.11 48.11 0 0 1-13.5 0Zm6.75 1.5V12m0 0V8.531m0 3.469h3.469m-3.469 0H8.031" />
        </svg>
    </x-stat-card>
</div>