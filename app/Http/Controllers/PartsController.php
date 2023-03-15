<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    public function index(Request $request): View
    {
        $parts = Part::getFilteredParts($request);
        $filters = $request->query();
        $cars = Car::getCars();
        return view('parts.parts-list', [
            'parts' => $parts,
            'filters' => $filters,
            'cars' => $cars
        ]);
    }

    public function create(): View
    {
        $cars = Car::getCars();
        return view('parts.parts-create', [
            'cars' => $cars
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $part = new Part();
        $part['name'] = $request->request->get('name');
        $part['serial_number'] = $request->request->get('serial_number');
        $part['car_id'] = $request->request->get('car_id');
        $part->save();

        return redirect()->route('parts.list');
    }

    public function edit($id): View
    {
        $cars = Car::getCars();

        $part = Part::getPart($id);
        if($part == null) {
            return view('404');
        }
        else {
            return view('parts.parts-edit', [
                'part' => $part,
                'cars' => $cars
            ]);
        }
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $part = Part::getPart($id);
        $part['name'] = $request->request->get('name');
        $part['serial_number'] = $request->request->get('serial_number');
        $part['car_id'] = $request->request->get('car_id');
        $part->save();

        return redirect()->route('parts.list');
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $part = Part::getPart($id);
        $part->delete();

        return redirect()->route('parts.list');
    }
}
