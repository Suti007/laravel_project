<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('admin.css')
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar_admin')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    {{-- @include('admin.body') --}}
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-white">
                                    <h2 class="text-xl font-bold mb-4">Recent Orders</h2>
                                    <table class="min-w-full bg-black">
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
                                    <table class="min-w-full bg-black">
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
                                    <a href="{{route('admin.post.index')}}"
                                        class="text-blue-500 hover:text-red-500">Product Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>