@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full px-3.5 py-2 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg text-sm text-[#1b1b18] dark:text-[#FDFDFC] placeholder-[#706f6c] dark:placeholder-[#A1A09A] focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] shadow-xs disabled:opacity-50 transition-colors']) }}>
