<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        @if (session('success'))
            <div class="rounded-xl border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-green-950 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-xl border border-red-300 bg-red-50 p-4 text-sm text-red-800 dark:border-red-800 dark:bg-red-950 dark:text-red-200">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <h1 class="mb-4 text-2xl font-bold text-neutral-900 dark:text-neutral-100">
                {{ isset($note) ? 'Edit Note' : 'Create a Note' }}
            </h1>

            <form method="POST" action="{{ isset($note) ? route('notes.update', $note) : route('notes.store') }}" class="space-y-4">
                @csrf
                @if (isset($note))
                    @method('PATCH')
                @endif

                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Title
                    </label>

                    <input
                        id="title"
                        name="title"
                        type="text"
                        value="{{ isset($note) ? $note->title : old('title') }}"
                        placeholder="Enter note title"
                        class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-neutral-900 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100"
                        required
                    >
                </div>

                <div>
                    <label for="body" class="mb-1 block text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        Note
                    </label>

                    <textarea
                        id="body"
                        name="body"
                        rows="6"
                        placeholder="Write your note here..."
                        class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-neutral-900 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100"
                        required
                    >{{ isset($note) ? $note->body : old('body') }}</textarea>
                </div>

                <div class="flex gap-2">
                    <button
                        type="submit"
                        class="flex-1 rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        {{ isset($note) ? 'Update Note' : 'Save Note' }}
                    </button>
                    @if (isset($note))
                        <a
                            href="{{ route('dashboard') }}"
                            class="flex-1 rounded-lg border border-neutral-300 px-5 py-2 text-center text-sm font-semibold text-neutral-700 hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800"
                        >
                            Cancel
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-neutral-100">
                My Notes
            </h2>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($notes as $note)
                    <div class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
                        <div class="mb-3">
                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">
                                {{ $note->title }}
                            </h3>

                            <p class="mt-2 whitespace-pre-line text-sm text-neutral-600 dark:text-neutral-400">
                                {{ \Illuminate\Support\Str::limit($note->body, 220) }}
                            </p>
                        </div>

                        @if ($note->isPublished())
                            <div class="mb-3 rounded-lg bg-green-50 p-3 text-sm text-green-800 dark:bg-green-950 dark:text-green-200">
                                <p class="font-semibold">Published</p>

                                <a
                                    href="{{ route('notes.public.show', $note->share_token) }}"
                                    target="_blank"
                                    class="mt-1 block break-all underline"
                                >
                                    {{ route('notes.public.show', $note->share_token) }}
                                </a>
                            </div>

                            <!-- Social Sharing Buttons -->
                            <div class="mb-3 rounded-lg bg-blue-50 p-3 dark:bg-blue-950">
                                <p class="mb-2 text-xs font-semibold text-blue-800 dark:text-blue-200">Share on:</p>
                                <div class="flex flex-wrap gap-2">
                                    @php
                                        $shareUrl = route('notes.public.show', $note->share_token);
                                        $shareTitle = $note->title;
                                    @endphp

                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/?text={{ urlencode($shareTitle . ' - ' . $shareUrl) }}" target="_blank" title="WhatsApp" class="inline-flex items-center justify-center rounded bg-green-500 text-white hover:bg-green-600 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.967 1.523 9.9 9.9 0 00-3.203 3.702 9.97 9.97 0 001.526 11.285 9.87 9.87 0 004.967 1.523h.005a9.87 9.87 0 004.967-1.523 9.9 9.9 0 003.203-3.702 9.97 9.97 0 00-1.526-11.285 9.87 9.87 0 00-4.967-1.523m0-2.382a12.25 12.25 0 016.17 1.895 12.26 12.26 0 013.986 4.591 12.3 12.3 0 01-1.886 13.973 12.25 12.25 0 01-6.17 1.895h-.007a12.25 12.25 0 01-6.17-1.895 12.26 12.26 0 01-3.986-4.591 12.3 12.3 0 011.886-13.973 12.25 12.25 0 016.17-1.895"/></svg>
                                    </a>

                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" title="Facebook" class="inline-flex items-center justify-center rounded bg-blue-600 text-white hover:bg-blue-700 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>

                                    <!-- Twitter/X -->
                                    <a href="https://x.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($shareTitle) }}" target="_blank" title="X (Twitter)" class="inline-flex items-center justify-center rounded bg-black text-white hover:bg-gray-800 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.6l-5.193-6.791-5.822 6.791h-3.308l7.73-8.835L2.55 2.25h6.556l4.702 6.217 5.436-6.217zM17.15 18.803h1.828L5.792 4.104H3.81l13.34 14.699z"/></svg>
                                    </a>

                                    <!-- Telegram -->
                                    <a href="https://t.me/share/url?url={{ urlencode($shareUrl) }}&text={{ urlencode($shareTitle) }}" target="_blank" title="Telegram" class="inline-flex items-center justify-center rounded bg-blue-400 text-white hover:bg-blue-500 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.96 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.485-1.313.474-.431-.008-1.252-.241-1.865-.44-.795-.24-1.427-.374-1.37-.789.026-.216.324-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                                    </a>

                                    <!-- LinkedIn -->
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}" target="_blank" title="LinkedIn" class="inline-flex items-center justify-center rounded bg-blue-700 text-white hover:bg-blue-800 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                                    </a>

                                    <!-- Reddit -->
                                    <a href="https://reddit.com/submit?url={{ urlencode($shareUrl) }}&title={{ urlencode($shareTitle) }}" target="_blank" title="Reddit" class="inline-flex items-center justify-center rounded bg-orange-600 text-white hover:bg-orange-700 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.53l.375-1.844.727.16c.16.365.264.712.564 1.456.3.744.468 1.135.922 1.135.373 0 .769-.206 1.022-.461.253-.254.464-.708.497-1.052a1.251 1.251 0 1 1 2.476.224c0 .651-.278 1.235-.639 1.582.167.04.328.081.481.081 1.687 0 3.058-1.086 3.058-2.422 0-.359-.066-.716-.205-1.052zm-7.747 1.854a.524.524 0 1 1 .587.522.524.524 0 0 1-.587-.522zm4.872 0a.525.525 0 1 1 .588.524.525.525 0 0 1-.588-.524zm7.23 6.779c-.601.165-1.207.398-1.772.645a.529.529 0 0 0 .179 1.038c.53-.199 1.05-.426 1.54-.658a.529.529 0 1 0-.947-.025zm2.01-1.557a.529.529 0 0 0-.118.993c.52.165 1.03.391 1.505.634a.529.529 0 1 0 .449-.897c-.47-.276-.989-.514-1.518-.694a.527.527 0 0 0-.318.064zm1.315-1.326a.529.529 0 0 0-.401.955c.354.318.693.68.988 1.075a.529.529 0 1 0 .849-.65c-.325-.412-.681-.787-1.06-1.118a.529.529 0 0 0-.376-.262zm-1.787-8.676a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5z"/></svg>
                                    
                                    <!-- Email -->
                                    <a href="mailto:?subject={{ urlencode($shareTitle) }}&body={{ urlencode($shareUrl) }}" title="Email" class="inline-flex items-center justify-center rounded bg-red-500 text-white hover:bg-red-600 transition w-9 h-9">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                    </a>
                                </div>
                            </div>
                        @else
                            <form method="POST" action="{{ route('notes.publish', $note) }}" class="mb-3">
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="w-full rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700"
                                >
                                    Publish Note
                                </button>
                            </form>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a
                                href="{{ route('notes.edit', $note) }}"
                                class="flex-1 rounded-lg bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-blue-700 transition"
                            >
                                Edit
                            </a>

                            <form method="POST" action="{{ route('notes.destroy', $note) }}" class="flex-1">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Delete this note?')"
                                    class="w-full rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white hover:bg-red-700 transition"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="rounded-xl border border-dashed border-neutral-300 p-6 text-neutral-500 dark:border-neutral-700 dark:text-neutral-400">
                        You have not created any notes yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.app>