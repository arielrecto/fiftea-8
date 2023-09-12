<x-app-layout>
    <x-header :cart="$cart" :subtotal="$total" />
    <section class="pt-16 bg-white">
        <div class="max-w-[1300px] mx-auto flex px-4">
            <div class="w-full flex-col p-4">
                <div class="w-full py-4 ">
                    <h1 class="text-xl font-sans font-bold">Your Cart</h1>
                </div>
                <div class="w-full flex flex-col space-y-6 md:space-y-0 md:flex-row md:space-x-8" x-data="productData">
                    <div class="flex flex-col w-full md:w-2/3">
                        <div class="w-full overflow-hidden rounded-md shadow">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Product</th>
                                            <th class="px-4 py-3">Unit Price</th>
                                            <th class="px-4 py-3">Size</th>
                                            <th class="px-4 py-3">Extras</th>
                                            <th class="px-4 py-3">Quantity</th>
                                            <th class="px-4 py-3">Total Price</th>
                                            <th class="px-4 py-3"></th>
                                            <th class="px-4 py-3"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @forelse ($cart->products as $c_product)
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center space-x-2">
                                                        <img class="w-12 h-12 rounded"
                                                            src="{{ asset($c_product->product->image) }}"
                                                            alt="">

                                                        <div class="flex flex-col">
                                                            <h1 class="title-font text-sm font-medium text-gray-800 3">
                                                                {{ $c_product->product->name }}
                                                            </h1>
                                                            <h2
                                                                class="tracking-widest text-xs title-font font-medium text-gray-400">
                                                                {{ $c_product->product->categories()->first()->name }}
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">&#8369 {{ $c_product->product->price }}</td>
                                                <td class="px-4 py-3">{{ $c_product->size }}</td>
                                                @php
                                                    $extras = json_decode($c_product->extras, true);
                                                @endphp
                                                <td class="px-4 py-3">
                                                    @foreach ($extras['data'] as $extra)
                                                        {{-- <p class="flex gap-2"> --}}
                                                        {{ $extra['name'] }} <span>price :
                                                            {{ $extra['types'][0]['pivot']['price'] }}</span>
                                                        {{-- </p> --}}
                                                    @endforeach
                                                </td>
                                                <td class="px-4 py-3">{{ $c_product->quantity }}</td>
                                                <td class="px-4 py-3">&#8369 {{ $c_product->total }}</td>
                                                <td class="px-4 py-3">
                                                    <a
                                                        href="{{ route('client.cart.showProduct', ['id' => $c_product->id]) }}">
                                                        <i
                                                            class='bx bx-edit text-blue-700 text-lg hover:text-sbgreen cursor-pointer'></i>
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <i class='bx bx-x text-2xl text-gray-500'></i>
                                                </td>
                                            </tr>
                                        @empty
                                            <td>
                                                <p class="text-sm text-red-600">Not item</p>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3">
                        <div class="w-full flex flex-col space-y-4 p-4 rounded-md shadow-md border border-gray-200">
                            <div class="w-full">
                                <h1 class="text-lg font-bold">Summary</h1>
                            </div>
                            <div class="w-full flex flex-col space-y-6 px-2">
                                <div class="w-full flex justify-between border-b border-gray-200 pb-1">
                                    <p class="font-medium text-sm">ITEMS</p>
                                    <P class="font-medium text-sm">{{ $cart->products->count() }}</P>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    @foreach ($cart->products as $c_product)
                                        <div class="flex justify-between items-start">
                                            <div class="flex items-center space-x-2">
                                                <img class="w-10 h-10 rounded"
                                                    src="{{ asset($c_product->product->image) }}" alt="">

                                                <div class="flex flex-col">
                                                    <h1 class="title-font text-sm font-medium text-gray-800 3">
                                                        {{ $c_product->product->name }}
                                                    </h1>
                                                    <h2
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400">
                                                        {{ $c_product->product->categories()->first()->name }}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-sm">&#8369 {{ $c_product->total }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="w-full flex justify-between">
                                    <p class="font-medium text-sm">TOTAL PRICE</p>
                                    <P class="font-medium text-sm">&#8369 {{ $total }}</P>
                                </div>
                            </div>

                            <form action="{{ route('client.order.store') }}" method="post" x-data="payment"
                                enctype="multipart/form-data">
                                <div class="flex flex-wrap">
                                    <div class="p-2">
                                        <button @click="openToggle($event)">
                                            <img src="{{ asset('images/screenshot.png') }}" alt=""
                                                class="h-12">
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 py-2" x-show="toggle" x-transition.duration.700ms>
                                    <div class="w-full flex justify-center">
                                        <img src="{{ asset('images/QR-2.png') }}" alt=""
                                            class="object object-center w-1/2 h-1/2">
                                    </div>
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="" class="text-sm text-gray-400">Gcash ref #</label>
                                        <input type="text" class="input input-accent" name="qr_ref"
                                            placeholder="Ref #">
                                        @if ($errors->has('qr_ref'))
                                            <p class="text-xs text-error">{{ $errors->first('qr_ref') }}</p>
                                        @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="" class="text-sm text-gray-400">Upload Image Reciept</label>
                                        <input type="file" name="image"
                                            class="file-input file-input-bordered file-input-accent w-full" />
                                        @if ($errors->has('image'))
                                            <p class="text-xs text-error">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                    <div class="w-full flex flex-col gap-2">
                                        <label for="" class="text-sm text-gray-400">Amount</label>
                                        <input type="text" class="input input-accent" name="amount"
                                            placeholder="Amount">
                                        @if ($errors->has('amount'))
                                            <p class="text-xs text-error">{{ $errors->first('amount') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="w-full flex">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <button
                                        class="w-full text-white text-sm bg-sbgreen rounded py-2 px-4">CHECKOUT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            function productData() {
                return {
                    modal: null,
                    product: null,
                    openModal(data) {

                    }
                }
            }
        </script>
        <script>
            function payment() {
                return {
                    toggle: true,
                    openToggle(e) {
                        e.preventDefault();
                        this.toggle = !this.toggle
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
