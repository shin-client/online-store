<x-layout>
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Page Header -->
        <div class="pb-6 border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-[#1b1b18] dark:text-[#FDFDFC]">
                Profile Settings
            </h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1">
                Manage your account profile information, phone number, password, and security preferences.
            </p>
        </div>

        <!-- Section 1: Update Profile Information -->
        <div class="bg-white dark:bg-[#161615] p-6 sm:p-8 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs">
            <div class="max-w-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Section 2: Update Password -->
        <div class="bg-white dark:bg-[#161615] p-6 sm:p-8 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-xs">
            <div class="max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Section 3: Delete Account -->
        <div class="bg-white dark:bg-[#161615] p-6 sm:p-8 rounded-xl border border-red-200 dark:border-red-900/40 shadow-xs">
            <div class="max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-layout>
