<x-layout>
    <div
        class="flex flex-col w-full max-w-5xl transition-opacity opacity-100 duration-750 starting:opacity-0 py-8 space-y-12">

        <!-- 1. Header Section -->
        <div class="text-center w-full">
            <h1 class="text-3xl md:text-4xl font-semibold mb-4 text-[#1b1b18] dark:text-[#FDFDFC]">
                Our <span class="text-[#f53003] dark:text-[#FF4433]">Products</span>
            </h1>
            <p class="text-[#706f6c] dark:text-[#A1A09A] max-w-2xl mx-auto leading-relaxed">
                Explore our curated selection of high-quality items designed to complement your modern lifestyle.
            </p>
        </div>

        <!-- 2. Main Grid Container (Sidebar + Products Grid) -->
        <div class="flex flex-col md:flex-row gap-8 items-start w-full">

            <!-- Left Sidebar (Filters) -->
            <aside class="w-full md:w-64 shrink-0 space-y-6">
                <!-- Search Box -->
                <div
                    class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h3 class="text-sm font-medium mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Search</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search products..."
                            class="w-full pl-9 pr-3 py-2 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC] placeholder-[#a1a19f]" />
                        <span class="absolute left-3 top-2.5 text-[#706f6c] dark:text-[#A1A09A] flex items-center">
                            <i data-lucide="search" class="w-4 h-4"></i>
                        </span>
                    </div>
                </div>

                <!-- Categories -->
                <div
                    class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h3 class="text-sm font-medium mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Categories</h3>
                    <div class="space-y-3">
                        @foreach (['All Products', 'Tech', 'Accessories', 'Apparel'] as $category)
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="category"
                                    {{ $category === 'All Products' ? 'checked' : '' }}
                                    class="w-4 h-4 accent-[#f53003] dark:accent-[#FF4433]" />
                                <span
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#FDFDFC] transition-colors">
                                    {{ $category }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Price Range -->
                <div
                    class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h3 class="text-sm font-medium mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Price Range</h3>
                    <div class="space-y-4">
                        <input type="range" min="0" max="300" value="200"
                            class="w-full accent-[#f53003] dark:accent-[#FF4433] cursor-pointer" />
                        <div class="flex justify-between text-xs text-[#706f6c] dark:text-[#A1A09A]">
                            <span>$0</span>
                            <span class="font-medium text-[#1b1b18] dark:text-[#FDFDFC]">$200</span>
                            <span>$300</span>
                        </div>
                    </div>
                </div>

                <!-- Sort By -->
                <div
                    class="bg-white dark:bg-[#161615] p-6 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h3 class="text-sm font-medium mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Sort By</h3>
                    <select
                        class="w-full py-2 px-3 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC] cursor-pointer">
                        <option>Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                    </select>
                </div>
            </aside>

            <!-- Right Area (Products Grid) -->
            <div class="flex-grow w-full space-y-6">
                <!-- Status/Results count -->
                <div class="flex items-center justify-between text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    <span>Showing <span
                            class="font-medium text-[#1b1b18] dark:text-[#FDFDFC]">{{ count($products) }}</span>
                        products</span>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div
                            class="group flex flex-col bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden hover:shadow-[0px_4px_12px_rgba(0,0,0,0.05)] dark:hover:shadow-[0px_4px_12px_rgba(0,0,0,0.2)] transition-shadow">

                            <!-- Product Icon / Image Placeholder -->
                            <div
                                class="aspect-video bg-gradient-to-br from-[#fff5f5] to-[#fff2f2] dark:from-[#2d0a0c] dark:to-[#1D0002] flex items-center justify-center p-8 relative overflow-hidden">
                                <i data-lucide="{{ $product['icon'] }}"
                                    class="w-12 h-12 text-[#f53003] dark:text-[#FF4433] group-hover:scale-110 transition-transform duration-300"></i>
                                <span
                                    class="absolute top-3 right-3 bg-white/80 dark:bg-black/80 backdrop-blur-xs text-xs font-semibold px-2.5 py-1 rounded text-[#1b1b18] dark:text-[#FDFDFC]">
                                    {{ $product['category'] }}
                                </span>
                            </div>

                            <!-- Product Info -->
                            <div class="p-5 flex-grow flex flex-col space-y-3">
                                <div class="flex items-start justify-between gap-2">
                                    <a href="{{ route('products.show', ['id' => $product['id']]) }}" wire:navigate
                                        class="font-medium text-base text-[#1b1b18] dark:text-[#FDFDFC] group-hover:text-[#f53003] dark:group-hover:text-[#FF4433] transition-colors">
                                        {{ $product['name'] }}
                                    </a>
                                    <span class="font-semibold text-[#1b1b18] dark:text-[#FDFDFC] shrink-0">
                                        ${{ number_format($product['price'], 2) }}
                                    </span>
                                </div>
                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] leading-relaxed flex-grow">
                                    {{ $product['description'] }}
                                </p>

                                <!-- Rating / Add to cart -->
                                <div
                                    class="pt-4 flex items-center justify-between border-t border-[#e3e3e0]/50 dark:border-[#3E3E3A]/50 gap-4">
                                    <!-- Simple Rating -->
                                    <div class="flex items-center text-amber-500 gap-1 text-xs">
                                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-500 text-amber-500"></i>
                                        <span class="font-medium text-[#1b1b18] dark:text-[#FDFDFC]">4.8</span>
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <button
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#1b1b18] hover:bg-black text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white text-xs font-medium rounded transition-colors cursor-pointer">
                                        <i data-lucide="shopping-cart" class="w-3.5 h-3.5"></i>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</x-layout>
