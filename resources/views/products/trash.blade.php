<x-layout>
    <div class="flex flex-col w-full space-y-6 transition-opacity opacity-100 duration-750 starting:opacity-0">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#FDFDFC] flex items-center gap-2">
                    <i data-lucide="trash-2" class="w-7 h-7 text-[#f53003] dark:text-[#FF4433]"></i>
                    Product Trash
                </h1>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1">List of temporarily deleted products. You can restore or permanently delete them.</p>
            </div>
            <a href="{{ route('products.index') }}" wire:navigate
                class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#FDFDFC] text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-[#20201e] transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Back to products
            </a>
        </div>

        <!-- Session Flash Message -->
        @if (session('success'))
            <div class="p-4 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 rounded-lg text-emerald-800 dark:text-emerald-200 text-sm flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5 shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Table Container -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="border-b border-[#e3e3e0] dark:border-[#3E3E3A] bg-[#fcfcfc] dark:bg-[#121212] text-[#706f6c] dark:text-[#A1A09A]">
                            <th class="py-3.5 px-4 font-medium">ID</th>
                            <th class="py-3.5 px-4 font-medium">Product Name</th>
                            <th class="py-3.5 px-4 font-medium">Price</th>
                            <th class="py-3.5 px-4 font-medium">Deleted At</th>
                            <th class="py-3.5 px-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e3e3e0]/60 dark:divide-[#3E3E3A]/60 text-[#1b1b18] dark:text-[#FDFDFC]">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-[#1c1c1a]/50 transition-colors">
                                <td class="py-3.5 px-4 text-[#706f6c] dark:text-[#A1A09A] font-mono">{{ $product->id }}</td>
                                <td class="py-3.5 px-4 font-medium">{{ $product->name }}</td>
                                <td class="py-3.5 px-4">${{ number_format($product->price, 2) }}</td>
                                <td class="py-3.5 px-4 text-xs text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $product->deleted_at ? $product->deleted_at->format('M d, Y H:i') : 'N/A' }}
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Restore -->
                                        <form action="{{ route('products.restore', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 dark:bg-emerald-950/50 dark:text-emerald-300 dark:hover:bg-emerald-900/50 text-xs font-medium rounded transition-colors cursor-pointer">
                                                <i data-lucide="rotate-ccw" class="w-3.5 h-3.5"></i>
                                                Restore
                                            </button>
                                        </form>

                                        <!-- Permanent Delete -->
                                        <form action="{{ route('products.forceDelete', $product->id) }}" method="POST"
                                            onsubmit="return confirm('WARNING: This action will permanently delete this product and cannot be undone!')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 dark:bg-red-950/50 dark:text-red-400 dark:hover:bg-red-900/50 text-xs font-medium rounded transition-colors cursor-pointer">
                                                <i data-lucide="trash" class="w-3.5 h-3.5"></i>
                                                Delete Permanently
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-[#706f6c] dark:text-[#A1A09A]">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-lucide="archive-restore" class="w-10 h-10 stroke-1 opacity-60"></i>
                                        <p class="text-base font-medium">Trash is empty</p>
                                        <p class="text-xs">No temporarily deleted products found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($products->hasPages())
                <div class="p-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                    {{ $products->links() }}
                </div>
            @endif
        </div>

    </div>
</x-layout>
