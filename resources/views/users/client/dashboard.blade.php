<x-app-layout>
   
    <header class="w-full fixed z-50 border-b border-gray-200 bg-white">
        <div class="navbar flex justify-between items-center max-w-[1300px] mx-auto px-4 ">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <img class="w-14 h-14" src="{{ asset('images/logo.png') }}" alt="">
                    <a class="text-xl font-sans font-semibold">Fiftea-8</a>
                </div>
                <div class="hidden md:flex items-center space-x-2 px-5">
                    <div class="py-2 px-4 hover:bg-gray-200 rounded">
                        <a class="font-sans text-base" href="/">Home</a>
                    </div>
    
                    <div class="py-2 px-4 hover:bg-gray-200 rounded">
                        <a class="font-sans text-base" href="{{ route('products') }}">Products</a>
                    </div>
    
                    <div class="py-2 px-4 hover:bg-gray-200 rounded">
                        <a class="font-sans text-base" href="/">About Us</a>
                    </div>
                </div>
            </div>
    
            @auth
                <div class="hidden md:flex space-x-2">
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img src="{{ asset('images/logo.png') }}" />
                            </div>
                        </label>
                        <ul tabindex="0"
                            class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 flex flex-col space-y-2">
    
                            <a href="{{ route('profile.edit') }}" class="rounded-md hover:bg-gray-200 py-1 px-2">Profile</a>
    
                            <a href="{{ route('client.dashboard.index') }}" class="rounded-md hover:bg-gray-200 py-1 px-2">Dashboard</a>
    
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button
                                    class="w-full rounded-md bg-sbgreen hover:bg-sblight py-1 px-2 cursor-pointer text-white">Logout</button>
                            </form>
    
                        </ul>
                    </div>
                </div>
            @else
                <div class="hidden md:flex space-x-3">
                    <a class="font-sans  text-white font-medium text-base bg-sbgreen hover:bg-green-800 py-2 px-4 rounded"
                        href="{{ route('login') }}">LOGIN</a>
                    <a class="font-sans text-gray-600 font-medium text-base bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded"
                        href="{{ route('register') }}">REGISTER</a>
                </div>
            @endauth
            <div class="flex md:hidden">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <i class='bx bx-menu text-3xl font-medium text-gray-600'></i>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 flex flex-col space-y-1">
                        <li><a class="font-sans">Home</a></li>
                        <li><a class="font-sans">Products</a></li>
                        <li><a class="font-sans">About Us</a></li>
                        <li><a class="font-sans">Login</a></li>
                    </ul>
                </div>
    
            </div>
        </div>
    </header>
    
    <section class="bg-gray-100">
        <div class="max-w-[1300px] mx-auto px-4 pt-24">
            <div class="flex items-start justify-between space-x-6">
                <div class="w-4/6 flex flex-col space-y-4">
                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG TOTAL AMOUNT SPENT
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Overview</h1>
                    </div>
                    <div class="flex items-start justify-between space-x-4">
                        <div class="w-1/3 h-32 rounded shadow-md p-4 bg-gradient-to-r from-cyan-500 to-blue-400  relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-credit-card text-2xl text-white'></i>
                                <p class="text-base text-white">Total Amount Spent</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">&#8369 2,100</span>
                            </div>
                            <i class='bx bx-bar-chart absolute bottom-0 right-0 text-7xl opacity-25 text-white'></i>
                        </div>
                        <div class="w-1/3 h-32 rounded shadow-md p-4 bg-gradient-to-r from-violet-500 to-fuchsia-400 relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-shopping-bag text-2xl text-white'></i>
                                <p class="text-base text-white">Pedning Orders</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">2</span>
                            </div>
                            <i class='bx bx-shopping-bag absolute bottom-1 right-2 text-6xl opacity-25 text-white'></i>
                        </div>
                        <div class="w-1/3 h-32 rounded shadow-md p-4 bg-gradient-to-r from-purple-500 to-pink-400  relative">
                            <div class="h-1/3 flex items-center space-x-2">
                                <i class='bx bx-package text-2xl text-white'></i>
                                <p class="text-base text-white">Delivered Orders</p>
                            </div>
                            <div class="w-full h-2/3 flex items-center justify-start">
                                <span class="text-2xl font-bold text-white">6</span>
                            </div>
                            <i class='bx bx-package absolute bottom-1 right-2 text-6xl opacity-25 text-white'></i>
                        </div>
                    </div>

                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG RECOMMENDATIONS
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Recommendations</h1>
                    </div>
                    <div class="carousel carousel-center max-w-full flex gap-4">

                        <div class="carousel-item w-[350px] h-44 rounded-md shadow-md border border-gray-200 bg-gray-50">
                            <div class="flex items-start space-x-1 ">
                                <img src="{{asset('images/sberry.png')}}" alt=""
                                class="min-w-[200px] w-[200px] h-full rounded-l-md bg-gradient-to-r from-green-200 to-blue-200 ">
                                <div class="h-full flex flex-col space-y-2 p-2 relative">
                                    <h1 class="text-base font-bold">Strawberry Caramel</h1>
                                    <p class="text-sm">This is a sample product description</p>
                                    <div class="flex space-x-3 items-center absolute bottom-2 right-3">
                                        <p class="text-sm font-bold">&#8369 150</p>
                                        <a href="" class="py-1 px-4 rounded text-sm text-white bg-gradient-to-r from-green-400 to-blue-400">View</a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="carousel-item w-[350px] h-44 rounded-md shadow-md border border-gray-200 bg-gray-50">
                            <div class="flex items-start space-x-1 ">
                                <img src="{{asset('images/sberry.png')}}" alt=""
                                class="min-w-[200px] w-[200px] h-full rounded-l-md bg-gradient-to-r from-green-200 to-blue-300">
                                <div class="h-full flex flex-col space-y-2 p-2 relative">
                                    <h1 class="text-base font-bold">Strawberry Caramel</h1>
                                    <p class="text-sm">This is a sample product description</p>
                                    <div class="flex space-x-3 items-center absolute bottom-2 right-3">
                                        <p class="text-sm font-bold">&#8369 150</p>
                                        <a href="" class="py-1 px-4 rounded text-sm text-white bg-gradient-to-r from-green-400 to-blue-400">View</a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="carousel-item w-[350px] h-44 rounded-md shadow-md border border-gray-200 bg-gray-50">
                            <div class="flex items-start space-x-1 ">
                                <img src="{{asset('images/sberry.png')}}" alt=""
                                class="min-w-[200px] w-[200px] h-full rounded-l-md bg-gradient-to-r from-green-200 to-blue-300">
                                <div class="h-full flex flex-col space-y-2 p-2 relative">
                                    <h1 class="text-base font-bold">Strawberry Caramel</h1>
                                    <p class="text-sm">This is a sample product description</p>
                                    <div class="flex space-x-3 items-center absolute bottom-2 right-3">
                                        <p class="text-sm font-bold">&#8369 150</p>
                                        <a href="" class="py-1 px-4 rounded text-sm text-white bg-gradient-to-r from-green-400 to-blue-400">View</a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="carousel-item w-[350px] h-44 rounded-md shadow-md border border-gray-200 bg-gray-50">
                            <div class="flex items-start space-x-1 ">
                                <img src="{{asset('images/sberry.png')}}" alt=""
                                class="min-w-[200px] w-[200px] h-full rounded-l-md bg-gradient-to-r from-green-200 to-blue-300">
                                <div class="h-full flex flex-col space-y-2 p-2 relative">
                                    <h1 class="text-base font-bold">Strawberry Caramel</h1>
                                    <p class="text-sm">This is a sample product description</p>
                                    <div class="flex space-x-3 items-center absolute bottom-2 right-3">
                                        <p class="text-sm font-bold">&#8369 150</p>
                                        <a href="" class="py-1 px-4 rounded text-sm text-white bg-gradient-to-r from-green-400 to-blue-400">View</a>
                                    </div>
                                </div>
                            </div>
                        </div> 
 
                    </div>

                    {{--
                    ---------------------------------------------------
                        ITO YUNG PART NG ORDER HISTORY
                    ---------------------------------------------------
                    --}}
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Order History</h1>
                    </div>
                    <div class="flex flex-col space-y-2">

                        <div tabindex="0" class="collapse collapse-arrow border border-base-200 shadow-sm rounded bg-white">
                            <div class="p-4 py-2 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm font-bold">ORDER NUMBER: ORD2023091156789</p>
                                    <p class="text-sm font-bold">DATE: March 24, 2023</p>
                                    <p class="text-sm font-bold">TOTAL: &#8369 500</p>
                                </div>
                                <i class='bx bx-chevron-down text-2xl'></i>
                            </div>

                            {{--
                            ---------------------------------------------------
                                DITO YUNG MGA ITEMS NG ORDER
                            ---------------------------------------------------
                            --}}

                            <div class="collapse-content">

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                            </div>

                        </div>

                        <div tabindex="0" class="collapse collapse-arrow border border-base-200 shadow-sm rounded bg-white">
                            <div class="p-4 py-2 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm font-bold">ORDER NUMBER: ORD2023091156789</p>
                                    <p class="text-sm font-bold">DATE: March 24, 2023</p>
                                    <p class="text-sm font-bold">TOTAL: &#8369 500</p>
                                </div>
                                <i class='bx bx-chevron-down text-2xl'></i>
                            </div>

                            {{--
                            ---------------------------------------------------
                                DITO YUNG MGA ITEMS NG ORDER
                            ---------------------------------------------------
                            --}}

                            <div class="collapse-content">

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                            </div>

                        </div>

                        <div tabindex="0" class="collapse collapse-arrow border border-base-200 shadow-sm rounded bg-white">
                            <div class="p-4 py-2 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm font-bold">ORDER NUMBER: ORD2023091156789</p>
                                    <p class="text-sm font-bold">DATE: March 24, 2023</p>
                                    <p class="text-sm font-bold">TOTAL: &#8369 500</p>
                                </div>
                                <i class='bx bx-chevron-down text-2xl'></i>
                            </div>

                            {{--
                            ---------------------------------------------------
                                DITO YUNG MGA ITEMS NG ORDER
                            ---------------------------------------------------
                            --}}

                            <div class="collapse-content">

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                            </div>

                        </div>

                        <div tabindex="0" class="collapse collapse-arrow border border-base-200 shadow-sm rounded bg-white">
                            <div class="p-4 py-2 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm font-bold">ORDER NUMBER: ORD2023091156789</p>
                                    <p class="text-sm font-bold">DATE: March 24, 2023</p>
                                    <p class="text-sm font-bold">TOTAL: &#8369 500</p>
                                </div>
                                <i class='bx bx-chevron-down text-2xl'></i>
                            </div>

                            {{--
                            ---------------------------------------------------
                                DITO YUNG MGA ITEMS NG ORDER
                            ---------------------------------------------------
                            --}}

                            <div class="collapse-content">

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                                <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{asset('images/sberry.png')}}" alt=""
                                        class="w-10 h-10 border border-gray-200 ">
                                        <div>
                                            <p class="text-sm font-bold">Strawberry Caramel</p>
                                            <p class="text-xs text-gray-500">Milk Tea</p>
                                        </div>
                                    </div>
                                    <p class="text-sm">&#8369 150</p>
                                </div>

                            </div>

                        </div>
                        
                    </div>   
                    
                </div>

                {{--
                    ---------------------------------------------------
                        DITO YUNG PROFILE
                    ---------------------------------------------------
                    --}}
                
                <div class="w-2/6 flex flex-col space-y-4">
                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Profile</h1>
                    </div>
                    <div class="rounded shadow-sm h-fit w-full bg-white pb-4">
                        <div class="w-full h-fit relative ">
                            <i class='bx bx-edit-alt text-xl px-1 opacity-80 top-4 right-4 absolute bg-gray-200 bg-opacity-50 rounded cursor-pointer hover:bg-gray-700 hover:text-white' ></i>
                            <div class="w-full h-32 rounded-t bg-gradient-to-r from-green-200 to-blue-200"></div>
                            <img src="{{asset('images/profile.jpg')}}" alt=""
                            class="w-36 h-36 rounded-full absolute border border-gray-200 top-12 left-1/2 transform -translate-x-1/2">
                        </div>
                        <div class="pt-20 flex flex-col items-center justify-start">
                            <p class="text-xl font-bold">Shan Delima</p>
                            <p class="text-base ">shandelima@email.com</p>
                            <p class="text-sm ">09123456789</p>
                            <div class="pt-4 flex items-start justify-center w-[80%]">
                                <p class="text-sm text-center">Lot 25 Blk 35 Green Valley Subd. San Nicolas 3 Bacoor Cavite</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex items-center justify-start">
                        <h1 class="text-base font-bold">Cart Preview</h1>
                    </div>
                    <div class="rounded shadow-sm h-fit w-full bg-white p-4">
                        <div class="w-full flex items-center justify-start pb-2">
                            <h1 class="text-base font-bold">Cart Items</h1>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <img src="{{asset('images/sberry.png')}}" alt=""
                                    class="w-10 h-10 border border-gray-200 ">
                                    <div>
                                        <p class="text-sm font-bold">Strawberry Caramel</p>
                                        <p class="text-xs text-gray-500">Milk Tea</p>
                                    </div>
                                </div>
                                <p class="text-sm">&#8369 150</p>
                            </div>
                            <div class="flex justify-between p-2 px-1 border-t border-gray-200">
                                <div class="flex items-center space-x-3">
                                    <img src="{{asset('images/sberry.png')}}" alt=""
                                    class="w-10 h-10 border border-gray-200 ">
                                    <div>
                                        <p class="text-sm font-bold">Strawberry Caramel</p>
                                        <p class="text-xs text-gray-500">Milk Tea</p>
                                    </div>
                                </div>
                                <p class="text-sm">&#8369 150</p>
                            </div>
                            <div class="w-full flex items-center justify-between pt-2">
                                <h1 class="text-sm font-bold">Total</h1>
                                <p class="text-sm font-bold">&#8369 300</p>
                            </div>
                            <div class="w-full flex pt-2">
                                <a href="" class="text-sm text-white w-full text-center rounded py-2 bg-gradient-to-r from-green-400 to-blue-400">VIEW</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>

{{-- <div class="w-full flex flex-wrap">
    @forelse ($products  as $product)
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl
            hover:bg-gray-100 ">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                src="{{asset($product->image)}}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                <p class="mb-3 font-normal text-gray-700">{!! $product->description!!}</p>
            </div>
        </a>

    @empty

        <h1>
            Empty
        </h1>
    @endforelse
</div> --}}
