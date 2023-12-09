<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public function showMainCourse()
    {
        $foods = Food::where('food_cat', 'Main Course')->get();

        $category = 'Main Course';

        $count = $foods->count();
        // dump($foods);
        return view('home')->with('foods', $foods)->with('category', $category)->with('count', $count);
    }

    public function showOtherType($type)
    {
        $foods = Food::where('food_cat', $type)->get();

        $count = $foods->count();

        return view('home')->with('foods', $foods)->with('category', $type)->with('count', $count);
    }

    public function foodDetail($id){
        $food = Food::find($id);

        return view('foodDetail')->with('food',$food);
    }


    // lex
    public function index()
    {
        $foods = Food::all();
        return view('managefood', compact('foods'));
    }

    public function create()
    {
        if(Auth::check() && auth()->user()->role=='admin'){
            return view('addnewfood');
        }
        else{
            return redirect()->route('home');
        }

    }

    public function store(Request $request)
    {
        if(Auth::check() && auth()->user()->role!='admin'){
            return redirect()->route('home');
        }

        $validateData = $request->validate([
            'food_name' => 'required|min:5',
            'food_desc' => 'required|max:100',
            'desc' => 'required|max:225',
            'food_cat' => 'required',
            'price' => 'required|numeric|min:0.01',
            'berkas' => 'required|file|mimes:jpg,png,jpeg'
        ]);

        $uploadedFile = $request->file('berkas');
        $originalFileName = $uploadedFile->getClientOriginalName();
        $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);
        $extension = $uploadedFile->getClientOriginalExtension();
        $uniqueFileName = $fileNameWithoutExtension . '-' . str::uuid() . '.' . $extension;
        $uploadedFile->move(public_path('images/'), $uniqueFileName);

        $foods = new Food();
        $foods->food_name = $validateData['food_name'];
        $foods->food_desc = $validateData['food_desc'];
        $foods->desc = $validateData['desc'];
        $foods->food_cat = $validateData['food_cat'];
        $foods->price = $validateData['price'];
        $foods->berkas = $uniqueFileName;
        $foods->save();

        $message = 'Food has been successfully added';

        return redirect()->route('managefood.index')->with('success', $message);
    }

    public function edit($id)
    {
        $food = Food::where('id', $id)->get();

        // dump($mahasiswa);
        return view('update', ['food' => $food]);
    }

    public function update(Request $request)
    {
        if(Auth::check() && auth()->user()->role!='admin'){
            return redirect()->route('home');
        }

        $validateData = $request->validate([
            'food_name' => 'required|min:5',
            'food_desc' => 'required|max:100',
            'desc' => 'required|max:225',
            'food_cat' => 'required',
            'price' => 'required',
            'berkas' => 'required|file|mimes:jpg,png,jpeg'
        ]);

        $uploadedFile = $request->file('berkas');
        $originalFileName = $uploadedFile->getClientOriginalName();
        $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME);
        $extension = $uploadedFile->getClientOriginalExtension();
        $uniqueFileName = $fileNameWithoutExtension . '-' . str::uuid() . '.' . $extension;
        $uploadedFile->move(public_path('images/'), $uniqueFileName);

        $validateData['berkas'] = $uniqueFileName;


        Food::where('id', $request->id)->update($validateData);

        $message = 'Food has been successfully updated';

        return redirect()->route('managefood.index')->with('success', $message);
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('managefood.index')->with('pesan', "Hapus Data $food->food_name berhasil");
    }

    public function search(Request $request)
    {
        $query = $request->input('food_name');

        // Use the $query to filter your database results
        $foods = Food::where('food_name', 'like', '%' . $query . '%')->get();

        return view('managefood', compact('foods'));
    }

    public function filter(Request $request)
    {
        $foodCategories = $request->input('food_cat', []);

        // Use the $foodCategories to filter your database results
        $foods = Food::whereIn('food_cat', $foodCategories)->get();

        return view('managefood', ['foods' => $foods, 'foodCategories' => $foodCategories]);
    }


}
