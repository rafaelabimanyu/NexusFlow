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

<div class="relative overflow-hidden bg-white px-4 py-5 shadow-sm ring-1 ring-slate-200 sm:px-6 sm:py-6 rounded-2xl transition-all duration-300 hover:shadow-md hover:-translate-y-1 group">
    <dt>
        <div class="absolute p-3 rounded-xl {{ $activeIconClass }} transition-transform duration-300 group-hover:scale-110">
            {{ $slot }}
        </div>
        <p class="ml-16 truncate text-sm font-medium text-slate-500">{{ $label }}</p>
    </dt>
    <dd class="ml-16 flex items-baseline">
        <p class="text-2xl font-semibold text-slate-900">{{ $value }}</p>
        @if($trend)
            <p class="ml-2 flex items-baseline text-sm font-semibold {{ str_contains($trend, '+') ? 'text-emerald-600' : 'text-rose-600' }}">
                {{ $trend }}
            </p>
        @endif
    </dd>
</div>
