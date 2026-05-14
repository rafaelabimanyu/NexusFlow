@props(['label', 'value', 'icon' => 'default', 'trend' => null])

@php
$iconClasses = [
    'default' => 'bg-indigo-50 text-indigo-600',
    'success' => 'bg-emerald-50 text-emerald-600',
    'warning' => 'bg-amber-50 text-amber-600',
    'danger' => 'bg-rose-50 text-rose-600',
];
$activeIconClass = $iconClasses[$icon] ?? $iconClasses['default'];
@endphp

<div class="relative overflow-hidden bg-white px-4 py-6 shadow-sm ring-1 ring-slate-100 sm:px-6 rounded-3xl transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/5 group border border-transparent hover:border-indigo-100">
    <dt>
        <div class="absolute p-3.5 rounded-2xl {{ $activeIconClass }} transition-all duration-500 group-hover:scale-110 group-hover:rotate-3 shadow-inner">
            {{ $slot }}
        </div>
        <p class="ml-16 truncate text-xs font-semibold uppercase tracking-wider text-slate-400">{{ $label }}</p>
    </dt>
    <dd class="ml-16 flex items-baseline">
        <p class="text-3xl font-bold tracking-tight text-slate-900">{{ $value }}</p>
        @if($trend)
            <span class="ml-2 inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ str_contains($trend, '+') ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                {{ $trend }}
            </span>
        @endif
    </dd>
</div>
