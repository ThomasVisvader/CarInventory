<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Part extends Model
{
    use HasFactory;
    const PERPAGE = 10;
    protected $table = 'parts';

    public static function getParts() {
        return Part::all();
    }

    public static function getFilteredParts(Request $request) {
        $query = "SELECT *
                FROM parts
                WHERE 1=1";

        $bindings = [];

        // name
        if ($request->query->has('name') && $request->query->get('name') != null) {
            $query .= " AND (LOWER(name) LIKE ?)";
            array_push($bindings, "%".$request->query->get('name')."%");
        }

        // car_id
        if ($request->query->has('car_id') && $request->query->get('car_id') != null) {
            $query .= " AND (car_id = ?)";
            array_push($bindings, $request->query->get('car_id'));
        }

        $query .= " ORDER BY name";
        $cars = DB::select($query, $bindings);
        $page = $request->input('page', 1);
        $offset = ($page * self::PERPAGE) - self::PERPAGE;
        return new LengthAwarePaginator(array_slice($cars, $offset, self::PERPAGE, true),
            count($cars), self::PERPAGE, $page, ['path' => $request->url(), 'query' => $request->query()]);

    }

    public static function getPart($id){
        return Part::find($id);
    }
}
