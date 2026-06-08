<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="rounded-xl border border-neutral-200 bg-white p-8 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <h1 class="mb-2 text-3xl font-bold text-neutral-900 dark:text-neutral-100">
                Welcome to {{ config('app.name') }}
            </h1>
            <p class="mb-6 text-neutral-600 dark:text-neutral-400">
                Your personal note-taking and sharing platform
            </p>

            <div class="space-y-4">
                <div class="rounded-lg bg-neutral-50 p-4 dark:bg-neutral-800">
                    <h2 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                        📝 Create Notes
                    </h2>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                        Write and organize your thoughts with a simple, distraction-free editor.
                    </p>
                </div>

                <div class="rounded-lg bg-neutral-50 p-4 dark:bg-neutral-800">
                    <h2 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                        🔗 Share Securely
                    </h2>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                        Generate unique share tokens to publicly share your notes without authentication.
                    </p>
                </div>

                <div class="rounded-lg bg-neutral-50 p-4 dark:bg-neutral-800">
                    <h2 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                        🛡️ Private by Default
                    </h2>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400">
                        All notes are private until you choose to publish them.
                    </p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-blue-200 bg-blue-50 p-6 dark:border-blue-800 dark:bg-blue-950">
            <p class="text-sm text-blue-900 dark:text-blue-200">
                <strong>Get started:</strong> Head to your dashboard to create your first note!
            </p>
        </div>
    </div>
</x-layouts.app>
