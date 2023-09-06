<div>
    @if ($unread->count() > 0)
        <span class="text-[10px] bg-red-500 w-5 h-5 flex items-center justify-center rounded-full text-white">
            {{ $unread->count() }}
        </span>
    @endif
</div>
