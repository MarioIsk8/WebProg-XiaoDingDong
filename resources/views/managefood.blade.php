@extends('../components/master')

@section('title','XIAO DING DONG | MANAGE FOOD')

<style>
    .hidden {
        display: none;
    }
</style>

@section('content')
<div class="d-flex flex-column justify-center text-warning" style="width: 80%; gap: 2rem; margin-top: 2rem;">

    <h2 style="color:gold; font-weight:bold;">管理食物 | Manage Foods</h2>

    <div>
        <form class="d-flex" role="search" method="GET" action="{{ route('managefood.search') }}" style="max-width: 600px;">
            <input class="form-control me-2" type="search" name="food_name" placeholder="Search Here..." aria-label="Search" style="flex: 1;">
            <button class="btn btn-outline-success text-light" type="submit" style="background-color: black; color:azure;">Search</button>
        </form>

        <div id="filterForm" class="d-flex" role="search" style="background-color:black; color:azure; font-weight:bold; max-width: fit-content; padding: 0 10px 0 10px;" method="GET" action="{{ route('managefood.filter') }}">
            <h5 style="margin: 3px;">Filter Category</h5>
            <input type="checkbox" id="main_course" class="filterCheckbox" value="Main Course" style="margin-left: 20px;">
            <label for="main_course" style="margin: 3px;">Main Course</label>

            <input type="checkbox" id="beverages" class="filterCheckbox" value="Beverages" style="margin-left: 20px;">
            <label for="beverages" style="margin: 3px;">Beverage</label>

            <input type="checkbox" id="dessert" class="filterCheckbox" value="Dessert" style="margin-left: 20px;">
            <label for="dessert" style="margin: 3px;">Dessert</label>
        </div>
    </div>




    <div class="container mt-3" style="min-height: fit-content;">
        <div class="row" style="max-height: fit-content">
            @forelse ($foods as $food)
                @if ($food->food_cat=='Main Course')
                    <div class="col-md-3 mb-3 main-course">
                @elseif ($food->food_cat=='Beverages')
                    <div class="col-md-3 mb-3 beverages">
                @else
                    <div class="col-md-3 mb-3 dessert">
                @endif
                    <a href="{{route('food.detail',$food->id)}}" style="text-decoration: none">
                    <div class="card h-200" style="width: 100%; background-color:black; height: 600px;">
                        <img src="{{ asset('images/'.$food->berkas) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2" style="font-weight: bold; color:gold">{{ $food->food_name }}</h5>
                            <h6 style="font-weight: bold; color:azure;">Category</h6>
                            <p class="card-text mb-2" style="flex-grow: 1; overflow: hidden; text-overflow: ellipsis; color:azure;">{{ $food->food_cat }}</p>
                            <h6 style="font-weight: bold; color:azure;">Description</h6>
                            <p class="card-text mb-2" style="flex-grow: 1; overflow: hidden; text-overflow: ellipsis; color:azure;">{{ $food->desc }}</p>
                            @auth
                                @if(auth()->user()->role=='admin')
                                    <a href="/managefood/{{$food->id}}/edit"><button type="submit" class="btn btn-warning mt-2"  style="text-align: center; background-color: darkgray; color:azure;">Update</button></a>
                                    <form action="{{ route('managefood.destroy', $food) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning mt-2" style="text-align: center; background-color: red; color:azure;">
                                            <i class="bi bi-trash" style="border:azure;"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth

                        </div>
                    </div>
                    </a>
                </div>
            @empty
                <td colspan="6" class="text-center" style="background-color: grey;">
                    <h4 style="color: azure; text-align:center; background-color:darkgray;">Food is not available</h4>
                </td>
            @endforelse
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.filterCheckbox');
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                updateDisplay();
            });
        });

        function updateDisplay() {
            let anyCheckboxChecked = false;

            checkboxes.forEach(function (checkbox) {
                const className = checkbox.value.toLowerCase().replace(' ', '-');
                const elements = document.querySelectorAll('.' + className);

                if (checkbox.checked) {
                    anyCheckboxChecked = true;
                    elements.forEach(function (element) {
                        element.style.display = 'block';
                    });
                } else {
                    elements.forEach(function (element) {
                        element.style.display = 'none';
                    });
                }
            });

            if (!anyCheckboxChecked) {
                const allElements = document.querySelectorAll('.col-md-3');
                allElements.forEach(function (element) {
                    element.style.display = 'block';
                });
            }
        }

        updateDisplay();
    });
</script>

@endsection
