<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstrumentController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $instruments = DB::table('instruments_locations', '_IL')
            ->join('instruments_status as _IS', '_IL.instrument_id', '=', '_IS.instrument_id')
            ->join('locations as _L', '_IL.location_id', '=', '_L.id')
            ->join('instruments as _I', '_IL.instrument_id', '=', '_I.id')
            ->join('status as _S', '_IS.status_id', '=', '_S.id')
            ->select(['_L.name as location', '_I.name as instrument', '_S.name as status'])
            ->get();

        $locations = DB::table('locations')->get(['name', 'id']);
        $status = Status::query()->get(['name', 'id']);

        return view('instruments', [
            'instrument' => $instruments ?? 'No instrument exists',
            'locations' => $locations ?? 'No locations exists',
            'status' => $status ?? 'No status exists'
        ]);
    }

    public function show(Request $request, string $name)
    {
        $instrument = DB::table('instruments_locations', '_IL')
            ->join('instruments_status as _IS', '_IL.instrument_id', '=', '_IS.instrument_id')
            ->join('locations as _L', '_IL.location_id', '=', '_L.id')
            ->join('instruments as _I', '_IL.instrument_id', '=', '_I.id')
            ->join('status as _S', '_IS.status_id', '=', '_S.id')
            ->where('instruments.name', '=', $name)
            ->select(['_L.name as location', '_I.name as instrument', '_S.name as status'])
            ->get();

        $location = DB::table('locations')->get(['name', 'id']);
        $status = Status::query()->get(['name', 'id']);

        return view('instruments', [
            'instrument' => $instrument ?? 'Instrument does not exist',
            'locations' => $location ?? 'Locations does not exist',
            'status' => $status ?? 'No status exists'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'status' => 'required'
        ]);

        $instrument = [
            'name' => $request->post('name'),
            'location' => $request->post('location'),
            'status' => $request->post('status')
        ];
        $status = $instrument['status'];
        $location = $instrument['location'];
        $id = DB::table('instruments')->insertGetId([
            'name' => $instrument['name']
        ]);
        if(!is_int($id))
            return response(409);

        Db::table('instruments_status')->insert([
            'instrument_id' => $id,
            'status_id' => $location
        ]);
        Db::table('instruments_locations')->insert([
            'instrument_id' => $id,
            'location_id' => $status
        ]);

        return response($instrument, 201);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:instruments',
            'location' => 'required',
            'status' => 'required'
        ]);
        print_r($validated);

        $instrument = Db::table('instruments')
            ->where('id', '=', $id)
            ->get();

        if (!set($instrument)) {
            response('Instrument could not be found by the given id: ' . $id, 404);
        }

        Db::table('instruments')
            ->where('id', '=', $id)
            ->update(['name' => $instrument['name']]);
        return response($instrument);
    }
}
