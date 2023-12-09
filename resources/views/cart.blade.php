@extends('../components/master')

@section('title','XIAO DING DONG | CART')

@section('content')

<style>
    th,tr,td{
        border: 1px solid black;
    }
</style>

<div class="d-flex flex-column justify-center text-warning" style="width: 80%; gap: 2rem; margin-top: 2rem;">
    <h1> 你的购物车 | CART</h1>


    @if ($count>0)
        <table class="table table-bordered" style="text-align: center; width: 100%">
            <thead style="background-color: black; width: 100%" class="text-warning">
                <tr>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            {{-- style="background-color: gray" --}}
            <tbody  style="color: whitesmoke; background-color: rgb(90, 89, 89)" >
                @php
                    $total=0;
                @endphp
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{$cart->food->food_name}}</td>
                        <td>${{$cart->food->price}}</td>
                        <td>{{$cart->qty}}</td>
                        <td>${{$cart->qty*$cart->food->price}}</td>
                        <td>remove</td>
                    </tr>
                    @php
                        $total+=$cart->qty*$cart->food->price;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div style="align-self: flex-end; color: white; margin: 5px 10px 0 0" class="d-flex flex-column ">
            <h3>Total Price: ${{$total}}</h3>
            <input type="button" value="Proceed To Checkout" style="width:fit-content; align-self:flex-end; background-color: black;border-radius:10px; color:whitesmoke" class="btn">
        </div>
    @else
        <div style="background-color: black; border-radius: 20px">
            <h1 class="text-warning">Your cart is empty... </h1>
            <p style="color: whitesmoke">Looks like your cart is on a diet! Don't worry our delicious dishes are just a few clicks away. Start filling up your cart and let the feast begin!</p>
        </div>
    @endif

</div>

@endsection
