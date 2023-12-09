@extends('../components/master')

@section('title','XIAO DING DONG | HOME')

@if ($category=='Main Course')
    <style>
        #mainCourse{background-color: black;} #beverage{background-color: rgb(32, 31, 31);} #dessert{background-color: rgb(32, 31, 31);}
    </style>
@elseif ($category=='beverage')
    <style>
        #mainCourse{background-color: rgb(32, 31, 31);} #beverage{background-color: black;} #dessert{background-color: rgb(32, 31, 31);}
    </style>
@else
    <style>
        #mainCourse{background-color: rgb(32, 31, 31);} #beverage{background-color: rgb(32, 31, 31);} #dessert{background-color: black;}
    </style>
@endif
@section('content')

{{-- border: 1px white solid;  --}}
<div class="d-flex flex-column justify-center text-warning" style="width: 80%; gap: 2rem; margin-top: 2rem;">
    <h1> 菜单 | MENU</h1>
    <div class="d-flex" style="gap: 20px">

        <a href="{{route('home')}}" class="text-warning " style="text-decoration: none">
            <div id="mainCourse" style="border: 1px solid white; width: 200px; border-radius: 10px;
                display: flex; justify-content: center; align-items: center;" href="{{route('home')}}">
                <div style="padding: 5px;"> 主菜 | Main Course</div>
            </div>
        </a>
        <a href="{{route('otherTypeFood','beverages')}}" class="text-warning" style="text-decoration: none">
            <div id="beverage" style="border: 1px solid white; width: 200px; border-radius: 10px;
                display: flex; justify-content: center; align-items: center;" >
                <div style="padding: 5px">饮料 | Beverages</div>
            </div>
        </a>

        <a href="{{route('otherTypeFood','dessert')}}" class="text-warning" style="text-decoration: none">
            <div id="dessert" style="border: 1px solid white; width: 200px; border-radius: 10px;
                display: flex; justify-content: center; align-items: center;">
                <div style="padding: 5px">甜点 | Desserts</div>
            </div>
        </a>

    </div>

    {{-- CATEGORY TITLE --}}
    <div style="width: 100%; background-color: black; font-size: 30px; text-align: center">
        @if ($category=='Main Course')
            主菜 | Main Course
        @elseif ($category=='beverage')
            饮料 | Beverages
        @else
            甜点 | Desserts
        @endif
    </div>

    {{-- GRID CONTAINER --}}
    @if ($count==0)
        <div style="text-align: center; background-color: rgb(35, 35, 35);font-size: 25px;color: whitesmoke">Food is not available</div>
    @else
        <div class="gridContainer" style="display: grid; grid-template-columns: repeat(3,31%); gap: 2rem; justify-content: center">
            @foreach ($foods as $food )
                <a href="{{route('food.detail',$food->id)}}" style="text-decoration: none" class="text-warning">
                    <div class="modifiedCard" style="background-color: black; width: 100%; min-height: 235px">
                        <img src="{{asset('images/'.$food->berkas)}}" alt="" style="width: 100%; height: 80%">
                        <div style="font-size: 20px;display: flex; justify-content: center;align-items: center; height: 20%;">{{$food->food_name}}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>

@endsection
