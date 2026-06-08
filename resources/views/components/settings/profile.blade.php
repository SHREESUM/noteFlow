<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-neutral-100">
                Profile
            </h1>

            <a
                href="{{ route('dashboard') }}"
                class="rounded-lg bg-neutral-900 px-4 py-2 text-sm font-semibold text-white hover:bg-neutral-700 dark:bg-neutral-100 dark:text-neutral-900 dark:hover:bg-neutral-300"
            >
                Back to Dashboard
            </a>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('settings.profile') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white">
                Profile
            </a>

            <a href="{{ route('settings.appearance') }}" class="rounded-lg border border-neutral-300 px-4 py-2 text-sm dark:border-neutral-700">
                Appearance
            </a>

            <a href="{{ route('settings.password') }}" class="rounded-lg border border-neutral-300 px-4 py-2 text-sm dark:border-neutral-700">
                Password
            </a>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="space-y-3 text-neutral-700 dark:text-neutral-300">
                <p>
                    <strong>Name:</strong> {{ auth()->user()->name }}
                </p>

                <p>
                    <strong>Email:</strong> {{ auth()->user()->email }}
                </p>

            </div>
        </div>
    </div>
</x-layouts.app>