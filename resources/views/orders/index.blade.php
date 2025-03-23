<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Sutthichart Ecommerce</h1> --}}

    <div id="teams" class="py-3">

        <div class="hero-section bg-cover-bg-center h-screen flex items-center justify-center text-white"
            style="height: 200px;background-image: url('{{asset('images/banner.jpg')}}');">

            <div class="bg-red bg-opacity-50 p-8 rounded text-center">
                <h1 class="text-5xl font-bold mb-4">Welcome to our Ecommerce store</h1>
                <p class="text-2xl mb-6">We have great design</p>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 roounded"
                    href={{route('post.welcome')}}>Show Now</a>


            </div>
        </div>
        <div class="container py-3">
            <h1>Manage orders</h1>
            {{-- <br><br><br> --}}
            <div class="gap-0">
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



            </div>
        </div>
    </div>