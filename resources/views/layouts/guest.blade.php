<x-layout :title="$title ?? ('Account - ' . config('app.name', 'Online Store'))">
    <div class="flex items-center justify-center w-full min-h-[calc(100vh-16rem)] py-4">
        <div class="w-full max-w-md bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-xl shadow-xs p-6 sm:p-8">
            <div class="mb-6 text-center">
                <a href="{{ url('/') }}" wire:navigate class="font-bold text-2xl tracking-tight text-[#f53003]">
                    {{ config('app.name', 'Online Store') }}
                </a>
            </div>

            {{ $slot }}
        </div>
    </div>
</x-layout>
