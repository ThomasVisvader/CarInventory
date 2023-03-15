<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(Request $request): View
    {
        $cars = Car::getFilteredCars($request);
        $filters = $request->query();
        return view('cars.cars-list', [
            'cars' => $cars,
            'filters' => $filters
        ]);
    }

    public function create(): View
    {
        return view('cars.cars-create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $car = new Car();
        $car['name'] = $request->request->get('name');
        $car['registration_number'] = $request->request->get('registration_number');
        $car['is_registered'] = $request->request->get('is_registered') === 'on';
        $car->save();

        return redirect()->route('cars.list');
    }

    public function edit($id): View
    {
        $car = Car::getCar($id);
        if($car == null) {
            return view('404');
        }
        else {
            return view('cars.cars-edit', [
                'car' => $car
            ]);
        }
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $car = Car::getCar($id);
        $car['name'] = $request->request->get('name');
        $car['registration_number'] = $request->request->get('registration_number');
        $car['is_registered'] = $request->request->get('is_registered') === 'on';
        $car->save();

        return redirect()->route('cars.list');
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $car = Car::getCar($id);
        $car->delete();

        return redirect()->route('cars.list');
    }
}
