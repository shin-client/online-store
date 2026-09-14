<x-layout>
    <div class="flex flex-col w-full max-w-4xl mx-auto space-y-6 transition-opacity opacity-100 duration-750 starting:opacity-0">
        <!-- Back Button -->
        <div>
            <a href="{{ route('products.index') }}" wire:navigate
                class="inline-flex items-center gap-1.5 text-sm text-[#706f6c] hover:text-[#1b1b18] dark:text-[#A1A09A] dark:hover:text-[#FDFDFC] transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Back to products
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-[#161615] rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 md:p-8 shadow-sm">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#FDFDFC]">Edit Product</h1>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1">Update details for product: <strong class="text-[#f53003] dark:text-[#FF4433]">{{ $product->name }}</strong></p>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Category & Name Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Category <span class="text-[#f53003] dark:text-[#FF4433]">*</span></label>
                        <select name="category_id"
                            class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border @error('category_id') border-red-500 @else border-[#e3e3e0] dark:border-[#3E3E3A] @enderror rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Product Name <span class="text-[#f53003] dark:text-[#FF4433]">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                            class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border @error('name') border-red-500 @else border-[#e3e3e0] dark:border-[#3E3E3A] @enderror rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]" />
                        @error('name')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Slug & Image Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Slug -->
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $product->slug) }}"
                            class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border @error('slug') border-red-500 @else border-[#e3e3e0] dark:border-[#3E3E3A] @enderror rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]" />
                        @error('slug')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Product Image (URL)</label>
                        <input type="text" name="image" value="{{ old('image', $product->image) }}"
                            class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border @error('image') border-red-500 @else border-[#e3e3e0] dark:border-[#3E3E3A] @enderror rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]" />
                        @error('image')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Price & Stock Quantity Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Price ($) <span class="text-[#f53003] dark:text-[#FF4433]">*</span></label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                            class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border @error('price') border-red-500 @else border-[#e3e3e0] dark:border-[#3E3E3A] @enderror rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]" />
                        @error('price')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Stock Quantity <span class="text-[#f53003] dark:text-[#FF4433]">*</span></label>
                        <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}"
                            class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border @error('stock_quantity') border-red-500 @else border-[#e3e3e0] dark:border-[#3E3E3A] @enderror rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] focus:ring-1 focus:ring-[#f53003] dark:focus:ring-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]" />
                        @error('stock_quantity')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-2.5 text-sm bg-white dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:outline-none focus:border-[#f53003] dark:focus:border-[#FF4433] text-[#1b1b18] dark:text-[#FDFDFC]">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-[#e3e3e0]/50 dark:border-[#3E3E3A]/50">
                    <a href="{{ route('products.index') }}" wire:navigate
                        class="px-5 py-2.5 text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#FDFDFC] transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#f53003] hover:bg-[#d92900] dark:bg-[#FF4433] dark:hover:bg-[#e03020] text-white text-sm font-medium rounded-lg transition-colors cursor-pointer shadow-sm">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
