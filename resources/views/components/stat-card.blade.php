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

<div class="bento-card p-8">
    <div class="flex justify-between items-start">
        <dt>
            <div class="p-3.5 rounded-2xl {{ $activeIconClass }} shadow-inner transition-all duration-500 group-hover:scale-110 group-hover:rotate-3">
                {{ $slot }}
            </div>
            <p class="mt-4 truncate text-[11px] font-bold uppercase tracking-[0.1em] text-slate-400">{{ $label }}</p>
        </dt>
        
        <!-- Sparkline SVG (Minimalist Trend) -->
        <div class="h-12 w-24">
            <svg class="w-full h-full text-indigo-500/30" viewBox="0 0 100 40" fill="none">
                <path d="M0 35 Q 20 10, 40 25 T 80 5 T 100 20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" class="transition-all duration-1000 group-hover:text-indigo-500" />
            </svg>
        </div>
    </div>
    
    <dd class="mt-4 flex items-baseline gap-x-2">
        <p class="text-4xl premium-heading text-slate-900">{{ $value }}</p>
        @if($trend)
            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-[11px] font-bold {{ str_contains($trend, '+') ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                {{ $trend }}
            </span>
        @endif
    </dd>
</div>
