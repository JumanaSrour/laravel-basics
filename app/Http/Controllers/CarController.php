<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarCreationRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\CarPriceComputeTrait;
use App\Car;
use App\Mechanic;
use App;
class CarController extends Controller
{
    use CarPriceComputeTrait;
    public function index()
    {
        App::setlocale('en');
        $cars = Car::with('owner')->with('mechanic')->select('*')->get();
        foreach ($cars as $car) {
            $img_link = Storage::url($car->image);
            $car->image = $img_link;

            $price_after_discount = $this->compute_car_price_after_discount($car);
            $price_after_tax = $this->compute_car_price_after_tax($car, $price_after_discount);

            $car->final_price = $price_after_tax;
        }
        return view('car.index')->with('cars', $cars);   
    }

    public function create(){
        $mechanics = Mechanic::select('id', 'NAME')->get();
        return view('car.create')->with('mechanics', $mechanics);
    }

    public function store(CarCreationRequest $request)
    {
        $image = $request->file('image');

		$path = 'uploads/images/';
		$name = time()+rand(1, 10000000000) . '.' . $image->getClientOriginalExtension();

		Storage::disk('local')->put($path.$name , file_get_contents($image));

		$status = Storage::disk('local')->exists($path.$name);

        $model = $request['model'];
		$mechanic_id = $request['mechanic_id'];

		$car = new Car();
		$car->model = $model;
		$car->mechanic_id = $mechanic_id;
		$car->image = $path.$name;
		$result = $car->save();

		return redirect()->back()->with($result);
        return redirect()->back()->with('add_status', $result);
    }
}
