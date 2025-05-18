<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WritersHub - A platform for writers to share their voice with the world">
    <title>{{ config('app.name', 'WritersHub') }}</title>

    <!-- Preload critical assets -->
    <link rel="preload" href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style">
    <link rel="preload" href="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" as="script">

    <!-- Fonts (deferred) -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Use a lighter version of Font Awesome (only load what we need) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" rel="stylesheet">

    <!-- Alpine.js (optimized version) -->
    <script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Critical CSS inlined for faster rendering */
        :root {
            --color-primary: #4f46e5;
            --color-primary-hover: #4338ca;
            --transition-normal: 0.3s;
        }

        /* Dark mode setup for immediate application */
        .dark {
            color-scheme: dark;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                color-scheme: dark;
            }
        }

        /* Essential animations (reduced for performance) */
        .feature-card {
            transition: transform var(--transition-normal), box-shadow var(--transition-normal);
            will-change: transform;
        }

        .feature-card:hover {
            transform: translateY(-8px);
        }

        /* Hero pattern as a background image (loaded last) */
        .hero-pattern-light {
            background-color: #f9fafb;
        }

        .hero-pattern-dark {
            background-color: #111827;
        }

        /* Lazy-load non-critical patterns */
        .load-patterns {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.08'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Reduced scrollbar CSS */
        @media (min-width: 640px) {
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            ::-webkit-scrollbar-thumb {
                background: #c7d2fe;
                border-radius: 4px;
            }

            .dark ::-webkit-scrollbar-track {
                background: #1f2937;
            }

            .dark ::-webkit-scrollbar-thumb {
                background: #4f46e5;
            }
        }

        /* Transition optimizations - only transition what changes */
        .color-transition {
            transition: color var(--transition-normal), background-color var(--transition-normal), border-color var(--transition-normal);
        }

        .transform-transition {
            transition: transform var(--transition-normal);
        }
    </style>
</head>
<body
    x-data="{
        darkMode: localStorage.getItem('darkMode') === 'true' ||
                 (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches),
        mobileMenuOpen: false
    }"
    x-init="
        $watch('darkMode', val => {
            localStorage.setItem('darkMode', val);
            if (val) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });

        if (darkMode) {
            document.documentElement.classList.add('dark');
        }

        /* Feature detection for pattern background - delay loading */
        window.addEventListener('load', () => {
            requestIdleCallback(() => {
                document.querySelectorAll('.hero-pattern-light, .hero-pattern-dark').forEach(el => {
                    el.classList.add('load-patterns');
                });
            });
        });
    "
    class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col color-transition">

<!-- Navigation -->
<nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full z-50 color-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-pen-fancy text-indigo-600 dark:text-indigo-400 text-2xl mr-2"></i>
                    <span class="font-bold text-xl text-gray-900 dark:text-white">WritersHub</span>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                <a href="#features"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium color-transition">Features</a>
                <a href="#why-join"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium color-transition">Why Join</a>
                <a href="#testimonials"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium color-transition">Testimonials</a>
                <a href="#pricing"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 px-3 py-2 rounded-md text-sm font-medium color-transition">Pricing</a>

                <!-- Dark mode toggle -->
                <button @click="darkMode = !darkMode"
                        class="ml-2 p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 color-transition"
                        aria-label="Toggle dark mode">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>

                <div class="h-6 w-px bg-gray-300 dark:bg-gray-600 mx-2 color-transition"></div>

                <a href="{{ route('filament.admin.auth.login') }}"
                   class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 px-3 py-2 rounded-md text-sm font-medium color-transition">Login</a>
                <a href="{{ route('filament.admin.auth.register') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm hover:shadow-md color-transition">Get Started</a>
            </div>

            <div class="flex md:hidden items-center">
                <!-- Dark mode toggle (mobile) -->
                <button @click="darkMode = !darkMode"
                        class="mr-2 p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none color-transition"
                        aria-label="Toggle dark mode">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = true" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none color-transition">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow pt-16">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="bg-gray-800 dark:bg-gray-900 text-white color-transition">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-1">
                <div class="flex items-center">
                    <i class="fas fa-pen-fancy text-indigo-400 text-2xl mr-2"></i>
                    <span class="font-bold text-xl text-white">WritersHub</span>
                </div>
                <p class="mt-4 text-gray-300 text-sm">
                    A platform for writers to share their voice with the world. Discover, create, and connect with fellow writers.
                </p>
                <div class="mt-6 flex space-x-5">
                    <a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Resources</h3>
                <ul class="mt-4 space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Documentation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Tutorials</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Support</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Company</h3>
                <ul class="mt-4 space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Careers</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Privacy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-indigo-400 color-transition">Terms</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Newsletter</h3>
                <p class="mt-4 text-gray-400 text-sm">
                    Subscribe to get the latest writing tips and platform updates.
                </p>
                <form class="mt-4">
                    <div class="flex items-center">
                        <input type="email" id="email" name="email" placeholder="Your email"
                               class="w-full px-3 py-2 placeholder-gray-500 border border-gray-600 rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent sm:text-sm bg-gray-700 text-white color-transition">
                        <button type="submit"
                                class="flex-shrink-0 px-4 py-2 border border-transparent text-sm font-medium rounded-r-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 color-transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-12 border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm">
                &copy; 2025 WritersHub. All rights reserved.
            </p>
            <div class="mt-4 md:mt-0 flex flex-wrap justify-center gap-4">
                <a href="#" class="text-gray-400 hover:text-indigo-400 text-sm color-transition">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-indigo-400 text-sm color-transition">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-indigo-400 text-sm color-transition">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Menu (Optimized for performance) -->
<template x-teleport="body">
    <div x-show="mobileMenuOpen" @keydown.escape="mobileMenuOpen = false">
        <!-- Backdrop with reduced animation -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition-opacity duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900 bg-opacity-75 z-40"
             @click="mobileMenuOpen = false">
        </div>

        <!-- Mobile Menu Panel with optimized animation -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition transform duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition transform duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 max-w-xs w-full bg-white dark:bg-gray-800 shadow-xl p-6 z-50 color-transition">

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-pen-fancy text-indigo-600 dark:text-indigo-400 text-2xl mr-2"></i>
                    <span class="font-bold text-xl text-gray-900 dark:text-white">WritersHub</span>
                </div>
                <button @click="mobileMenuOpen = false" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none color-transition">
                    <span class="sr-only">Close menu</span>
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <nav class="mt-6 grid gap-y-8">
                <a href="#features" @click="mobileMenuOpen = false"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-base font-medium flex items-center color-transition">
                    <i class="fas fa-list-ul mr-3 text-indigo-500"></i>
                    Features
                </a>
                <a href="#why-join" @click="mobileMenuOpen = false"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-base font-medium flex items-center color-transition">
                    <i class="fas fa-users mr-3 text-indigo-500"></i>
                    Why Join
                </a>
                <a href="#testimonials" @click="mobileMenuOpen = false"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-base font-medium flex items-center color-transition">
                    <i class="fas fa-quote-left mr-3 text-indigo-500"></i>
                    Testimonials
                </a>
                <a href="#pricing" @click="mobileMenuOpen = false"
                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-base font-medium flex items-center color-transition">
                    <i class="fas fa-tag mr-3 text-indigo-500"></i>
                    Pricing
                </a>

                <div class="pt-4 border-t border-gray-200 dark:border-gray-700 color-transition">
                    <a href="{{ route('filament.admin.auth.login') }}" @click="mobileMenuOpen = false"
                       class="w-full flex items-center justify-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 py-2 text-base font-medium color-transition">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    <a href="{{ route('filament.admin.auth.register') }}" @click="mobileMenuOpen = false"
                       class="mt-3 w-full flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-3 rounded-md text-base font-medium shadow-sm color-transition">
                        <i class="fas fa-user-plus mr-2"></i> Get Started
                    </a>
                </div>
            </nav>
        </div>
    </div>
</template>

<!-- Optimized JavaScript -->
<script>
    // Smooth scroll functionality (deferred)
    document.addEventListener('DOMContentLoaded', function() {
        // Use passive event listeners for better performance
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Use requestAnimationFrame for smoother scrolling
                        const headerOffset = 80;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            }, { passive: true });
        });

        // Use Intersection Observer for lazy loading elements (if needed)
        if ('IntersectionObserver' in window) {
            const lazyItems = document.querySelectorAll('.lazy-load');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('loaded');
                        observer.unobserve(entry.target);
                    }
                });
            }, { rootMargin: '50px' });

            lazyItems.forEach(item => observer.observe(item));
        }
    });

    // Add print styles dynamically to save on initial load
    window.addEventListener('beforeprint', function() {
        const style = document.createElement('style');
        style.textContent = `
            /* Print styles */
            @media print {
                nav, footer, .no-print { display: none !important; }
                body { background: white !important; color: black !important; }
                main { padding-top: 0 !important; }
            }
        `;
        document.head.appendChild(style);
    });
</script>
</body>
</html>
