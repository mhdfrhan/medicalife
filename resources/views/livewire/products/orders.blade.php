<div>
    <div>
        <h1 class="heading !capitalize !font-extrabold">Orders</h1>
        <ul class="flex flex-wrap items-center gap-x-6 gap-y-3 mt-6">
            <li class="text-sm text-gray-500 font-bold">
                Semua ({{ $semua->count() }})
            </li>
            <li class="text-sm text-gray-500 font-bold">
                <span class="text-blue-green">Menunggu Konfirmasi</span> ({{ $menunggu->count() }})
            </li>
            <li class="text-sm text-gray-500 font-bold">
                <span class="text-blue-green">Dikemas</span> ({{ $dikemas->count() }})
            </li>
            <li class="text-sm text-gray-500 font-bold">
                <span class="text-blue-green">Dikirim</span> ({{ $dikirim->count() }})
            </li>
            <li class="text-sm text-gray-500 font-bold">
                <span class="text-blue-green">Selesai</span> ({{ $selesai->count() }})
            </li>
        </ul>
    </div>
    <div class="mt-14">
        <div class=" bg-white p-6 rounded-2xl shadow-lg shadow-gray-200/20">
            <div class="w-full min-w-max overflow-x-auto ">
                @empty($semua->count())
                    <div class="text-center text-sm text-neutral-500">Belum ada order saat ini.</div>
                @else
                    <table class="divide-y divide-gray-300 table ">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Invoice
                                </th>
                                <th scope="col">
                                    Customer
                                </th>
                                <th scope="col">
                                    Total
                                </th>
                                <th scope="col">
                                    Status
                                </th>
                                <th scope="col">
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderBy as $i => $order)
                                <tr>
                                    <td>
                                        <a href="{{ route('detail.order', strtolower($order->first()->invoice)) }}" wire:navigate class="hover:underline">
                                            <h5 class="font-bold">{{ $order->first()->invoice }}</h5>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-4">
                                            <span class="font-bold">{{ $order->first()->user->name }}</span>
                                        </div>
                                    </td>
                                    <td>Rp. {{ number_format($order->sum('total_price')) }}</td>
                                    <td>
                                        <span
                                            class="text-xs font-semibold rounded px-1
																			@if ($order->first()->status === 'menunggu_konfirmasi') bg-amber-400/60 border border-amber-500 text-amber-800
																			@elseif ($order->first()->status === 'dikemas') bg-amber-400/60 border border-amber-500 text-amber-800
																			@elseif ($order->first()->status === 'dikirim') bg-blue-400/60 border border-blue-500 text-blue-800
																			@elseif ($order->first()->status === 'selesai') bg-green-400/60 border border-green-500 text-green-800 @endif
																	">
                                            {{ ucwords(str_replace('_', ' ', $order->first()->status)) }}
                                        </span>

                                    </td>
                                    <td class="text-gray-500">{{ $order->first()->created_at->format('j M, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endempty
            </div>
        </div>
    </div>
</div>
