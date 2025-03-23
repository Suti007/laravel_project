<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h4>{{$categoryName}}</h4>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                    <form action="{{url('search')}}" method="get" class="form-inline"
                        style="float: right; padding: 10px;">
                        <input class="form-control" type="search" name="search" placeholder="search">
                        <input type="submit" value="Search" class="btn btn-success">
                    </form>
                </div>
            </div>
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <div class="product-item">
                        {{-- <a href="{{route('detail', $post->id)}}"> --}}
                            <a href="detail/{{$post->id}}">
                                <img height="200" width="300" src="{{asset('uploads/images/' . $post->image)}}"
                                    alt="{{$post->name}}"></a>
                            <div class="down-content">
                                {{-- <a href="{{route('detail', $post->id)}}"> --}}
                                    <a href="detail/{{$post->id}}">
                                        <h4>{{$post->name}}</h4>
                                    </a>
                                    <h6>${{$post->price}}</h6>
                                    <p>{{$post->description}}</p>
                                    {{-- <a class="btn btn-primary" href="#">Add Cart</a> --}}
                                    <form action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        {{-- <input type="hidden" name="post_image" value="{{$post->image}}"> --}}
                                        <input type="number" value="1" min="1" class="form-control" style="width:100px"
                                            name="quantiy">
                                        <br>
                                        <input class="btn btn-primary" type="submit" value="Add Cart">
                                    </form>

                                    {{-- <form action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="number" name="quantiy" value="1" min="1">
                                        <button type="submit">Add to Cart</button>
                                    </form> --}}
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (32)</span>
                            </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>