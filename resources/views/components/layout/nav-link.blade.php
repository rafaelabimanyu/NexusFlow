@props(['active' => false, 'icon' => ''])

@php
$classes = ($active ?? false)
            ? 'bg-slate-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6'
            : 'text-slate-700 hover:text-indigo-600 hover:bg-slate-50 group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 transition-all duration-200';
@endphp

<li>
    <a href="{{ $href }}" wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
        <div class="flex items-center shrink-0">
            @if($icon === 'home')
                <svg class="size-6 {{ $active ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            @elseif($icon === 'marketing')
                <svg class="size-6 {{ $active ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.062.51.115.77.16L15 17.125V6.875l-3.89 1.085a3.507 3.507 0 0 0-.77.16m0 9.18V8.12" />
                </svg>
            @elseif($icon === 'mentoring')
                <svg class="size-6 {{ $active ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.998 5.998 0 0 0-4.03-5.754m-4.44 1.106A4.833 4.833 0 0 1 12 12c.304 0 .599.028.885.083m-3.85 1.145A5.998 5.998 0 0 0 6 18.72m4-12.135a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM3.408 21.485a12.008 12.008 0 0 1 1.214-3.218m7.308-7.962a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0Z" />
                </svg>
            @elseif($icon === 'tasks')
                <svg class="size-6 {{ $active ? 'text-indigo-600' : 'text-slate-400 group-hover:text-indigo-600' }}" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .415.162.798.425 1.081.263.283.629.46 1.026.46.397 0 .763-.177 1.026-.46.263-.283.425-.666.425-1.081 0-.231-.035-.454-.1-.664m-5.801 0A2.251 2.251 0 0 1 13.5 2.25c1.035 0 1.912.7 2.153 1.64m-7.308 0a2.25 2.25 0 0 0-2.022 1.442M4.5 7.031V21a2.25 2.25 0 0 0 2.25 2.25h1.318a2.25 2.25 0 0 0 1.359-.462l1.62-1.215a.75.75 0 0 1 .902 0l1.62 1.215a2.25 2.25 0 0 0 1.359.462h1.318a2.25 2.25 0 0 0 2.25-2.25V7.031a48.11 48.11 0 0 1-13.5 0Zm6.75 1.5V12m0 0V8.531m0 3.469h3.469m-3.469 0H8.031" />
                </svg>
            @endif
        </div>
        {{ $slot }}
    </a>
</li>
