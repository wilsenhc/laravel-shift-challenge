<div class="mx-32">
    <h2 class="text-xl font-bold tracking-tight text-gray-700">Recents shifts</h2>
    <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">SHIFT</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PROJECT</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">RUN</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">STATUS</th>
                <!-- <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                </th> -->
            </tr>
        </thead>
        <tbody class="border-t-2 border-gray-200 text-gray-800">
        @foreach ($orders as $order)
            <livewire:table-item :order="$order" :key="$order->id">
        @endforeach
        </tbody>
    </table>
</div>
