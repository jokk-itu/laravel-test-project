<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstrumentController extends Controller
{
    public function __construct()
    {}

    public function index(Request $request)
    {
        $instruments = DB::table('instruments')
            ->get();

        return view('instruments', [
            'instrument' => $instruments ?? 'No instrument exists',
        ]);
    }

    public function show(Request $request, string $name)
    {
        $instrument = DB::table('instruments')
            ->where('name', $name)
            ->get();

        return view('instruments', [
            'instrument' => $instrument ?? 'Instrument does not exist',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:instruments'
        ]);

        $instrument = $request->post();
        DB::table('instruments')->insert([
            'name' => $instrument['name']
        ]);

        return response($instrument,201);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:instruments'
        ]);
        $instrument = Db::table('instruments')
            ->where('id'. $id)
            ->get();
        if(!set($instrument))
        {
            response('Instrument could not be found by the given id: ' . $id, 404);
        }
        Db::table('instruments')
            ->where('id', $id)
            ->update(['name' => $instrument['name']]);
        return response($instrument);
    }
}
