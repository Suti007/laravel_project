<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Order ID</th>
                                <th class="py-2 px-12 border-b">User</th>
                                <th class="py-2 px-4 border-b">Total Amount</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th class="py-2 px-4 border-b">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{$order->id}}</td>
                                    <td class="py-2 px-12 border-b">{{$order->user->name}}</td>
                                    <td class="py-2 px-4 border-b">{{$order->total_amouont}}</td>
                                    <td class="py-2 px-4 border-b">{{ucfirst($order->status)}}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <a href="{{route('post.welcome')}}" class="text-blue-500 hover:text-red-500">Product Page</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>