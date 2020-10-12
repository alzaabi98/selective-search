<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $loc  = $request->location;
        $q = $request->text;


        $medicines = Medicine::where('name', 'LIKE', '%' . $q . '%')->whereHas('pharmacy.location', function (Builder $query) use ($loc) {
            $query->where('name', $loc);
        })->get();

        //$medicines = Medicine::where('name', 'LIKE', '%' . $q . '%')->get();

        $locations = Location::all();

        if (count($medicines) > 0) {

            return view('home')->withDetails($medicines)->withQuery($q)->withLocations($locations);
        } else {
            return view('home')->withMessage('No Medicine found. Try to search again !')->withLocations($locations)->withQuery($q);
        }
        //dd($request->text);
    }
}
