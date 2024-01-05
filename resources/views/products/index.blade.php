<x-app-layout>
    <section>
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <x-admin-header />
        @else
            <x-header :cart="$cart" :subtotal="$subtotal" />
        @endif
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28 pt-24 bg-white h-screen">

            {{-- x-init="actions.fetchProduct" --}}
            <div class="flex w-full flex-col space-y-2" x-data="sample" x-init="fetchProduct">
                <div class="list w-full flex border-b border-gray-200 py-2 space-x-2">
                    <button @click="getFilterProducts('all')" class="nav py-1 px-4 rounded hover:bg-gray-200">
                        <p>All</p>
                    </button>

                    <template x-for="category in categories" :key="category.id">
                        <button @click="getFilterProducts(category.name)" class="nav py-1 px-3 rounded hover:bg-gray-200">
                            <p x-text="category.name"></p>
                        </button>
                    </template>
                </div>
                @if (Session::has('message'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                        class="flex items-center bg-sblight w-full py-2 px-4 rounded-md space-x-2 ">
                        <i class='bx bx-check-circle text-white text-xl'></i>
                        <p class="text-white text-sm text-center">{{ Session::get('message') }}</p>
                    </div>
                @endif
                <section id="products-container" class="flex w-full flex-wrap relative">
                    <template x-for="product in productsFilter" :key="product.id">

                        <div class="p-4 lg:w-1/4 transition duration-500 ease-in-out" x-show="!isLoading">
                            <div
                                class="h-fit border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden  hover:shadow-lg bg-white">
                                <img class="lg:h-80 md:h-60 w-full object-cover object-center" alt="blog"
                                    :src="product.image">
                                <div class="p-3">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        <span x-text="product.categories[0].name"></span>
                                    </h2>
                                    <h1 class="title-font text-xl font-bold text-gray-900 mb-3" x-text="product.name">
                                    </h1>

                                    <div class="flex items-center justify-between flex-wrap ">

                                        <p class="font-sans font-bold">
                                            &#8369;<span x-text="product.price"></span>
                                        </p>

                                        @if (Auth::user())
                                            <button @click="openModal(product.id)"
                                                class="text-sm rounded text-white bg-gradient-to-r from-green-400 to-blue-400 py-2 px-4">Order</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </section>
            </div>
        </div>
    </section>

    <script>
        function sample() {
            return {

                products: [],
                categories: [],
                isLoading: false,
                productsFilter: [],
                supplies: [],
                modal: null,
                total: 0,
                quantity: 0,
                size: [{
                    name: null,
                    price: 0
                }],
                isDone: false,
                extras: {
                    data: []
                },
                getFilterProducts(data) {
                    if (data === 'all') {
                        this.productsFilter = this.products;
                    } else {
                        this.productsFilter = this.products.filter((item) => {
                            if (item.categories.length !== 0) {
                                return item.categories[0].name === data;
                            }
                        });
                    }
                },

                async fetchProduct() {
                    try {
                        this.isLoading = true;

                        const response = await axios.get(
                            '/product/data'
                        );

                        this.isLoading = false;
                        this.products = response.data.products;
                        this.categories = response.data.categories;
                        this.productsFilter = response.data.products;
                        this.supplies = response.data.supplies;

                        console.log(response.data.supplies)

                    } catch (error) {
                        console.log(error);
                    }
                },
                openModal(id) {
                    window.location.href = `/client/products/${id}`
                },
                // getExtras(e) {
                //     if (e.target.value === ' ') return

                //     const id = parseInt(e.target.value)
                //     const data = this.supplies.find(item => item.id === id)

                //     this.extras.data.push(data)
                // },
                // getTotal(price) {

                //     if (this.quantity === 0 || this.extras.data === null) {

                //         this.size = [{
                //             name: 'regular',
                //             price: price
                //         }]
                //         return this.total = price
                //     }

                //     const totalExtrasPrice = this.extras.data.reduce((acc, item) => acc + parseInt(item.types[0].pivot
                //         .price), 0)

                //     const total = (parseInt(this.size[0].price) + totalExtrasPrice) * this.quantity;

                //     this.total = total;
                // },
                // getSize(e, product) {
                //     if (e.target.value === 'regular') {
                //         this.size = [{
                //             name: 'regular',
                //             price: product.price
                //         }]
                //         return
                //     }

                //     const size = JSON.parse(product.sizes).filter((item) => item.name === e.target.value);

                //     console.log(size)

                //     this.size = size;
                // },
                // costumizeDone(e, price) {
                //     e.preventDefault();
                //     const total = this.getTotal(price);
                //     this.isDone = true;
                // }
            }
        }
    </script>



</x-app-layout>
