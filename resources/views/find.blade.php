@extends('layouts.app')

@section('judul', 'Search')

{{-- @section('header')
    @include('includes.header_user')
@endsection --}}

@section('content')
    <!-- Main Content -->
    <main class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row md:space-x-4">

            <!-- Filters Sidebar -->
            <aside id="filter-sidebar" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 md:relative md:block md:bg-transparent md:inset-auto md:z-auto">
                <div id="filter-content" class="bg-white h-full w-4/5 max-w-sm p-4 overflow-y-auto transform -translate-x-full md:transform-none md:w-full md:max-w-none md:h-auto md:relative md:rounded-lg md:shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Filters</h2>
                        <button id="close-filter-btn" class="md:hidden text-gray-500 hover:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2">Department</h3>
                        <ul class="space-y-1 text-sm">
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">Electronics</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">Computers & Accessories</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">Smart Home</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">Arts & Crafts</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">Books</a></li>
                        </ul>
                    </div>
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2">Customer Reviews</h3>
                        <ul class="space-y-1">
                            <li class="flex items-center"><a href="#" class="flex items-center text-yellow-500 hover:text-orange-600"><span class="flex">★★★★</span><span class="text-gray-600">& up</span></a></li>
                            <li class="flex items-center"><a href="#" class="flex items-center text-yellow-500 hover:text-orange-600"><span class="flex">★★★</span><span class="text-gray-400">★</span><span class="text-gray-600">& up</span></a></li>
                            <li class="flex items-center"><a href="#" class="flex items-center text-yellow-500 hover:text-orange-600"><span class="flex">★★</span><span class="text-gray-400">★★</span><span class="text-gray-600">& up</span></a></li>
                             <li class="flex items-center"><a href="#" class="flex items-center text-yellow-500 hover:text-orange-600"><span class="flex">★</span><span class="text-gray-400">★★★</span><span class="text-gray-600">& up</span></a></li>
                        </ul>
                    </div>
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2">Brand</h3>
                        <ul class="space-y-1 text-sm">
                            <li><label class="flex items-center"><input type="checkbox" class="form-checkbox h-4 w-4 text-orange-600 rounded-sm mr-2"> BrandA</label></li>
                            <li><label class="flex items-center"><input type="checkbox" class="form-checkbox h-4 w-4 text-orange-600 rounded-sm mr-2"> BrandB</label></li>
                            <li><label class="flex items-center"><input type="checkbox" class="form-checkbox h-4 w-4 text-orange-600 rounded-sm mr-2"> BrandC</label></li>
                            <li><label class="flex items-center"><input type="checkbox" class="form-checkbox h-4 w-4 text-orange-600 rounded-sm mr-2"> BrandD</label></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2">Price</h3>
                        <ul class="space-y-1 text-sm">
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">Under $25</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">$25 to $50</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">$50 to $100</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">$100 to $200</a></li>
                            <li><a href="#" class="text-gray-700 hover:text-orange-600">$200 & Above</a></li>
                        </ul>
                    </div>
                    <div class="mt-6 md:hidden">
                        <button id="done-filter-btn" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-2 px-4 rounded-lg">Done</button>
                    </div>
                </div>
            </aside>

            <!-- Search Results -->
            <div class="w-full md:w-3/4 lg:w-4/5">
                <!-- Mobile Filter Button -->
                <div class="md:hidden mb-4">
                    <button id="show-filter-btn" class="w-full bg-white p-2 rounded-lg shadow-sm flex items-center justify-center text-gray-700 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" /></svg>
                        Filter Results
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <h1 class="text-2xl font-bold">Results for "{{ $search }}"</h1>
                    <p class="text-sm text-gray-600 mt-1">1-16 of over 2,000 results</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <!-- Product Cards -->
                    @forelse ($items as $item)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                            <a href="#" class="block p-4"><img src={{ $item->image300 }} alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                            <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                                <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">{{ $item->name }}</a></h3>
                                <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★<span class="text-gray-400">★</span></div><span class="text-sm text-gray-600 ml-2">(1,258)</span></div>
                                <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">{{ $item->priceText }}</span><span class="text-sm text-gray-500 line-through ml-2">{{ $item->priceText }}</span></div>
                                <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                            </div>
                        </div>
                    @empty
                        <h3>Product Not Found</h3>
                    @endforelse
                    {{-- <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                        <a href="#" class="block p-4"><img src="https://placehold.co/300x300/e2e8f0/333?text=Product+1" alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                        <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                            <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">Premium Noise-Cancelling Wireless Headphones with Bluetooth 5.0</a></h3>
                            <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★<span class="text-gray-400">★</span></div><span class="text-sm text-gray-600 ml-2">(1,258)</span></div>
                            <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">$149.99</span><span class="text-sm text-gray-500 line-through ml-2">$199.99</span></div>
                            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                        <a href="#" class="block p-4"><img src="https://placehold.co/300x300/e2e8f0/333?text=Product+2" alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                        <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                            <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">Compact True Wireless Earbuds with Charging Case - 24hr Playtime</a></h3>
                            <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★<span class="text-gray-400">★</span></div><span class="text-sm text-gray-600 ml-2">(3,450)</span></div>
                            <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">$49.99</span></div>
                            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                        <a href="#" class="block p-4"><img src="https://placehold.co/300x300/e2e8f0/333?text=Product+3" alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                        <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                            <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">SportFit Waterproof Bluetooth Earphones for Running and Workouts</a></h3>
                            <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★★</div><span class="text-sm text-gray-600 ml-2">(892)</span></div>
                            <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">$79.50</span><span class="text-sm text-gray-500 line-through ml-2">$99.99</span></div>
                            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                        <a href="#" class="block p-4"><img src="https://placehold.co/300x300/e2e8f0/333?text=Product+4" alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                        <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                            <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">Studio Pro Over-Ear Headphones with Deep Bass and Foldable Design</a></h3>
                            <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★<span class="text-gray-400">★</span></div><span class="text-sm text-gray-600 ml-2">(2,115)</span></div>
                            <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">$99.00</span></div>
                            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                        </div>
                    </div>
                     <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                        <a href="#" class="block p-4"><img src="https://placehold.co/300x300/e2e8f0/333?text=Product+5" alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                        <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                            <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">Gamer's Choice Wireless Headset with Retractable Microphone</a></h3>
                            <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★★</div><span class="text-sm text-gray-600 ml-2">(4,589)</span></div>
                            <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">$119.99</span></div>
                            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                        </div>
                    </div>
                     <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                        <a href="#" class="block p-4"><img src="https://placehold.co/300x300/e2e8f0/333?text=Product+6" alt="Product Image" class="w-full h-48 object-contain rounded-md"></a>
                        <div class="p-4 border-t border-gray-200 flex-grow flex flex-col">
                            <h3 class="text-md font-medium text-gray-900 mb-2 flex-grow"><a href="#" class="hover:text-orange-600">Lightweight On-Ear Bluetooth Headphones, 30-Hour Battery</a></h3>
                            <div class="flex items-center mb-2"><div class="flex text-yellow-500">★★★★<span class="text-gray-400">★</span></div><span class="text-sm text-gray-600 ml-2">(987)</span></div>
                            <div class="flex items-baseline mb-4"><span class="text-xl font-bold text-gray-900">$39.99</span></div>
                            <button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-2 px-4 rounded-lg transition duration-200">Add to Cart</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </main>
    {{-- <div class="detail-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="notification-inner">
                        <div class="contact-hd notification-hd">
                            <h2>Cart</h2>
                            <hr><br>
                        </div>
                        <div class="detail-demo">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Menu</th>
                                        <th>Harga Menu</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->subtotal }}</td>
                                        </tr>
                                    @empty
                                        <h3>Masih belum memiliki cart</h3>
                                    @endforelse
                                </tbody>
                            </table>
                            <a class="btn btn-success notika-btn-success" href="{{ url("/menu/checkout") }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

