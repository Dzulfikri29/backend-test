<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

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

    public function store(Request $rquest)
    {
        $item = new Item();
        $item->code = $request->code;
        $item->name = $request->name;
        $item->unit = $request->unit;
        $item->minimum_stock = $request->minimum_stock;
        $item->descrition = $request->description;
        $item->save();

        if ($request->image) {
            $file = $request->file('image')->store('item');

            $item->update(
                [
                    'image' => $file,
                ]
            );
        }

        return redirect()->route('item.index')->with(['message' => 'Berhasil menambahkan barang']);
    }

    public function data(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data['item'] = Item::find($id);

        return view('item.show', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        Storage::delete($item->image);

        return redirect()->route('item.index')->with(['message' => 'Berhasil menghapus barang']);
    }
}
