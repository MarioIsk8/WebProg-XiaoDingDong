@extends('../components/master')

@section('title','XIAO DING DONG | HOME')

@section('content')
<style>
    form{
        max-width: 700px;
        margin: 0 auto;
        padding: 20px;
    }

    .right-container{
        margin-left: 10px;
        width: 80%;
    }

    .left-container{
        margin-right: 10px;
        width: 80%;
    }

    .container{
        margin-right: 10px;
        width: 100%;
    }

    label{
        background-color: black;
        color: gold;
    }
</style>

    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <h2 style="color:gold; font-weight:bold; background-color:black; text-align:center;">查看 | Checkout</h2>
        <h3 style="color: white; font-weight:bold;">Billing Information</h3>
        <div class="form-group" style="display:flex;">
            <div class="left-container">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Min 5 Characters" required minlength="5">
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
            </div>

            <div class="right-container">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Has to be 12 numbers" required pattern="[0-9]{12}">
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <br>

        <div class="form-group" style="display:flex;">
            <div class="left-container">
                <label for="country">Country:</label>
                    <select class="form-control" id="country" name="country" required>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Singapore">Singapore</option>
                        <option value="America">America</option>
                        <option value="China">China</option>
                        <option value="Israel">Israel</option>
                    </select>
                    @if ($errors->any())
                        <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                            <ul class="list-unstyled">
                                <li>{{ $errors->first() }}</li>
                            </ul>
                        </div>
                    @endif
            </div>

            <div class="right-container">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Min 5 Characters" required minlength="5">
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <br>

        <div class="form-group" style="display: flex;">
            <div class="left-container">
                <label for="cardholder_name">Cardholder Name:</label>
                <input type="text" class="form-control" id="cardholder_name" name="cardholder_name" placeholder="Min 3 Characters" required minlength="3">
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
            </div>

            <div class="right-container">
                <label for="card_number">Card Number:</label>
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Must be numerical and have 16 characters" required pattern="[0-9]{16}">
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
            </div>

        </div>

        <br>

        <h3 style="color: white; font-weight:bold;">Additional Information</h3>
        <div class="form-group container">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" placeholder="Min 5 Characters" required minlength="5"></textarea>
            {{-- @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif --}}
        </div>

        <br>

        <div class="form-group container">
            <label for="zip_code">ZIP / Postal Code:</label>
            <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Fill with number only" required pattern="[0-9]">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <br>

        <div style="display: flex; justify-content:flex-end">
            <a href="/checkout" class="btn btn-primary" style="text-align: center; background-color: black; color:gold; border:black; margin-right: 6px;">Cancel</a>
            <button type="submit" class="btn btn-danger" style="margin-right: 5px; text-align:center; background-color: black; color:gold; border: black; margin-left:6px">Place Order</button>
        </div>

        {{-- @if(session('success'))
            <div id="success-message" class="alert alert-success position-fixed top-0 start-50 translate-middle-x">
                    {{ session('success') }}
            </div>
        @endif --}}

    </form>
@endsection
