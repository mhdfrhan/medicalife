<footer class="pt-8 lg:pt-16 px-5">
	<div class="max-w-6xl mx-auto bg-neutral-800 py-8 rounded-t-3xl px-10">
		<div class="flex flex-wrap -mx-4">
			<div class="w-full lg:w-1/2 px-4">
				<div class="max-w-md">
					<a href="/" wire:navigate class="inline-block">
						<img src="{{ asset('img/logo.svg') }}" class="w-24" alt="">
					</a>
					<p class="text-gray-400 mt-4 text-[15px]">Medicalife selalu berkomitmen untuk memberikan pelayanan terbaik
						dalam dunia kesehatan dan kesejahteraan.</p>
				</div>
			</div>
			<div class="w-full lg:w-1/2 px-4">
				<div class="max-w-lg xl:max-w-xl mx-auto xl:mr-0">
					<div class="mb-6 pb-6 border-b border-gray-700">
						<div class="-mb-4 text-right">
							<a class="inline-flex mb-4 mr-10 items-center text-white hover:text-blue-500 font-medium" href="#">
								<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M1.5 3.66675L8.0755 8.05041C8.63533 8.42364 9.36467 8.42364 9.9245 8.05041L16.5 3.66675M3.16667 12.8334H14.8333C15.7538 12.8334 16.5 12.0872 16.5 11.1667V2.83341C16.5 1.91294 15.7538 1.16675 14.8333 1.16675H3.16667C2.24619 1.16675 1.5 1.91294 1.5 2.83341V11.1667C1.5 12.0872 2.24619 12.8334 3.16667 12.8334Z"
										stroke="#84878A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<span class="ml-2">info@medicalife.com</span>
							</a>
							<a class="inline-flex mb-4 items-center text-white hover:text-blue-500 font-medium" href="#">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M1.5 3.16667C1.5 2.24619 2.24619 1.5 3.16667 1.5H5.89937C6.25806 1.5 6.57651 1.72953 6.68994 2.06981L7.93811 5.81434C8.06926 6.20777 7.89115 6.63776 7.52022 6.82322L5.63917 7.76375C6.55771 9.80101 8.19898 11.4423 10.2363 12.3608L11.1768 10.4798C11.3622 10.1088 11.7922 9.93074 12.1857 10.0619L15.9302 11.3101C16.2705 11.4235 16.5 11.7419 16.5 12.1006V14.8333C16.5 15.7538 15.7538 16.5 14.8333 16.5H14C7.09644 16.5 1.5 10.9036 1.5 4V3.16667Z"
										stroke="#84878A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<span class="ml-2">(0761) 555-0128</span>
							</a>
						</div>
					</div>
					<div class="text-right -mb-2 text-sm text-gray-400">
						© Copyright {{ date('Y') === '2023' ? '2023' : '2023 - ' . date('Y') }} Medicalife. All Rights Reserved.
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>