<x-layout>
    <div
        class="flex flex-col items-center w-full max-w-5xl transition-opacity opacity-100 duration-750 starting:opacity-0 py-8 space-y-16">

        <!-- 1. Header Section -->
        <div class="text-center w-full">
            <h1 class="text-3xl md:text-4xl font-semibold mb-4 text-[#1b1b18] dark:text-[#FDFDFC]">
                About <span class="text-[#f53003] dark:text-[#FF4433]">{{ config('app.name', 'Online Store') }}</span>
            </h1>
            <p class="text-[#706f6c] dark:text-[#A1A09A] max-w-2xl mx-auto leading-relaxed">
                We are proud to provide the best online shopping experience, connecting you with high-quality products
                and dedicated customer service.
            </p>
        </div>

        <!-- 2. Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
            <div
                class="bg-white dark:bg-[#161615] p-8 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                <div class="flex items-center gap-4 mb-4">
                    <span
                        class="flex items-center justify-center rounded-full bg-gradient-to-br from-[#fff5f5] to-[#fff2f2] dark:from-[#2d0a0c] dark:to-[#1D0002] w-12 h-12">
                        <i data-lucide="target" class="w-6 h-6 text-[#f53003] dark:text-[#FF4433]"></i>
                    </span>
                    <h2 class="text-xl font-medium text-[#1b1b18] dark:text-[#FDFDFC]">Our Mission</h2>
                </div>
                <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                    To provide excellent products that improve our customers' daily lives, while building a reliable and
                    convenient online shopping community.
                </p>
            </div>

            <div
                class="bg-white dark:bg-[#161615] p-8 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                <div class="flex items-center gap-4 mb-4">
                    <span
                        class="flex items-center justify-center rounded-full bg-gradient-to-br from-[#fff5f5] to-[#fff2f2] dark:from-[#2d0a0c] dark:to-[#1D0002] w-12 h-12">
                        <i data-lucide="eye" class="w-6 h-6 text-[#f53003] dark:text-[#FF4433]"></i>
                    </span>
                    <h2 class="text-xl font-medium text-[#1b1b18] dark:text-[#FDFDFC]">Our Vision</h2>
                </div>
                <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                    To become the leading e-commerce platform where everyone can easily find what they need with a
                    seamless experience, from a single click to delivery.
                </p>
            </div>
        </div>

        <!-- 3. Team Section -->
        <div class="w-full">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-semibold mb-2 text-[#1b1b18] dark:text-[#FDFDFC]">Meet Our Team</h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">The passionate people behind our success</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Member 1 -->
                <div
                    class="flex flex-col items-center text-center p-6 bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div
                        class="w-20 h-20 mb-4 rounded-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A]">
                        <i data-lucide="user" class="w-8 h-8"></i>
                    </div>
                    <h3 class="font-medium text-lg text-[#1b1b18] dark:text-[#FDFDFC]">Tran Van Ngoc</h3>
                    <p class="text-sm text-[#f53003] dark:text-[#FF4433] mb-2">CEO & Founder</p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Responsible for our strategic direction and
                        product development.</p>
                </div>
                <!-- Member 2 -->
                <div
                    class="flex flex-col items-center text-center p-6 bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div
                        class="w-20 h-20 mb-4 rounded-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A]">
                        <i data-lucide="user" class="w-8 h-8"></i>
                    </div>
                    <h3 class="font-medium text-lg text-[#1b1b18] dark:text-[#FDFDFC]">Duong Dog</h3>
                    <p class="text-sm text-[#f53003] dark:text-[#FF4433] mb-2">Head of Marketing</p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Creates engaging promotional campaigns and
                        connects with our customers.</p>
                </div>
                <!-- Member 3 -->
                <div
                    class="flex flex-col items-center text-center p-6 bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div
                        class="w-20 h-20 mb-4 rounded-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A]">
                        <i data-lucide="user" class="w-8 h-8"></i>
                    </div>
                    <h3 class="font-medium text-lg text-[#1b1b18] dark:text-[#FDFDFC]">Alexander the Great</h3>
                    <p class="text-sm text-[#f53003] dark:text-[#FF4433] mb-2">Lead Engineer</p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Ensures our system runs smoothly, securely,
                        and stably.</p>
                </div>
            </div>
        </div>

        <!-- 4. Contact Information -->
        <div
            class="w-full bg-[#fcfcfc] dark:bg-[#121212] p-8 md:p-12 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold mb-2 text-[#1b1b18] dark:text-[#FDFDFC]">Contact Us</h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">We are always here to listen and assist you.</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16">
                <!-- Address -->
                <div class="flex flex-col items-center text-center">
                    <div class="mb-3 text-[#f53003] dark:text-[#FF4433]">
                        <i data-lucide="map-pin" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-1">Address</h4>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">123 Street No. 1, District 1<br />Ho Chi Minh
                        City</p>
                </div>
                <!-- Phone -->
                <div class="flex flex-col items-center text-center">
                    <div class="mb-3 text-[#f53003] dark:text-[#FF4433]">
                        <i data-lucide="phone" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-1">Phone</h4>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                        <a href="tel:+84123456789" class="hover:text-[#f53003] transition-colors">0123 456 789</a><br />
                        Mon - Fri (8:00 AM - 5:00 PM)
                    </p>
                </div>
                <!-- Email -->
                <div class="flex flex-col items-center text-center">
                    <div class="mb-3 text-[#f53003] dark:text-[#FF4433]">
                        <i data-lucide="mail" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-medium text-[#1b1b18] dark:text-[#FDFDFC] mb-1">Email</h4>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                        <a href="mailto:support@onlinestore.com"
                            class="hover:text-[#f53003] transition-colors">support@onlinestore.com</a><br />
                        Response within 24 hours
                    </p>
                </div>
            </div>
        </div>

        <!-- 5. Call to Action -->
        <div class="text-center pt-4">
            <h3 class="text-lg font-medium mb-4 text-[#1b1b18] dark:text-[#FDFDFC]">Ready to start shopping?</h3>
            <a href="{{ route('products.index') }}" wire:navigate
                class="inline-flex items-center justify-center rounded-md bg-[#f53003] dark:bg-[#FF4433] px-6 py-2.5 text-sm font-medium text-white shadow-sm hover:opacity-90 transition-opacity">
                Explore our products
                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>

    </div>
</x-layout>
