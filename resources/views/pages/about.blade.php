<x-layouts.app>
    <div class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-neutral-900 dark:text-neutral-100">About noteFlow</h1>
            <p class="mt-4 text-lg text-neutral-600 dark:text-neutral-400">
                Discover our mission and values
            </p>
        </div>

        <!-- Mission Section -->
        <div class="mb-12 rounded-xl border border-neutral-200 bg-white p-8 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <h2 class="mb-4 text-2xl font-bold text-neutral-900 dark:text-neutral-100">Our Mission</h2>
            <p class="text-neutral-700 dark:text-neutral-300">
                noteFlow is designed to empower users with a simple, secure, and elegant note-taking experience. We believe that capturing and sharing ideas should be effortless, whether you're jotting down quick thoughts or crafting detailed notes.
            </p>
        </div>

        <!-- Features Section -->
        <div class="mb-12 mt-40">
            <h2 class="mb-8 mt-12 text-2xl font-bold text-neutral-900 dark:text-neutral-100">What Makes noteFlow Special</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Feature 1 -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                    <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">⚡ Fast & Simple</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Create, edit, and manage notes with a clean, distraction-free interface designed for productivity.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                    <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">🔗 Easy Sharing</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Share your notes on multiple platforms with a single click. Support for WhatsApp, Facebook, Twitter, and more.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                    <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">🔒 Secure by Default</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Your notes are encrypted and stored securely. Only you and those you choose to share with can access your content.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                    <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">✨ Always Evolving</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        We continuously improve noteFlow based on user feedback and emerging technologies.
                    </p>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="mb-16 mt-48 rounded-xl border border-neutral-200 bg-white p-8 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <h2 class="mb-4 text-2xl font-bold text-neutral-900 dark:text-neutral-100">Our Values</h2>
            <ul class="space-y-3 text-neutral-700 dark:text-neutral-300">
                <li class="flex items-start">
                    <span class="mr-3 text-blue-600 dark:text-blue-400">✓</span>
                    <span><strong>Privacy First:</strong> Your data is yours. We never sell or misuse your information.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-3 text-blue-600 dark:text-blue-400">✓</span>
                    <span><strong>User-Centric Design:</strong> Every feature is designed with our users in mind.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-3 text-blue-600 dark:text-blue-400">✓</span>
                    <span><strong>Transparency:</strong> We're open about how noteFlow works and how we operate.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-3 text-blue-600 dark:text-blue-400">✓</span>
                    <span><strong>Continuous Improvement:</strong> We listen to feedback and constantly enhance our platform.</span>
                </li>
            </ul>
        </div>

        <!-- CTA -->
        <div class="mt-12 text-center">
            <p class="mb- text-neutral-600 dark:text-neutral-400">Have questions? We'd love to hear from you.</p>
            <a href="{{ route('contact') }}" class="inline-block rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700">
                Contact Us
            </a>
        </div>
    </div>
</x-layouts.app>
