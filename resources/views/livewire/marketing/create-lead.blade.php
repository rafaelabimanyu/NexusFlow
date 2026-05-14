<div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-200 p-8">
    <form wire:submit="save" class="space-y-6">
        @if (session()->has('success'))
            <div class="rounded-xl bg-emerald-50 p-4 border border-emerald-200">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="size-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="rounded-xl bg-rose-50 p-4 border border-rose-200">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="size-5 text-rose-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-rose-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-semibold leading-6 text-slate-900">Nama Lengkap</label>
                <div class="mt-2">
                    <input type="text" wire:model.blur="name" class="block w-full rounded-2xl border-0 px-4 py-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-200 bg-slate-50/50 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all duration-200" placeholder="Masukkan nama lead">
                </div>
                @error('name') <span class="text-xs text-rose-600 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold leading-6 text-slate-900">Email</label>
                <div class="mt-2">
                    <input type="email" wire:model.blur="email" class="block w-full rounded-2xl border-0 px-4 py-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-200 bg-slate-50/50 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all duration-200" placeholder="email@example.com">
                </div>
                @error('email') <span class="text-xs text-rose-600 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold leading-6 text-slate-900">Nomor Telepon</label>
                <div class="mt-2">
                    <input type="text" wire:model.blur="phone" class="block w-full rounded-2xl border-0 px-4 py-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-200 bg-slate-50/50 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all duration-200" placeholder="0812xxxxxx">
                </div>
                @error('phone') <span class="text-xs text-rose-600 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold leading-6 text-slate-900">Sumber Lead</label>
                <div class="mt-2">
                    <select wire:model="source" class="block w-full rounded-2xl border-0 px-4 py-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-200 bg-slate-50/50 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all duration-200">
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Referral">Referral</option>
                        <option value="Website">Website</option>
                    </select>
                </div>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold leading-6 text-slate-900">Catatan Tambahan</label>
                <div class="mt-2">
                    <textarea wire:model="notes" rows="3" class="block w-full rounded-2xl border-0 px-4 py-3 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-200 bg-slate-50/50 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition-all duration-200"></textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center gap-x-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>Simpan Lead Baru</span>
                <span wire:loading>
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                </span>
            </button>
        </div>
    </form>
</div>