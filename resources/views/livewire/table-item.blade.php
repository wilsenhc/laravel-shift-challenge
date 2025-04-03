<tr class="border-t {{ (isset($dashboard) && $order->status->value === \App\Enums\OrderStatus::Pending) ? 'border-b-2 border-gray-300 border-dashed' : 'border-gray-200'}}">
    <td class="py-4 pl-6 pr-2 whitespace-nowrap">
        <div class="text-gray-800 font-semibold">{{ $order->product->name }}</div>
        <div class="mt-1 text-gray-600">#{{ $order->id }}</div>
    </td>
    <td class="py-4 px-2 whitespace-nowrap">
        <div class="text-gray-800 font-semibold">
            <a href="{{ service_url($order->connection->service, $order->repository) }}" title="View repository on {{ $order->connection->service->name }}" class="group hover:underline focus:underline focus:outline-none" rel="external" target="_blank">
                {{ $order->repository }}
                <span class="opacity-0 group-hover:opacity-100 ml-1 text-sm"><i class="fa fa-external-link text-gray-500"></i></span>
            </a>
        </div>
        <div class="mt-1 text-gray-600">{{ $order->source_branch }}</div>
    </td>
    @if ($order->status->value === \App\Enums\OrderStatus::Pending)
        <td class="py-4 px-2">-</td>
    @else
        <td class="py-4 px-2 whitespace-nowrap" title="{{ $order->run_at->format('l, F j, Y') }}">
            @if ($order->status === \App\Enums\OrderStatus::Running || $order->status === \App\Enums\OrderStatus::Queueing)

                {{ $order->run_at->diffForHumans() }}
            @else
                {{ $order->run_at->diffForHumans() }}
            @endif
            @isset($teamView)
                <div class="mt-1 text-gray-600 text-sm">
                    by
                    @if ($order->user->avatar)
                        <img src="{{ $order->user->avatar }}" alt="Avatar for {{ $order->user->email }}" class="inline-block h-4 w-4 rounded max-w-ws">
                    @else
                        <span class="inline-block w-4 h-4 flex items-center justify-center rounded bg-gray-100 text-gray-300 text-xl">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    @endif
                    <a href="{{ $order->connection->url() }}" title="View profile on {{ $order->connection->service->name }}" class="hover:underline focus:underline focus:outline-none" rel="external" target="_blank">{{ $order->connection->service_username }}</a>
                </div>
            @endisset
        </td>
    @endif
    <td class="py-4 px-2 text-center">
        @if ($order->status->value === 'issue' || $order->status->value === 'failed')
        <button
            type="button"
            class="inline-block w-32 px-3 py-1 rounded-full bg-orange-100 text-orange-800 font-bold text-sm whitespace-nowrap hover:bg-orange-200 focus:bg-orange-200 focus:outline-none"
            title="Review issue and rerun"
            @click="openIssueModal({
                rerun: true,
                id: '{{ $order->id }}',
                source_branch: '{{ $order->source_branch }}',
                repository: '{{ $order->repository }}',
                connection_id: '{{ $order->connection_id }}',
            })"
        >
            <i class="fa fa-warning fa-fw text-orange-500"></i> Issue
        </button>
        @endif
        @if ($order->status->value === 'failed')
        <button
            type="button"
            class="inline-block w-32 px-3 py-1 rounded-full bg-red-100 text-red-800 font-bold text-sm whitespace-nowrap hover:bg-red-200 focus:bg-red-200 focus:outline-none"
            title="Shift failed"
            @click="openIssueModal({
                rerun: false,
                id: '{{ $order->id }}',
                source_branch: '{{ $order->source_branch }}',
                repository: '{{ $order->repository }}',
                connection_id: '{{ $order->connection_id }}',
            })"
        >
            <i class="fa fa-times fa-fw text-red-600"></i> Failed
        </button>
        @endif
        @if ($order->status->value === 'completed')
        <a
            href="github.com"
            class="text-shift-red font-bold text-sm whitespace-nowrap hover:underline focus:underline focus:outline-none"
            title="View {{ Str::lower(pr_name($order->connection->service)) }}"
            rel="external"
            target="_blank">
            <i class="fa fa-code-fork fa-fw"></i><span x-text="$wire.order && $wire.order.pr_number"></span>
        </a>
        @endif
        @if ($order->status->value === 'paused' || $order->status->value === 'hold' || $order->status->value === 'pending' || $order->status->value === 'fulfilled')
        <button
            type="button"
            class="inline-block w-32 px-3 py-1 rounded-full bg-green-100 text-green-800 font-bold text-sm whitespace-nowrap hover:bg-green-200 focus:bg-green-200 focus:outline-none"
            title="Review and run"
            @click="openRunModal({
                rerun: false,
                id: '{{ $order->id }}',
                source_branch: '{{ $order->source_branch }}',
                repository: '{{ $order->repository }}',
                connection_id: '{{ $order->connection_id }}',
            })"
        >
            <i class="fa fa-play fa-fw text-green-700"></i> Pending
        </button>
        @endif
        @if ($order->status->value === 'queueing')
        <div
            wire:show="status === 'queueing'"
            class="inline-block w-32 px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 font-bold text-sm whitespace-nowrap cursor-wait"
        >
            <i class="fa fa-circle-o-notch fa-spin fa-fw text-yellow-600"></i> Queueing...
        </div>
        @endif
        @if ($order->status->value === 'running')
        <div
            wire:show="status === 'running'"
            class="inline-block w-32 px-3 py-1 rounded-full bg-blue-100 text-blue-800 font-bold text-sm whitespace-nowrap cursor-wait"
        >
            <i class="fa fa-cog fa-spin fa-fw text-blue-600"></i> Running...
        </div>
        @endif
    </td>
    <td class="py-4 pr-6 pl-2 relative">
        @if ($order->status === \App\Enums\OrderStatus::Fulfilled)
            @php
                $items = [
                    'next' => $order->hasNextUpgradeShift(),
                    'invoice' => $order->isPaid(),
                    'rerun' => $order->eligibleForRerun(),
                ];
            @endphp
            @if (!empty(array_filter($items)))
                <livewire:popover-menu id="{{ $order->id }}" :items="$items" :order="$order"></livewire:popover-menu>
            @endif
        @endif
    </td>
</tr>
