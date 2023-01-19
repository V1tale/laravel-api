<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Validation\rule;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }
    public function store(Request $request)
    {
        $val_data = $request->validate([
            'name' => ['required', 'unique:types']
        ]);
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $type = Type::create($val_data);
        return redirect()->back()->with('message', "Categoria $type->name è stata creata con successo");
    }
    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([
            'name' => ['required', Rule::unique('types')->ignore($type)]
        ]);
        $val_data['slug'] = Str::slug($val_data['name']);
        $type->update($val_data);
        return redirect()->back()->with('message', "La tipologia $type->name è stata aggiornata con successo");
    }
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('message', "La tipologia $type->name è stata cancellata");
    }
}
