<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-2.5 bg-[#f53003] hover:bg-[#d92900] dark:bg-[#FF4433] dark:hover:bg-[#e03020] text-white text-sm font-medium rounded-lg transition-colors cursor-pointer shadow-xs focus:outline-none focus:ring-2 focus:ring-[#f53003] focus:ring-offset-2 dark:focus:ring-offset-[#161615] disabled:opacity-50']) }}>
    {{ $slot }}
</button>
