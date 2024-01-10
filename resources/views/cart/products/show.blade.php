<x-app-layout>
    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <x-admin-header />
    @else
        <x-header :cart="$cart" :subtotal="$subTotal" />
    @endif
    <section>
        <div class="w-full max-w-[1300px] mx-auto px-4 pt-24 text-gray-700">
            <div class="w-full flex justify-center items-center" >
                <div class="w-full md:w-fit flex flex-col space-y-4">

                    {{--
                    ----------------------------------------------------------
                        PALAGYAN NALANG NG ROUTE ITONG BACK BUTTON SA BABA
                        POGI MO PO

                    --}}
                    <a href="{{ route('client.cart.index', ['id' => $cart->id]) }}"
                        class="rounded bg-gray-200 hover:bg-gray-300 px-4 py-1 flex items-center w-fit">
                        <i class='bx bx-left-arrow-alt text-2xl mr-2'></i>
                        back
                    </a>
                    <p class="text-lg font-bold">Update your Order</p>
                    <div class="w-full md:w-fit flex flex-col md:flex-row items-center md:space-x-4 space-y-4 md:space-y-0 p-4 border bordergray-200 rounded">
                        <img src="{{ route('media.product', ['name' => $c_product->product->image]) }}" alt=""
                            class="w-full h-auto md:w-48 md:h-48 rounded-md">
                        <form action="{{ route('client.cart.updateCartItem', $c_product->id) }}" method="POST"
                            class="flex flex-col space-y-4">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col md:flex-row items-center md:space-x-4 space-y-4 md:space-y-0">
                                <div class="flex flex-col space-y-1">
                                    <label for="" class="text-sm">SIZE</label>
                                    <select name="size" id=""
                                        class="text-sm rounded border border-gray-300 px-3 w-[200px]"
                                        value="{{ $c_product->size }}">
                                        <option value="small" {{ $c_product->size === 'small' ? 'selected' : '' }}>
                                            Small</option>
                                        <option value="medium" {{ $c_product->size === 'medium' ? 'selected' : '' }}>
                                            Medium</option>
                                        <option value="regular" {{ $c_product->size === 'regular' ? 'selected' : '' }}>
                                            Regular</option>
                                        <option value="large" {{ $c_product->size === 'large' ? 'selected' : '' }}>
                                            Large</option>
                                    </select>
                                </div>
                                <div class="flex flex-col space-y-1" x-data="{supplies : {{$supplies}}}">
                                    <label for="" class="text-sm">EXTRAS</label>
                                    <select name="extras" id=""
                                        class="text-sm rounded border border-gray-300 px-3 w-[200px]">
                                        <template x-for="supply in supplies" :key="supply.id">
                                            <option :value="JSON.stringify(supply)"><span x-text="`${supply.name} (${supply.pivot.price})`"></span></option>
                                        </template>

                                    </select>
                                </div>
                                <div class="flex flex-col space-y-1">
                                    <label for="" class="text-sm">QUANTITY</label>
                                    <input type="number" name="quantity"
                                        class="text-sm rounded border border-gray-300 px-3 w-[200px]"
                                        value="{{ $c_product->quantity }}">
                                </div>
                            </div>
                            <div class="flex items-center justify-start">
                                <button class="px-4 py-2 text-sm rounded bg-sbgreen text-white">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

{{-- <div class="w-full  bg-white rounded-lg shadow-sm flex p-5">
    <div class="w-1/5">
        <img src="{{asset($c_product->product->image)}}" alt="">
    </div>
    <div class="flex-grow p-2 flex flex-col gap-2">
        <h1 class="text-3xl font-bold">
            {{$c_product->name}}
        </h1>
        <p>
            <span>Description : </span>
           {!!$c_product->description!!}
        </p>
        <p>
            <span>Size :</span>
            {{$c_product->size}}
        </p>
        <p>
            <span>Quantity</span>
            {{$c_product->quantity}}
        </p>

        @php
           $extras = json_decode($c_product->extras)
        @endphp
        <p>
            <span>Extras : </span>
            @foreach ($extras->data as $extra)
                {{$extra->name}},
            @endforeach
        </p>
        <p class="w-full flex flex-row-reverse">P {{$c_product->total}}</p>
    </div>
</div> --}}
