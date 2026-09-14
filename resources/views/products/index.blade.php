<x-layout>
    <div class="flex flex-col w-full transition-opacity opacity-100 duration-750 starting:opacity-0 space-y-10">
        <!-- 1. Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">
            <div>
                <h1 class="text-3xl md:text-4xl font-semibold mb-2 text-[#1b1b18] dark:text-[#FDFDFC]">
                    Our <span class="text-[#f53003] dark:text-[#FF4433]">Products</span>
                </h1>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">
                    Explore our curated selection of high-quality items.
                </p>
            </div>

            <!-- New product and trash buttons  -->
            <div class="flex items-center gap-3">
                <a href="{{ route('products.trash') }}" wire:navigate
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#FDFDFC] text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-[#20201e] transition-colors">
                    <i data-lucide="trash-2" class="w-4 h-4 text-[#f53003] dark:text-[#FF4433]"></i>
                    Trash
                </a>

                <a href="{{ route('products.create') }}" wire:navigate
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#f53003] hover:bg-[#d92900] dark:bg-[#FF4433] dark:hover:bg-[#e03020] text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    New Product
                </a>
            </div>
        </div>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="p-4 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 rounded-lg text-emerald-800 dark:text-emerald-200 text-sm flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5 shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- 2. Main Grid Container (Sidebar + Products Grid) -->
        <div class="flex flex-col md:flex-row gap-8 items-start w-full">

            <!-- Left Sidebar (Filters) -->
            <form method="GET" action="{{ route('products.index') }}" class="w-full md:w-64 shrink-0 space-y-5">
                <!-- Search Box -->
                <div
                    class="bg-white dark:bg-[#161615] p-5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs">
                    <h3 class="text-sm font-semibold mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Search</h3>
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                            class="w-full pl-9 pr-3 py-2 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] text-[#1b1b18] dark:text-[#FDFDFC] placeholder-[#a1a19f]" />
                        <span class="absolute left-3 top-2.5 text-[#706f6c] dark:text-[#A1A09A] flex items-center">
                            <i data-lucide="search" class="w-4 h-4"></i>
                        </span>
                    </div>
                </div>

                <!-- Categories -->
                <div
                    class="bg-white dark:bg-[#161615] p-5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs">
                    <h3 class="text-sm font-semibold mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Categories</h3>
                    <div class="space-y-2.5">
                        <label class="flex items-center justify-between cursor-pointer">
                            <div class="flex items-center gap-2.5">
                                <input type="radio" name="category" value="" onchange="this.form.submit()"
                                    {{ !request()->filled('category') ? 'checked' : '' }}
                                    class="w-4 h-4 accent-[#f53003] dark:accent-[#FF4433]" />
                                <span class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#FDFDFC] transition-colors">
                                    All Categories
                                </span>
                            </div>
                        </label>
                        @foreach ($categories as $cat)
                            <label class="flex items-center justify-between cursor-pointer">
                                <div class="flex items-center gap-2.5">
                                    <input type="radio" name="category" value="{{ $cat->id }}" onchange="this.form.submit()"
                                        {{ request('category') == $cat->id ? 'checked' : '' }}
                                        class="w-4 h-4 accent-[#f53003] dark:accent-[#FF4433]" />
                                    <span class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#FDFDFC] transition-colors">
                                        {{ $cat->name }}
                                    </span>
                                </div>
                                <span class="text-xs text-[#706f6c] dark:text-[#A1A09A] bg-gray-100 dark:bg-gray-800 px-2 py-0.5 rounded-full">
                                    {{ $cat->products_count }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Price Range (Manual Inputs) -->
                <div
                    class="bg-white dark:bg-[#161615] p-5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs">
                    <h3 class="text-sm font-semibold mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Price Range</h3>
                    <div class="space-y-3">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-xs text-[#706f6c] dark:text-[#A1A09A] block mb-1">Min ($)</label>
                                <input type="number" name="min_price" value="{{ request('min_price') }}" min="0" step="any" placeholder="0"
                                    class="w-full px-2.5 py-1.5 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] text-[#1b1b18] dark:text-[#FDFDFC]" />
                            </div>
                            <div>
                                <label class="text-xs text-[#706f6c] dark:text-[#A1A09A] block mb-1">Max ($)</label>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" min="0" step="any" placeholder="Max"
                                    class="w-full px-2.5 py-1.5 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] text-[#1b1b18] dark:text-[#FDFDFC]" />
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full py-2 px-3 bg-[#f53003] hover:bg-[#d92900] dark:bg-[#FF4433] dark:hover:bg-[#e03020] text-white text-xs font-medium rounded-md transition-colors cursor-pointer text-center shadow-xs">
                            Apply Price
                        </button>
                    </div>
                </div>

                <!-- Sort By -->
                <div
                    class="bg-white dark:bg-[#161615] p-5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs">
                    <h3 class="text-sm font-semibold mb-3 text-[#1b1b18] dark:text-[#FDFDFC]">Sort By</h3>
                    <select name="sort" onchange="this.form.submit()"
                        class="w-full py-2 px-3 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC] cursor-pointer">
                        <option value="newest" {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>

                <!-- Reset Filters Button -->
                @if (request()->hasAny(['search', 'category', 'min_price', 'max_price', 'sort']))
                    <a href="{{ route('products.index') }}" wire:navigate
                        class="w-full inline-flex items-center justify-center gap-1.5 py-2 px-3 border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] text-xs font-medium rounded-md hover:bg-gray-50 dark:hover:bg-[#20201e] text-[#706f6c] dark:text-[#A1A09A] transition-colors shadow-xs">
                        <i data-lucide="rotate-ccw" class="w-3.5 h-3.5"></i>
                        Reset All Filters
                    </a>
                @endif
            </form>

            <!-- Right Area (Products Grid) -->
            <div class="flex-grow w-full space-y-6">
                <!-- Status/Results count -->
                <div class="flex items-center justify-between text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    <span>Showing <span
                            class="font-medium text-[#1b1b18] dark:text-[#FDFDFC]">{{ count($products) }}</span>
                        products</span>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                        <div
                            class="group flex flex-col bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden hover:shadow-[0px_4px_12px_rgba(0,0,0,0.05)] dark:hover:shadow-[0px_4px_12px_rgba(0,0,0,0.2)] transition-shadow">

                            <!-- Product Icon / Image Placeholder -->
                            <div
                                class="aspect-video bg-gradient-to-br from-[#fff5f5] to-[#fff2f2] dark:from-[#2d0a0c] dark:to-[#1D0002] flex items-center justify-center p-8 relative overflow-hidden">
                                <i data-lucide="{{ $product->category?->icon ?? 'package' }}"
                                    class="w-12 h-12 text-[#f53003] dark:text-[#FF4433] group-hover:scale-110 transition-transform duration-300"></i>
                                <span
                                    class="absolute top-3 right-3 bg-white/80 dark:bg-black/80 backdrop-blur-xs text-xs font-semibold px-2.5 py-1 rounded text-[#1b1b18] dark:text-[#FDFDFC]">
                                    {{ $product->category?->name ?? 'General' }}
                                </span>
                            </div>

                            <!-- Product Info -->
                            <div class="p-5 flex-grow flex flex-col space-y-3">
                                <div class="flex items-start justify-between gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" wire:navigate
                                        class="font-medium text-base text-[#1b1b18] dark:text-[#FDFDFC] group-hover:text-[#f53003] dark:group-hover:text-[#FF4433] transition-colors">
                                        {{ $product->name }}
                                    </a>
                                    <span class="font-semibold text-[#1b1b18] dark:text-[#FDFDFC] shrink-0">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                </div>

                                <div class="text-xs text-[#706f6c] dark:text-[#A1A09A] flex items-center gap-1.5">
                                    <i data-lucide="user" class="w-3 h-3 text-[#f53003] dark:text-[#FF4433]"></i>
                                    <span>{{ $product->user?->name ?? 'System' }}</span>
                                </div>
                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] leading-relaxed flex-grow">
                                    {{ $product->description }}
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

                                <!-- Edit & Soft Delete Actions -->
                                <div class="flex items-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('products.edit', $product->id) }}" wire:navigate
                                        class="p-1.5 text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#FDFDFC] transition-colors" title="Edit">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Trash Button (Soft Delete) -->
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to move this product to trash?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-[#706f6c] dark:text-[#A1A09A] hover:text-red-500 transition-colors cursor-pointer" title="Move to trash">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 flex flex-col items-center justify-center text-center bg-white dark:bg-[#161615] rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] p-8">
                            <i data-lucide="package-search" class="w-12 h-12 text-[#f53003] dark:text-[#FF4433] stroke-1 mb-3"></i>
                            <h3 class="text-base font-semibold text-[#1b1b18] dark:text-[#FDFDFC]">No products found</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1 mb-5 max-w-sm">No products matched your search or filter criteria. Try expanding your price range or clearing filters.</p>
                            <a href="{{ route('products.index') }}" wire:navigate
                                class="px-4 py-2 bg-[#f53003] hover:bg-[#d92900] dark:bg-[#FF4433] dark:hover:bg-[#e03020] text-white text-xs font-medium rounded-lg transition-colors shadow-xs">
                                Reset All Filters
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

                <!-- Pagination -->
                @if ($products->hasPages())
                    <div class="pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                        {{ $products->links() }}
                    </div>
                @endif

        </div>

    </div>
</x-layout>
