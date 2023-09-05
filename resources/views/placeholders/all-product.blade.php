<div class="flex flex-wrap -mx-4">
	@for ($i = 0; $i < 12; $i++)
	<div class="w-full sm:w-1/2 md:w-1/3 p-4 animate-pulse">
		<div class="border border-gray-200 p-4 rounded-2xl">
			<div class="bg-gray-200 h-52 rounded-xl"></div>
			<div class="bg-gray-200 w-52 mx-auto  h-6 mt-4"></div>
			<div class="bg-gray-200 w-32 mx-auto  h-3 mt-3"></div>
		</div>
	</div>
	@endfor
</div>