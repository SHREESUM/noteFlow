<x-layouts.app>
    <div class="mx-auto max-w-2xl px-4 py-12 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-neutral-900 dark:text-neutral-100">Contact Us</h1>
            <p class="mt-2 text-lg text-neutral-600 dark:text-neutral-400">
                Have a question or feedback? We'd love to hear from you.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-green-950 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-xl border border-red-300 bg-red-50 p-4 text-sm text-red-800 dark:border-red-800 dark:bg-red-950 dark:text-red-200">
                {{ session('error') }}
            </div>
        @endif

        <!-- Contact Form -->
        <div class="rounded-xl border border-neutral-200 bg-white p-8 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Full Name
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        placeholder="Your name"
                        class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-neutral-900 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 @error('name') border-red-500 @enderror"
                        required
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Email Address
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="your@email.com"
                        class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-neutral-900 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 @error('email') border-red-500 @enderror"
                        required
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject Field -->
                <div>
                    <label for="subject" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Subject
                    </label>
                    <input
                        id="subject"
                        name="subject"
                        type="text"
                        value="{{ old('subject') }}"
                        placeholder="What is this about?"
                        class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-neutral-900 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 @error('subject') border-red-500 @enderror"
                        required
                    >
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message Field -->
                <div>
                    <label for="message" class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Message
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="8"
                        placeholder="Tell us what's on your mind..."
                        class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-neutral-900 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 @error('message') border-red-500 @enderror"
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="flex-1 rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700 transition"
                    >
                        Send Message
                    </button>
                    <a
                        href="{{ route('home') }}"
                        class="flex-1 rounded-lg border border-neutral-300 px-6 py-3 text-center font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 transition"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Additional Info -->
        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">Response Time</h3>
                <p class="text-neutral-600 dark:text-neutral-400">
                    We typically respond to inquiries within 24-48 hours. Thank you for your patience!
                </p>
            </div>

            <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
                <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">Privacy</h3>
                <p class="text-neutral-600 dark:text-neutral-400">
                    Your information is confidential and will only be used to respond to your inquiry.
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>
