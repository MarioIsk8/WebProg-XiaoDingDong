@extends('../components/master')

@section('title','XIAO DING DONG | ADD NEW FOOD')

@section('content')
<style>
    form{
        max-width: 1000px;
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

    <form method="POST" action="{{ route('addnewfood.store') }}" enctype="multipart/form-data">
        @csrf

        <h2 style="color:gold; font-weight:bold;">添加新食物 | Add New Food</h2>

        <div class="form-group container">
            <label for="food_name">Food Name</label>
            <input type="text" class="form-control" id="food_name" name="food_name" required minlength="5" placeholder="Minimum 5 Characters">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <br>

        <div class="form-group container">
            <label for="food_desc">Food Brief Description</label>
            <textarea class="form-control" id="food_desc" name="food_desc" required maxlength="100" placeholder="Maximum 100 Characters"></textarea>
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <br>

        <div class="form-group container">
            <label for="desc">Food Full Description</label>
            <textarea class="form-control" id="desc" name="desc" required maxlength="255" placeholder="Maximum 255 Characters"></textarea>
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <br>

        <div class="form-group container">
            <label for="food_cat">Food Category</label>
                <select class="form-control" id="food_cat" name="food_cat" required>
                    <option value="Main Course">Main Course</option>
                    <option value="Beverages">Beverages</option>
                    <option value="Dessert">Dessert</option>
                </select>
                @if ($errors->any())
                    <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
        </div>

        <br>

        <div class="form-group container">
             <label for="price">Food Price</label>
             <input type="text" class="form-control" id="price" name="price" required min="1" placeholder="Must be more than 0">
             @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <br>

        <div class="form-group container">
            <label for="berkas">Food Picture</label>
            <input type="file" class="form-control-file" id="berkas" name="berkas" style="background-color: white; width: 100%" required>
            {{-- @if ($errors->any())
                <div id="error-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x">
                    <ul class="list-unstyled">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif --}}
        </div>


        <br>

        <div style="display: flex; justify-content:flex-end">
            <button type="submit" class="btn btn-primary" style="text-align: center; background-color: black; color:azure; border:black; margin-right: 5px;">Save</button>
            <a href="/addnewfood" class="btn btn-danger" style="text-align: center; background-color: black; color:azure; border:black; margin-left: 5px">Cancel</a>
        </div>

        {{-- @if(session('success'))
            <div id="success-message" class="alert alert-success position-fixed top-0 start-50 translate-middle-x">
                {{ session('success') }}
            </div>
        @endif --}}

    </form>
@endsection
