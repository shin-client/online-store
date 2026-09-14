<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md font-medium text-xs text-[#1b1b18] dark:text-[#FDFDFC] tracking-wide shadow-xs hover:bg-gray-50 dark:hover:bg-[#20201e] focus:outline-none focus:ring-1 focus:ring-[#f53003] disabled:opacity-25 transition-colors']) }}>
    {{ $slot }}
</button>
