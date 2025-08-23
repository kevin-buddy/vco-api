<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #EAEDED;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #a8a8a8; }

        .amazon-blue { background-color: #131921; }
        .amazon-yellow { background-color: #FEBD69; }
        .amazon-yellow-dark { background-color: #F3A847; }
        .amazon-light-blue { background-color: #232F3E; }
        .amazon-footer-bg { background-color: #232F3E; }
        .amazon-footer-bottom-bg { background-color: #131A22; }

        /* Accordion styles for mobile footer */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        /* Transition for filter sidebar */
        #filter-content {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Main Header -->
    <header class="amazon-blue text-white sticky top-0 z-40">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold border-2 border-transparent hover:border-white p-2 rounded-sm">Tokoshop</a>

            <!-- Search Bar -->
            <div class="hidden md:flex flex-grow mx-4">
                <select class="bg-gray-200 text-black text-sm rounded-l-md border-r border-gray-300 px-2">
                    <option>All</option>
                    <option>Electronics</option>
                    <option>Books</option>
                    <option>Home</option>
                </select>
                <input type="text" placeholder="Search Tokoshop..." class="w-full p-2 text-black focus:outline-none">
                <button class="amazon-yellow hover:amazon-yellow-dark text-black p-2 rounded-r-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </div>

            <!-- Right Side Links -->
            <div class="flex items-center space-x-4">
                <a href="#" class="hidden sm:block border-2 border-transparent hover:border-white p-2 rounded-sm">
                    <div>Hello, Sign in</div>
                    <div class="font-bold">Account & Lists</div>
                </a>
                <a href="#" class="hidden lg:block border-2 border-transparent hover:border-white p-2 rounded-sm">
                    <div>Returns</div>
                    <div class="font-bold">& Orders</div>
                </a>
                <a href="#" class="flex items-end border-2 border-transparent hover:border-white p-2 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="font-bold text-lg text-amazon-yellow ml-1">0</span>
                </a>
            </div>
        </div>
        <!-- Search Bar for Mobile -->
        <div class="md:hidden px-4 pb-2">
            <div class="flex flex-grow">
                <input type="text" placeholder="Search Tokoshop..." class="w-full p-2 text-black rounded-l-md focus:outline-none">
                <button class="amazon-yellow hover:amazon-yellow-dark text-black p-2 rounded-r-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Sub Header -->
    <nav class="amazon-light-blue text-white">
        <div class="container mx-auto px-4 py-2 flex items-center space-x-4 text-sm">
            <button class="flex items-center font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>All</button>
            <a href="#" class="hover:underline">Today's Deals</a>
            <a href="#" class="hover:underline">Customer Service</a>
            <a href="#" class="hover:underline">Registry</a>
            <a href="#" class="hover:underline">Gift Cards</a>
            <a href="#" class="hover:underline">Sell</a>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="text-white">
        <!-- Back to Top -->
        <div class="bg-gray-700 hover:bg-gray-600 cursor-pointer" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
            <p class="text-center py-4 text-sm">Back to top</p>
        </div>

        <!-- Main Footer Links -->
        <div class="amazon-footer-bg py-10">
            <div class="container mx-auto px-4">
                <!-- Desktop Grid -->
                <div class="hidden md:grid grid-cols-2 lg:grid-cols-4 gap-8 text-sm">
                    <div>
                        <h3 class="font-bold mb-2">Get to Know Us</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><a href="#" class="hover:underline">Careers</a></li>
                            <li><a href="#" class="hover:underline">Blog</a></li>
                            <li><a href="#" class="hover:underline">About Tokoshop</a></li>
                            <li><a href="#" class="hover:underline">Investor Relations</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Make Money with Us</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><a href="#" class="hover:underline">Sell products on Tokoshop</a></li>
                            <li><a href="#" class="hover:underline">Sell on Tokoshop Business</a></li>
                            <li><a href="#" class="hover:underline">Become an Affiliate</a></li>
                            <li><a href="#" class="hover:underline">Advertise Your Products</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Tokoshop Payment Products</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><a href="#" class="hover:underline">Tokoshop Business Card</a></li>
                            <li><a href="#" class="hover:underline">Shop with Points</a></li>
                            <li><a href="#" class="hover:underline">Reload Your Balance</a></li>
                            <li><a href="#" class="hover:underline">Tokoshop Currency Converter</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold mb-2">Let Us Help You</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><a href="#" class="hover:underline">Your Account</a></li>
                            <li><a href="#" class="hover:underline">Your Orders</a></li>
                            <li><a href="#" class="hover:underline">Shipping Rates & Policies</a></li>
                            <li><a href="#" class="hover:underline">Returns & Replacements</a></li>
                            <li><a href="#" class="hover:underline">Help</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Mobile Accordion -->
                <div class="md:hidden text-sm">
                    <div class="border-b border-gray-600 py-3">
                        <button class="accordion-header w-full flex justify-between items-center font-bold">
                            <span>Get to Know Us</span>
                            <span>+</span>
                        </button>
                        <div class="accordion-content pt-2">
                            <ul class="space-y-2 text-gray-300 pl-2">
                                <li><a href="#" class="hover:underline">Careers</a></li>
                                <li><a href="#" class="hover:underline">Blog</a></li>
                                <li><a href="#" class="hover:underline">About Tokoshop</a></li>
                                <li><a href="#" class="hover:underline">Investor Relations</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-gray-600 py-3">
                         <button class="accordion-header w-full flex justify-between items-center font-bold">
                            <span>Make Money with Us</span>
                            <span>+</span>
                        </button>
                        <div class="accordion-content pt-2">
                            <ul class="space-y-2 text-gray-300 pl-2">
                                <li><a href="#" class="hover:underline">Sell products on Tokoshop</a></li>
                                <li><a href="#" class="hover:underline">Sell on Tokoshop Business</a></li>
                                <li><a href="#" class="hover:underline">Become an Affiliate</a></li>
                                <li><a href="#" class="hover:underline">Advertise Your Products</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-gray-600 py-3">
                        <button class="accordion-header w-full flex justify-between items-center font-bold">
                            <span>Tokoshop Payment Products</span>
                            <span>+</span>
                        </button>
                        <div class="accordion-content pt-2">
                            <ul class="space-y-2 text-gray-300 pl-2">
                                <li><a href="#" class="hover:underline">Tokoshop Business Card</a></li>
                                <li><a href="#" class="hover:underline">Shop with Points</a></li>
                                <li><a href="#" class="hover:underline">Reload Your Balance</a></li>
                                <li><a href="#" class="hover:underline">Tokoshop Currency Converter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-gray-600 py-3">
                        <button class="accordion-header w-full flex justify-between items-center font-bold">
                            <span>Let Us Help You</span>
                            <span>+</span>
                        </button>
                        <div class="accordion-content pt-2">
                            <ul class="space-y-2 text-gray-300 pl-2">
                                <li><a href="#" class="hover:underline">Your Account</a></li>
                                <li><a href="#" class="hover:underline">Your Orders</a></li>
                                <li><a href="#" class="hover:underline">Shipping Rates & Policies</a></li>
                                <li><a href="#" class="hover:underline">Returns & Replacements</a></li>
                                <li><a href="#" class="hover:underline">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="amazon-footer-bottom-bg py-6">
            <div class="container mx-auto px-4 text-center text-gray-300 text-xs">
                <p>&copy; 2025, Tokoshop.com, Inc. or its affiliates</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile footer accordion
            const accordions = document.querySelectorAll('.accordion-header');
            accordions.forEach(accordion => {
                accordion.addEventListener('click', function () {
                    this.classList.toggle('active');
                    const content = this.nextElementSibling;
                    const indicator = this.querySelector('span:last-child');

                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        indicator.textContent = '+';
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                        indicator.textContent = '-';
                    }
                });
            });

            // Mobile filter sidebar functionality
            const filterSidebar = document.getElementById('filter-sidebar');
            const filterContent = document.getElementById('filter-content');
            const showFilterBtn = document.getElementById('show-filter-btn');
            const doneFilterBtn = document.getElementById('done-filter-btn');
            const closeFilterBtn = document.getElementById('close-filter-btn');

            const openFilter = () => {
                filterSidebar.classList.remove('hidden');
                // Use a timeout to allow the display property to change before starting the transition
                setTimeout(() => {
                    filterContent.classList.remove('-translate-x-full');
                }, 10);
            };

            const closeFilter = () => {
                filterContent.classList.add('-translate-x-full');
                // Hide the overlay after the transition completes
                setTimeout(() => {
                    filterSidebar.classList.add('hidden');
                }, 300);
            };

            showFilterBtn.addEventListener('click', openFilter);
            doneFilterBtn.addEventListener('click', closeFilter);
            closeFilterBtn.addEventListener('click', closeFilter);

            // Close filter if user clicks on the background overlay
            filterSidebar.addEventListener('click', function(event) {
                if (event.target === filterSidebar) {
                    closeFilter();
                }
            });
        });
    </script>

</body>
</html>
