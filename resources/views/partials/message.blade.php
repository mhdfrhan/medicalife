@if (session()->has('message'))
    <div id="alert"
        class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-500 border border-teal-200 rounded-lg p-4 fixed top-5 right-5 z-[999] max-w-lg"
        role="alert">
        <div class="flex items-center gap-x-4">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-teal-100 mt-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

            </div>
            <div>
                <div class="text-sm text-white font-medium">
                    {{ session('message') }}
                </div>
            </div>
						<div class="w-7 h-7 flex items-center justify-center rounded-full hover:bg-teal-600/40">
							<button type="button" class="inline-flex text-teal-100" data-hs-remove-element="#alert">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
											stroke="currentColor" class="w-5 h-5">
											<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
									</svg>
							</button>
					</div>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div id="alert"
        class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-rose-500 border border-teal-200 rounded-lg p-4 fixed top-5 right-5 z-[100] max-w-lg"
        role="alert">
        <div class="flex items-center gap-x-4">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 text-rose-100 mt-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
            <div>
                <div class="text-sm text-white font-medium">
                    {{ session('error') }}
                </div>
            </div>
            <div class="w-7 h-7 flex items-center justify-center rounded-full hover:bg-rose-600/40">
                <button type="button" class="inline-flex text-rose-100" data-hs-remove-element="#alert">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif
