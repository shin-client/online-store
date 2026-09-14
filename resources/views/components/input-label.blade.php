@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A] mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>
