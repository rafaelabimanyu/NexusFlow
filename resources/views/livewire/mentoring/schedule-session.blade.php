<div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-200 p-8">
    <form wire:submit="save" class="space-y-6">
        @if (session()->has('success'))
            <div class="rounded-xl bg-emerald-50 p-4 border border-emerald-200">
                <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="rounded-xl bg-rose-50 p-4 border border-rose-200">
                <p class="text-sm font-medium text-rose-800">{{ session('error') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold leading-6 text-slate-900">Judul Sesi</label>
                <div class="mt-2">
                    <input type="text" wire:model.blur="title" class="block w-full rounded-xl border-0 px-4 py-2.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all" placeholder="Contoh: Konsultasi Strategi Digital">
                </div>
                @error('title') <span class="text-xs text-rose-600 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold leading-6 text-slate-900">Waktu Mulai</label>
                <div class="mt-2">
                    <input type="datetime-local" wire:model="scheduled_at" class="block w-full rounded-xl border-0 px-4 py-2.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all">
                </div>
                @error('scheduled_at') <span class="text-xs text-rose-600 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold leading-6 text-slate-900">Durasi (Menit)</label>
                <div class="mt-2">
                    <input type="number" wire:model="duration" class="block w-full rounded-xl border-0 px-4 py-2.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all">
                </div>
                @error('duration') <span class="text-xs text-rose-600 mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold leading-6 text-slate-900">Link Meeting (Zoom/Google Meet)</label>
                <div class="mt-2">
                    <input type="url" wire:model="meeting_link" class="block w-full rounded-xl border-0 px-4 py-2.5 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all" placeholder="https://meet.google.com/xxx-xxxx-xxx">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center gap-x-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-all disabled:opacity-50">
                <span wire:loading.remove>Jadwalkan Sesi</span>
                <span wire:loading>Menyimpan...</span>
            </button>
        </div>
    </form>
</div>