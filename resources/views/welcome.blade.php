<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>noteFlow</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=geist-sans:100,400,500,600,700&display=swap" rel="stylesheet" />

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            :root {
                --bg-light: #fafafa;
                --bg-dark: #0a0a0a;
                --text-light: #1a1a1a;
                --text-dark: #f5f5f5;
                --border-light: #e5e5e5;
                --border-dark: #2a2a2a;
            }

            @media (prefers-color-scheme: dark) {
                :root {
                    color-scheme: dark;
                }
            }

            html {
                font-family: 'Geist Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
                    'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
            }

            body {
                background: var(--bg-light);
                color: var(--text-light);
                line-height: 1.6;
                transition: background-color 0.3s, color 0.3s;
            }

            @media (prefers-color-scheme: dark) {
                body {
                    background: var(--bg-dark);
                    color: var(--text-dark);
                }
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }

            header {
                border-bottom: 1px solid var(--border-light);
                padding: 1.5rem 0;
                position: sticky;
                top: 0;
                background: rgba(250, 250, 250, 0.8);
                backdrop-filter: blur(10px);
                z-index: 50;
            }

            @media (prefers-color-scheme: dark) {
                header {
                    border-bottom-color: var(--border-dark);
                    background: rgba(10, 10, 10, 0.8);
                }
            }

            .header-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 700;
                letter-spacing: -0.02em;
            }

            nav {
                display: flex;
                gap: 1rem;
                align-items: center;
            }

            nav a {
                text-decoration: none;
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                font-weight: 500;
                transition: all 0.3s;
                color: var(--text-light);
            }

            @media (prefers-color-scheme: dark) {
                nav a {
                    color: var(--text-dark);
                }
            }

            nav a:hover {
                background: var(--border-light);
            }

            @media (prefers-color-scheme: dark) {
                nav a:hover {
                    background: var(--border-dark);
                }
            }

            nav a.btn-primary {
                background: #0066cc;
                color: white;
                padding: 0.5rem 1.25rem;
            }

            nav a.btn-primary:hover {
                background: #0052a3;
            }

            .hero {
                padding: 3rem 0;
                text-align: center;
            }

            .hero h1 {
                font-size: 3.5rem;
                font-weight: 700;
                line-height: 1.1;
                margin-bottom: 1rem;
                letter-spacing: -0.02em;
            }

            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2rem;
                }
            }

            .hero p {
                font-size: 1.25rem;
                color: #666;
                margin-bottom: 2rem;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                line-height: 1.8;
            }

            @media (prefers-color-scheme: dark) {
                .hero p {
                    color: #999;
                }
            }

            .cta-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
                margin-bottom: 4rem;
            }

            .btn {
                padding: 0.75rem 1.75rem;
                border-radius: 0.5rem;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s;
                border: none;
                cursor: pointer;
                font-size: 1rem;
            }

            .btn-primary {
                background: #0066cc;
                color: white;
            }

            .btn-primary:hover {
                background: #0052a3;
            }

            .btn-secondary {
                background: var(--border-light);
                color: var(--text-light);
                border: 1px solid var(--border-light);
            }

            @media (prefers-color-scheme: dark) {
                .btn-secondary {
                    background: var(--border-dark);
                    color: var(--text-dark);
                    border-color: var(--border-dark);
                }
            }

            .btn-secondary:hover {
                background: #e0e0e0;
            }

            @media (prefers-color-scheme: dark) {
                .btn-secondary:hover {
                    background: #3a3a3a;
                }
            }

            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-top: 2rem;
                padding: 2rem 0;
                border-top: 1px solid var(--border-light);
                border-bottom: 1px solid var(--border-light);
            }

            @media (prefers-color-scheme: dark) {
                .features {
                    border-top-color: var(--border-dark);
                    border-bottom-color: var(--border-dark);
                }
            }

            .feature {
                text-align: center;
            }

            .feature-icon {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .feature h3 {
                font-size: 1.125rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .feature p {
                font-size: 0.95rem;
                color: #666;
            }

            @media (prefers-color-scheme: dark) {
                .feature p {
                    color: #999;
                }
            }

            footer {
                border-top: 1px solid var(--border-light);
                padding: 10px 0;
                margin-top: 10px;
                text-align: center;
                color: #999;
                font-size: 0.875rem;
            }

            @media (prefers-color-scheme: dark) {
                footer {
                    border-top-color: var(--border-dark);
                }
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="header-content">
                    <div class="logo">noteFlow</div>
                    @if (Route::has('login'))
                        <nav>
                            @auth
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary">Register</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <section class="hero">
                    <h1>Your Notes, Your Way</h1>
                    <p>
                        A simple, secure, and beautiful note-taking app. Create, organize, and share your thoughts with ease.
                    </p>

                    @if (Route::has('register'))
                        <div class="cta-buttons">
                            <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
                            <a href="{{ route('login') }}" class="btn btn-secondary">Sign In</a>
                        </div>
                    @endif

                    <div class="features">
                        <div class="feature">
                            <div class="feature-icon">📝</div>
                            <h3>Fast & Simple</h3>
                            <p>Distraction-free writing focused on what matters.</p>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">🔗</div>
                            <h3>Easy Sharing</h3>
                            <p>Share notes with unique tokens. No login required.</p>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">🛡️</div>
                            <h3>Secure by Default</h3>
                            <p>Your notes are private until you choose to share.</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <footer>
                <p>&copy; 2026 noteFlow. All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>
