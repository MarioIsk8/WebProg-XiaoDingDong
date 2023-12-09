@extends('./components/master')

@section('title','XIAO DING DONG | DETAILS')

@section('content')

<div class="d-flex flex-column justify-center text-warning" style="width: 80%; gap: 2rem; margin-top: 2rem;">
    <h1 style="text-align: center"> 食物细节 | Food Detail </h1>

    {{-- GRID CONTAINER --}}
    @if (!empty($food[0]))
        <div style="text-align: center; background-color: rgb(35, 35, 35);font-size: 25px;color: whitesmoke">Food is not available</div>
    @else
        <div style="background-color: black;height: 500px; padding:15px; border-radius: 20px; gap:20px;" class="d-flex">
            <div style="height: 100%; width: 45%;">
                <img src="{{asset('images/'.$food->berkas)}}" alt="" style="height: 100%; width: 100%">
            </div>
            <div style="gap: 10px; width: 50%" class="d-flex flex-column">
                <h4>{{$food->food_name}}</h4>
                <div>
                    <h5>Food Type</h5>
                    <p style="color: whitesmoke">{{$food->food_cat}}</p>
                </div>
                <div>
                    <h5>Food Price</h5>
                    <p style="color: whitesmoke">{{$food->price}}</p>
                </div>
                <div>
                    <h5>Brief Description</h5>
                    <p style="color: whitesmoke">{{$food->food_desc}}</p>
                </div>
                <div style="max-width: 100%">
                    <h5>About This Food</h5>
                    <p style="color: whitesmoke">{{$food->desc}}</p>
                </div>
                @if (Auth::check() && auth()->user()->role == 'user')
                    <form method="POST" action="{{route('cart.add',$food->id)}}">
                        @csrf
                        <input type="hidden" value="{{$food->id}}" name="id">
                        <button type="submit" name="addToCart" class="btn bg-dark text-warning" >Add To Cart</button>
                    </form>
                @endif
                {{-- @if(session('success'))
                    <div id="success-message" class="alert alert-success position-fixed top-0 start-50 translate-middle-x">
                        {{ session('success') }}
                    </div>
                @endif --}}

            </div>
        </div>
    @endif

</div>

@endsection
