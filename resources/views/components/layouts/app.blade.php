<x-layouts.app.sidebar>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <flux:main>
        {{ $slot }}
    </flux:main>
    <script>
    function applyTheme() {
        const theme = localStorage.getItem('theme') || 'system';

        if (
            theme === 'dark' ||
            (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    function setTheme(theme) {
        localStorage.setItem('theme', theme);
        applyTheme();
    }

    applyTheme();

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', applyTheme);
</script>
</x-layouts.app.sidebar>
