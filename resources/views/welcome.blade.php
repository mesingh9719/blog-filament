<x-layouts.app>
    <!-- Hero Section -->
    <div class="pt-24 hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                        Unleash Your <span class="text-indigo-600 dark:text-indigo-400">Writing Potential</span>
                    </h1>
                    <p class="mt-6 text-xl text-gray-600 dark:text-gray-300">
                        Join a vibrant community of writers, bloggers, and storytellers who share their passion and inspire
                        millions worldwide.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('filament.admin.auth.register') }}"
                           class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                            Start Writing Today
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#features"
                           class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-md shadow-sm text-base font-medium text-indigo-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                            Learn More
                        </a>
                    </div>
                    <div class="mt-8 flex items-center">
                        <div class="flex -space-x-2 overflow-hidden">
                            <img src="/api/placeholder/40/40" class="inline-block h-10 w-10 rounded-full ring-2 ring-white"
                                 alt="User avatar">
                            <img src="/api/placeholder/40/40" class="inline-block h-10 w-10 rounded-full ring-2 ring-white"
                                 alt="User avatar">
                            <img src="/api/placeholder/40/40" class="inline-block h-10 w-10 rounded-full ring-2 ring-white"
                                 alt="User avatar">
                            <img src="/api/placeholder/40/40" class="inline-block h-10 w-10 rounded-full ring-2 ring-white"
                                 alt="User avatar">
                        </div>
                        <div class="ml-4">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Join over 5,000+ writers
                            </span>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="/api/placeholder/600/400" alt="Writers Platform" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 dark:text-indigo-400 tracking-wide uppercase">
                    Features</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">Everything you need to
                    succeed</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                    Our platform provides powerful tools to create, share, and grow your audience.
                </p>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="feature-card rounded-lg bg-gray-50 dark:bg-gray-700 p-8 text-center">
                        <div
                            class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                            <i class="fas fa-pencil-alt text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-medium text-gray-900 dark:text-white">Intuitive Editor</h3>
                        <p class="mt-4 text-gray-500 dark:text-gray-300">
                            Write beautiful articles with our powerful rich-text editor. Format text, add images, embed
                            videos, and more.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card rounded-lg bg-gray-50 dark:bg-gray-700 p-8 text-center">
                        <div
                            class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-medium text-gray-900 dark:text-white">Analytics Dashboard</h3>
                        <p class="mt-4 text-gray-500 dark:text-gray-300">
                            Track your article performance with detailed analytics. Monitor views, reads, shares, and
                            audience demographics.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card rounded-lg bg-gray-50 dark:bg-gray-700 p-8 text-center">
                        <div
                            class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <h3 class="mt-6 text-xl font-medium text-gray-900 dark:text-white">Community Engagement</h3>
                        <p class="mt-4 text-gray-500 dark:text-gray-300">
                            Connect with readers and fellow writers. Receive comments, feedback, and build meaningful
                            relationships.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Join Section -->
    <div id="why-join" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="lg:col-span-1">
                    <h2 class="text-base font-semibold text-indigo-600 dark:text-indigo-400 tracking-wide uppercase">Why
                        Join Us</h2>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">
                        Take your writing to the next level
                    </p>
                    <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">
                        Whether you're a seasoned writer or just starting out, WritersHub provides everything you need to
                        create, grow, and monetize your content.
                    </p>

                    <div class="mt-8 space-y-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 dark:bg-indigo-500 text-white">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Global Audience</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Reach readers from around the world and build your global following.
                                </p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 dark:bg-indigo-500 text-white">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Monetization Options</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Multiple ways to earn from your content including subscriptions, tips, and premium
                                    articles.
                                </p>
                            </div>
                        </div>

                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 dark:bg-indigo-500 text-white">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">SEO Optimization</h3>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">
                                    Built-in tools to help your content rank higher in search engines.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 lg:mt-0 lg:col-span-1">
                    <img class="rounded-xl shadow-xl" src="/api/placeholder/600/400" alt="Writer working on laptop">
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div id="testimonials" class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 dark:text-indigo-400 tracking-wide uppercase">
                    Testimonials</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">Writers love our platform</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                    Discover how writers are achieving success with WritersHub.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card bg-gray-50 dark:bg-gray-700 rounded-lg p-8 shadow">
                    <div class="flex items-center mb-6">
                        <img class="h-12 w-12 rounded-full" src="/api/placeholder/50/50" alt="User avatar">
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Sarah Johnson</h4>
                            <p class="text-gray-500 dark:text-gray-300">Travel Blogger</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 flex mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-200 italic">
                        "WritersHub transformed my blogging career. The analytics tools helped me understand what content
                        resonates with my audience, and I've tripled my readership in just six months."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card bg-gray-50 dark:bg-gray-700 rounded-lg p-8 shadow">
                    <div class="flex items-center mb-6">
                        <img class="h-12 w-12 rounded-full" src="/api/placeholder/50/50" alt="User avatar">
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">David Chen</h4>
                            <p class="text-gray-500 dark:text-gray-300">Tech Writer</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 flex mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-200 italic">
                        "The editor is fantastic - so intuitive and easy to use. I love how I can embed code snippets,
                        images, and videos seamlessly. My tech tutorials have never looked better!"
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card bg-gray-50 dark:bg-gray-700 rounded-lg p-8 shadow">
                    <div class="flex items-center mb-6">
                        <img class="h-12 w-12 rounded-full" src="/api/placeholder/50/50" alt="User avatar">
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Maria Rodriguez</h4>
                            <p class="text-gray-500 dark:text-gray-300">Fiction Author</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 flex mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 dark:text-gray-200 italic">
                        "The community aspect is what makes WritersHub special. I've connected with readers who appreciate
                        my stories and fellow writers who provide valuable feedback. It's more than a platform - it's a
                        family."
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div id="pricing" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 dark:text-indigo-400 tracking-wide uppercase">
                    Pricing</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">Plans for every writer</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                    Choose the perfect plan for your writing needs.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="px-6 py-8">
                        <h3 class="text-center text-2xl font-medium text-gray-900 dark:text-white">Starter</h3>
                        <div class="mt-4 flex justify-center">
                        <span
                            class="px-3 py-1 text-xs font-semibold leading-5 bg-green-100 text-green-800 rounded-full">Free Forever</span>
                        </div>
                        <p class="mt-8 text-center">
                            <span class="text-4xl font-extrabold text-gray-900 dark:text-white">$0</span>
                            <span class="text-base font-medium text-gray-500 dark:text-gray-400">/month</span>
                        </p>
                        <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Perfect for beginners</p>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-6 bg-gray-50 dark:bg-gray-700">
                        <ul class="space-y-4">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Up to 5 articles</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Basic analytics</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Community access</span>
                            </li>
                            <li class="flex items-center opacity-50">
                                <i class="fas fa-times text-red-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Monetization</span>
                            </li>
                            <li class="flex items-center opacity-50">
                                <i class="fas fa-times text-red-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Advanced SEO tools</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <a href="{{ route('filament.admin.auth.register') }}"
                               class="block w-full bg-indigo-50 text-indigo-700 hover:bg-indigo-100 dark:bg-indigo-900 dark:text-indigo-200 dark:hover:bg-indigo-800 border border-indigo-500 rounded-md py-3 text-sm font-medium text-center transition-colors duration-300">
                                Start Writing
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pro Plan -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform scale-105 md:scale-105 z-10 transition-all duration-300 hover:shadow-xl border-2 border-indigo-500">
                    <div class="px-6 py-8">
                        <h3 class="text-center text-2xl font-medium text-gray-900 dark:text-white">Professional</h3>
                        <div class="mt-4 flex justify-center">
                        <span
                            class="px-3 py-1 text-xs font-semibold leading-5 bg-indigo-100 text-indigo-800 rounded-full">Most Popular</span>
                        </div>
                        <p class="mt-8 text-center">
                            <span class="text-4xl font-extrabold text-gray-900 dark:text-white">$15</span>
                            <span class="text-base font-medium text-gray-500 dark:text-gray-400">/month</span>
                        </p>
                        <p class="mt-4 text-center text-gray-500 dark:text-gray-300">For serious writers</p>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-6 bg-gray-50 dark:bg-gray-700">
                        <ul class="space-y-4">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Unlimited articles</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Advanced analytics</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Priority community support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Monetization options</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Basic SEO tools</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <a href="{{ route('filament.admin.auth.register') }}"
                               class="block w-full bg-indigo-600 hover:bg-indigo-700 border border-transparent rounded-md py-3 text-sm font-medium text-white text-center transition-colors duration-300">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="px-6 py-8">
                        <h3 class="text-center text-2xl font-medium text-gray-900 dark:text-white">Premium</h3>
                        <div class="mt-4 flex justify-center">
                        <span
                            class="px-3 py-1 text-xs font-semibold leading-5 bg-purple-100 text-purple-800 rounded-full">For Experts</span>
                        </div>
                        <p class="mt-8 text-center">
                            <span class="text-4xl font-extrabold text-gray-900 dark:text-white">$29</span>
                            <span class="text-base font-medium text-gray-500 dark:text-gray-400">/month</span>
                        </p>
                        <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Professional writers</p>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-6 bg-gray-50 dark:bg-gray-700">
                        <ul class="space-y-4">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Everything in Professional</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Custom domain</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Advanced SEO tools</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">Priority support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-300">AI writing assistant</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <a href="{{ route('filament.admin.auth.register') }}"
                               class="block w-full bg-indigo-50 text-indigo-700 hover:bg-indigo-100 dark:bg-indigo-900 dark:text-indigo-200 dark:hover:bg-indigo-800 border border-indigo-500 rounded-md py-3 text-sm font-medium text-center transition-colors duration-300">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-700 dark:bg-indigo-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to start your writing journey?</span>
                <span class="block text-indigo-200">Join thousands of writers today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('filament.admin.auth.register') }}"
                       class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-white hover:bg-indigo-50 transition-colors duration-300">
                        Get Started
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="#features"
                       class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 bg-opacity-60 hover:bg-opacity-70 transition-colors duration-300">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white dark:bg-gray-800 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 dark:text-indigo-400 tracking-wide uppercase">FAQ</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">Frequently asked questions</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                    Everything you need to know about WritersHub.
                </p>
            </div>

            <div class="mt-12 max-w-3xl mx-auto">
                <div class="space-y-6">
                    <!-- FAQ Item 1 -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            What type of content can I publish?
                        </h3>
                        <div class="mt-4 text-gray-600 dark:text-gray-300">
                            <p>You can publish a wide variety of content including blog posts, articles, news, stories,
                                poems, and tutorials. Our platform supports text, images, videos, and code snippets to make
                                your content engaging and dynamic.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            How do I monetize my content?
                        </h3>
                        <div class="mt-4 text-gray-600 dark:text-gray-300">
                            <p>Professional and Premium plans offer multiple monetization options including member-only
                                content, tipping, and affiliate marketing opportunities. You can set up your payment methods
                                in your dashboard and start earning from your writing.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            Can I migrate my existing blog?
                        </h3>
                        <div class="mt-4 text-gray-600 dark:text-gray-300">
                            <p>Yes! We offer import tools to help you migrate content from WordPress, Medium, Substack, and
                                other platforms. Your articles, images, and comments can be transferred seamlessly to
                                maintain your existing audience.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            What about copyright and ownership?
                        </h3>
                        <div class="mt-4 text-gray-600 dark:text-gray-300">
                            <p>You retain full ownership and copyright of all content you publish on WritersHub. We never
                                claim rights to your work, and you're free to republish it elsewhere or remove it from our
                                platform at any time.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
