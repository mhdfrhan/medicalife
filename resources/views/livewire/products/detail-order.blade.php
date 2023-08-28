<div>
	@include('partials.message')
    <h1 class="text-2xl sm:text-3xl capitalize !font-extrabold">Orders <span
            class="uppercase text-blue-green">#{{ $invoice }}</span></h1>
    <p class="mt-1 text-gray-500 font-semibold">Customer ID : {{ $userId }}</p>

    <div class="mt-14 flex flex-wrap -mx-5">
        <div class="w-full lg:w-[70%] px-5">
            <div class="overflow-x-auto">
                <div class="min-w-max">
                    <table class="w-full divide-y divide-gray-300 table-auto border-collapse">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                    Products
                                </th>
                                <th class="text-right" scope="col">
                                    Price
                                </th>
                                <th class="text-right" scope="col">
                                    Quantity
                                </th>
                                <th class="text-right" scope="col">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $s)
                                <tr>
                                    <td>
                                        <img src="{{ asset('img/products/' . $s->product->images->first()->image) }}"
                                            class="w-16 h-16 object-cover rounded-lg" alt="">
                                    </td>
                                    <td class="align-middle max-w-[200px]">
                                        <h6 class="line-clamp-2 font-bold">
                                            {{ $s->product->judul }}
                                        </h6>
                                    </td>
                                    <td class="text-right">Rp. {{ number_format($s->product->harga_diskon) }}</td>
                                    <td class="text-right">{{ $s->quantity }}</td>
                                    <td class="text-right">Rp.
                                        {{ number_format($s->product->harga_diskon * $s->quantity) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div
                class="flex items-center justify-between mt-6 shadow-lg shadow-gray-200/40 bg-white py-3 px-6 rounded-xl">
                <h6 class="font-bold capitalize">Items subtotal :</h6>
                <p class="font-bold">Rp. {{ number_format($totalPrice) }}</p>
            </div>
            <div class="mt-8">
                <div class="flex flex-wrap -mx-5">
                    <div class="w-full 2xl:w-1/2 p-5">
                        <div class="p-5 bg-white rounded-xl shadow-lg shadow-gray-200/40">
                            <h6 class="label !mb-6">Billing details</h6>
                            <div class="flex flex-wrap -mx-4">
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Customer</p>
                                            <p class="text-blue-green font-semibold">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Email</p>
                                            <p class="text-blue-green font-semibold">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Phone</p>
                                            <p class="text-blue-green font-semibold">{{ $user->no_telepon }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Address</p>
                                            <p class="text-blue-green font-semibold">
                                                {{ $user->alamat }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full 2xl:w-1/2 p-5">
                        <div class="p-5 bg-white rounded-xl shadow-lg shadow-gray-200/40">
                            <h6 class="label !mb-6">Shipping details</h6>
                            <div class="flex flex-wrap -mx-4">
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Email</p>
                                            <p class="text-blue-green font-semibold">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 p-4 mt-5 md:mt-0">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Phone</p>
                                            <p class="text-blue-green font-semibold">{{ $user->no_telepon }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Shipping Date</p>
                                            <p class="text-blue-green font-semibold">
                                                {{ $shippingDate->format('j M, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 p-4">
                                    <div class="flex  gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-5 h-5 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>
                                        <div class="text-sm space-y-2">
                                            <p class=" font-bold">Address</p>
                                            <p class="text-blue-green font-semibold">
                                                {{ $user->alamat }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-[30%] px-5">
            <div class="p-5 bg-blue-green rounded-3xl shadow-lg shadow-blue-green-200/40">
                <h5 class="text-[22px] text-white font-bold">Summary</h5>
                <div class="mt-4 text-white border-b mb-4 pb-4 border-gray-200/40 capitalize">
                    <div class="flex items-center justify-between text-lg">
                        <p>Total price ({{ $totalItems }} Items)
                        </p>
                        <p>Rp. {{ number_format($totalPrice) }}</p>
                    </div>
                    <div class="mt-3 flex items-center justify-between text-lg">
                        <p>Shipping
                        </p>
                        <p>Rp. 0</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-lg justify-between text-white font-medium capitalize">
                    <p>Total payment</p>
                    <p class="font-bold">Rp.{{ number_format($totalPrice) }}</p>
                </div>
            </div>
            <div class="p-5 bg-blue-green rounded-3xl shadow-lg shadow-blue-green-200/40 mt-4">
                <h5 class="text-[22px] text-white font-bold">Order Status</h5>
                <div class="mt-4">
                    <select wire:model='status' wire:change='updateStatus'
                        class="w-full focus:outline-none focus:ring-0 border rounded-lg !bg-transparent !border-white/50 text-white text-sm">
                        <option class="text-gray-800" value="menunggu_konfirmasi">Menunggu Konfirmasi</option>
                        <option class="text-gray-800" value="dikemas">Dikemas</option>
                        <option class="text-gray-800" value="dikirim">Dikirim</option>
                        <option class="text-gray-800" value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
