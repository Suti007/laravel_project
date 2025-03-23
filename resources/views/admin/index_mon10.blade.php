<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
            <nav class="space-x-4">
                <a href="{{route('admin.post.index')}}">Posts</a>
                <a href="{{route('admin.orders.index')}}">Orders</a>
                <a href="{{route('admin.users.index')}}">Users</a>
            </nav>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">Recent Orders</h2>
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
                            @foreach ($recentOrders as $order)
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
                    <h2>Recent Users</h2>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">User ID</th>
                                <th class="py-2 px-12 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUsers as $user)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{$user->id}}</td>
                                    <td class="py-2 px-12 border-b">{{$user->name}}</td>
                                    <td class="py-2 px-4 border-b">{{$user->email}}</td>

                                    <td class="py-2 px-4 border-b">
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('admin.post.create')}}">Create New Products</a>
                    <br>
                    <a href="{{route('admin.post.index')}}" class="text-blue-500 hover:text-red-500">Product Page</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>