<x-layout>
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#1b1b18] dark:text-[#FDFDFC]">
                    Dashboard
                </h1>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1">
                    Welcome back, <span class="font-medium text-[#1b1b18] dark:text-[#FDFDFC]">{{ $user->name }}</span>! Here is an overview of your store account.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('products.create') }}" wire:navigate
                    class="inline-flex items-center gap-2 px-4 py-2 bg-[#f53003] hover:bg-[#d92900] text-white text-sm font-medium rounded-lg transition-colors shadow-xs">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Add Product
                </a>
                <a href="{{ route('profile.edit') }}" wire:navigate
                    class="inline-flex items-center gap-2 px-4 py-2 border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] hover:bg-gray-50 dark:hover:bg-[#20201e] text-[#1b1b18] dark:text-[#FDFDFC] text-sm font-medium rounded-lg transition-colors shadow-xs">
                    <i data-lucide="user" class="w-4 h-4"></i>
                    Profile
                </a>
            </div>
        </div>

        <!-- Metric Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: User's Products -->
            <div class="bg-white dark:bg-[#161615] p-6 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-medium uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                        Your Products
                    </p>
                    <p class="text-3xl font-bold text-[#1b1b18] dark:text-[#FDFDFC]">
                        {{ $userProductsCount }}
                    </p>
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">
                        Created and managed by you
                    </p>
                </div>
                <div class="p-3 bg-[#fff5f5] dark:bg-[#2d0a0c] rounded-xl text-[#f53003] dark:text-[#FF4433]">
                    <i data-lucide="package" class="w-6 h-6"></i>
                </div>
            </div>

            <!-- Card 2: Store Catalog -->
            <div class="bg-white dark:bg-[#161615] p-6 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-medium uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                        Store Catalog
                    </p>
                    <p class="text-3xl font-bold text-[#1b1b18] dark:text-[#FDFDFC]">
                        {{ $totalProductsCount }}
                    </p>
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">
                        Across {{ $totalCategoriesCount }} product categories
                    </p>
                </div>
                <div class="p-3 bg-blue-50 dark:bg-blue-950/40 rounded-xl text-blue-600 dark:text-blue-400">
                    <i data-lucide="store" class="w-6 h-6"></i>
                </div>
            </div>

            <!-- Card 3: Account Info -->
            <div class="bg-white dark:bg-[#161615] p-6 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-medium uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                        Account Phone
                    </p>
                    <p class="text-xl font-bold text-[#1b1b18] dark:text-[#FDFDFC] truncate">
                        {{ $user->phone_number ?: 'Not provided' }}
                    </p>
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] truncate">
                        {{ $user->email }}
                    </p>
                </div>
                <div class="p-3 bg-emerald-50 dark:bg-emerald-950/40 rounded-xl text-emerald-600 dark:text-emerald-400">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
            </div>
        </div>

        <!-- Recent Products Section -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs overflow-hidden">
            <div class="p-6 border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between">
                <div>
                    <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#FDFDFC]">
                        Your Recent Products
                    </h2>
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-0.5">
                        Products you have added to the online store catalog.
                    </p>
                </div>
                <a href="{{ route('products.index') }}" wire:navigate
                    class="text-xs font-medium text-[#f53003] dark:text-[#FF4433] hover:underline inline-flex items-center gap-1">
                    Browse All Products
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            @if ($recentProducts->isEmpty())
                <div class="p-12 text-center flex flex-col items-center justify-center">
                    <i data-lucide="package-plus" class="w-12 h-12 text-[#706f6c] dark:text-[#A1A09A] stroke-1 mb-3"></i>
                    <h3 class="text-base font-semibold text-[#1b1b18] dark:text-[#FDFDFC]">No products created yet</h3>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1 mb-4 max-w-sm">
                        You haven't listed any products yet. Start adding items to the store right away!
                    </p>
                    <a href="{{ route('products.create') }}" wire:navigate
                        class="px-4 py-2 bg-[#f53003] hover:bg-[#d92900] text-white text-xs font-medium rounded-lg transition-colors shadow-xs">
                        Create Your First Product
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 dark:bg-[#1f1f1e] text-xs uppercase font-medium text-[#706f6c] dark:text-[#A1A09A] border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                            <tr>
                                <th class="py-3.5 px-6">Product</th>
                                <th class="py-3.5 px-6">Category</th>
                                <th class="py-3.5 px-6">Price</th>
                                <th class="py-3.5 px-6">Stock</th>
                                <th class="py-3.5 px-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                            @foreach ($recentProducts as $product)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1a1a19] transition-colors">
                                    <td class="py-4 px-6 font-medium text-[#1b1b18] dark:text-[#FDFDFC]">
                                        <a href="{{ route('products.show', $product->id) }}" wire:navigate class="hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-[#706f6c] dark:text-[#A1A09A]">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 dark:bg-gray-800 text-[#1b1b18] dark:text-[#FDFDFC]">
                                            {{ $product->category?->name ?? 'General' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-[#1b1b18] dark:text-[#FDFDFC]">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="py-4 px-6 text-[#706f6c] dark:text-[#A1A09A]">
                                        {{ $product->stock_quantity }} units
                                    </td>
                                    <td class="py-4 px-6 text-right space-x-2">
                                        <a href="{{ route('products.show', $product->id) }}" wire:navigate
                                            class="inline-flex items-center text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#FDFDFC]">
                                            View
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" wire:navigate
                                            class="inline-flex items-center text-xs font-medium text-[#f53003] dark:text-[#FF4433] hover:underline">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layout>
