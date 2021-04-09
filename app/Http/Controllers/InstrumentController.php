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
        $instrument = DB::table('instruments')
            ->get();

        return view('instruments', [
            'instrument' => $instrument ?? 'No instrument exists',
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
        $instrument = $request->post();
        print_r($instrument);
        DB::table('instruments')->insert([
            'name' => $instrument['name']
        ]);

        return response(200);
    }


}
