<?php

namespace App\Http\Controllers\API\Car;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarCreationRequest;

use App\Car;
use Storage;
class CarController extends Controller
{
    public function index()
    {
        // App::setlocale('en');
        $cars = Car::with('owner')->with('mechanic')->select('*')->get();
        foreach ($cars as $car) {
            $img_link = Storage::url($car->image);
            $car->image = $img_link;
        }
        return response()->json($cars); 
    }

    public function store(CarCreationRequest $request){
        $image = $request->file('image');

		$path = 'uploads/images/';

		// $name = $image->getClientOriginalName();
		// $name = 'image_file.png';
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

		if ($result) {
            $status = true;
        } else {
            $status = false;
        }

        return response()->json(['status' => $status]);
    }
}
