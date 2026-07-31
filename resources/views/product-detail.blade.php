<x-layout>
    <div class="flex flex-col w-full max-w-4xl py-8 space-y-6">
        <!-- Back Button -->
        <div>
            <a href="{{ route('products') }}" wire:navigate
                class="inline-flex items-center gap-1 text-sm text-[#706f6c] hover:text-[#1b1b18] dark:text-[#A1A09A] dark:hover:text-[#FDFDFC] transition-colors">
                &larr; Quay lại danh sách sản phẩm
            </a>
        </div>

        <!-- Product Detail Card -->
        <div
            class="bg-white dark:bg-[#161615] rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 md:p-8 flex flex-col md:flex-row gap-8 shadow-sm">
            <!-- Image / Icon -->
            <div
                class="w-full md:w-1/2 aspect-square bg-gradient-to-br from-[#fff5f5] to-[#fff2f2] dark:from-[#2d0a0c] dark:to-[#1D0002] rounded-lg flex items-center justify-center p-12">
                <i data-lucide="{{ $product->getIcon() }}" class="w-24 h-24 text-[#f53003] dark:text-[#FF4433]"></i>
            </div>

            <!-- Details -->
            <div class="w-full md:w-1/2 flex flex-col justify-between space-y-4">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#f53003] dark:text-[#FF4433]">
                        {{ $product->getCategory() }}
                    </span>
                    <h1 class="text-2xl md:text-3xl font-bold text-[#1b1b18] dark:text-[#FDFDFC] mt-1">
                        {{ $product->getName() }}
                    </h1>
                    <p class="text-2xl font-semibold text-[#1b1b18] dark:text-[#FDFDFC] mt-2">
                        ${{ number_format($product->getPrice(), 2) }}
                    </p>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] mt-4 leading-relaxed">
                        {{ $product->getDescription() }}
                    </p>
                </div>

                <div class="pt-4 border-t border-[#19140015] dark:border-[#3E3E3A]">
                    <button
                        class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#f53003] hover:bg-[#d92900] text-white font-medium rounded-lg transition-colors cursor-pointer">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
