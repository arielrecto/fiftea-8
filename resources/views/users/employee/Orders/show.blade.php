<x-employee-panel>
    <div class="p-5 flex flex-col gap-5" x-data="payment">

        @if (Session::has('message'))
            <div class="alert alert-success animate-pulse" id="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="w-full flex items-center justify-start py-2 bg-sbgreen px-4 rounded">
            <h1 class="text-xl text-center font-bold text-white">
                Orders Details
            </h1>
        </div>

        <div class="flex flex-col gap-2">
            <div class="w-full flex justify-between items-center">
                <h1 class="flex items-center text-3xl gap-4">
                    <span class="">Order #:</span>
                    <span class="font-bold">
                        {{ $order->num_ref }}
                    </span>
                </h1>
                <h1 class="flex items-center text-lg gap-4">
                    <span class="">Date:</span>
                    <span class="font-bold">
                        {{ date('F m, Y', strtotime($order->created_at)) }}
                    </span>
                </h1>
            </div>
            <div class="flex flex-col gap-2">
                <h1>Payment Details</h1>
                <div class="grid grid-cols-3 grid-flow-row h-32">
                    <div class="w-32 h-auto">
                        <img src="{{$order->payment->image}}" alt="" class="object object-center h-full w-full">
                    </div>
                    <div class="w-full h-full flex-col gap-2">
                        <h1>Referrence #</h1>
                        {{$order->payment->payment_ref}}
                    </div>
                    <div class="w-full h-full flex-col gap-2">
                        <h1>Amount</h1>
                        &#8369 {{$order->payment->amount}}
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                Total : {{$order->total}}
                <h1 class="text-2xl font-bold">
                    Products
                </h1>
                <div class="overflow-x-auto w-full">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>size</th>
                                <th>sugar level</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order->cart->products as $cart_product)
                                <tr class="bg-base-200">
                                    <th>{{$cart_product->product->id}}</th>
                                    <td>{{$cart_product->product->name}}</td>
                                    <td>{{$cart_product->size}}</td>
                                    <td>{{$cart_product->sugar_level}}</td>
                                    <td>{{$cart_product->quantity}}</td>
                                    <td>&#8369 {{$cart_product->price}}</td>
                                    <td>&#8369 {{$cart_product->total}}</td>
                                </tr>

                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script>
            setTimeout(() => {
                document.getElementById('alert').remove();
            }, 3000);
        </script>
        {{-- <script>
            function payment() {
                return {
                    paymentData: null,
                    openPaymentData(data) {
                        console.log(data)
                        this.paymentData = data
                    }
                }
            }
        </script> --}}
    @endpush
</x-employee-panel>