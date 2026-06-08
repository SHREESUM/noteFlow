<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $note->title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-100 text-neutral-900 dark:bg-neutral-950 dark:text-neutral-100">
    <main class="mx-auto max-w-3xl px-6 py-12">
        <article class="rounded-2xl border border-neutral-200 bg-white p-8 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
            <p class="mb-3 text-sm text-neutral-500 dark:text-neutral-400">
                Published {{ $note->published_at->format('M d, Y') }}
            </p>

            <h1 class="mb-6 text-3xl font-bold">
                {{ $note->title }}
            </h1>

            <div class="whitespace-pre-line leading-7 text-neutral-700 dark:text-neutral-300">
                {{ $note->body }}
            </div>
        </article>
    </main>
</body>
</html>