<div class="relative inline-block text-left" wire:click.away="closeMenu">
  <div>
    <button
        type="button"
        class="flex cursor-pointer items-center rounded-full bg-gray-100 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" id="menu-button" aria-expanded="true" aria-haspopup="true"
        wire:click="toggleMenu"
    >
      <span class="sr-only">Open options</span>
      <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
        <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
      </svg>
    </button>
  </div>
  <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
    wire:cloak
    wire:show="isOpen"
  >
    <div class="py-1" role="none">
        @if ($items['next'])
            <livewire:popover-menu-item href="{{ route('order.next', $order->id) }}" label="Run the {{ $order->product->nextShift->name }}" ></livewire:popover-menu-item>
        @endif
        @if ($items['invoice'])
            <livewire:popover-menu-item is="button" @click="order_id = {{ $order->id }}" label="Generate Invoice"></livewire:popover-menu-item>
        @endif
        @if ($items['rerun'])
            <livewire:popover-menu-item href="mailto:support@laravelshift.com" label="Request Rerun"></livewire:popover-menu-item>
        @endif

    </div>
  </div>
</div>
