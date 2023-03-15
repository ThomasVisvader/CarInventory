<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    const PERPAGE = 10;
    protected $table = 'cars';

    public static function getCars(): \Illuminate\Database\Eloquent\Collection
    {
        return Car::all();
    }

    public static function getCar($id){
        return Car::find($id);
    }

    public static function getFilteredCars(Request $request) {
        $query = "SELECT *
                FROM cars
                WHERE 1=1";

        $bindings = [];

        // name
        if ($request->query->has('name') && $request->query->get('name') != null) {
            $query .= " AND (LOWER(name) LIKE ?)";
            array_push($bindings, "%".$request->query->get('name')."%");
        }

        // is_registered
        if ($request->query->has('is_registered') && $request->query->get('is_registered')) {
            $query .= " AND (is_registered = 1)";
        }


        $query .= " ORDER BY name";
        $cars = DB::select($query, $bindings);
        $page = $request->input('page', 1);
        $offset = ($page * self::PERPAGE) - self::PERPAGE;
        return new LengthAwarePaginator(array_slice($cars, $offset, self::PERPAGE, true),
            count($cars), self::PERPAGE, $page, ['path' => $request->url(), 'query' => $request->query()]);

    }
}
