<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $data['items'] = Item::all();
        return view('item.index', $data);
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function data(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
