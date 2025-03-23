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
                    <section>
                        <div class="container py-5">
                            <div class="row">
                                <div class="col-md-5">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{session()->get('success')}}
                                        </div>
                                    @endif
                                    <div class="card p-3">
                                        <form action="{{route('admin.post.store')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <h2>Add Products</h2>
                                            <div class="mb-3">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" name="name" id=""
                                                    value="{{old('name')}}">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="">Image</label>
                                                <input type="file" class="form-control" name="image" id="">
                                                @error('image')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Qty</label>
                                                <input type="text" class="form-control" name="qty" id=""
                                                    value="{{old('qty')}}">
                                                @error('qty')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Product category</label>
                                                <select name="category" required>
                                                    <option>Select a Option</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->slug}}">{{$category->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Price</label>
                                                <input type="text" class="form-control" name="price" id=""
                                                    value="{{old('price')}}">
                                                @error('price')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="30"
                                                    rows="10"
                                                    value="{{old('description')}}">{{old('description')}}</textarea>
                                                @error('body')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">#</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <th scope="row">{{$post->id}}</th>
                                                    <td>{{$post->name}}</td>
                                                    <td><img style="width:150px"
                                                            src="{{asset('uploads/images/' . $post->image)}}" alt="">
                                                    </td>
                                                    <td>{{$post->qty}}</td>
                                                    <td>{{$post->price}}</td>
                                                    <td>{{$post->category}}</td>
                                                    <td>{{$post->description}}</td>
                                                    <td>Edit</td>
                                                    <td>
                                                        <form action="{{route('post.destroy', $post->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm remove-from-cart"
                                                                type="submit">Delete</button>

                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach ()




                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </section>
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