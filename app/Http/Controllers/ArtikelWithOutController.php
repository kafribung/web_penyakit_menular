<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Class Request
use App\Http\Requests\ArtikelRequest;

// Import Db Artikel
use App\Models\Artikel;

use Illuminate\Support\Str;
class ArtikelWithOutController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('id', 'desc')->get();

        return view('dashboard.WITHOUT_artikel', compact('artikels'));
    }

    public function create()
    {
        return view('dashboardCreate.WITHOUT_artikel_create');
    }

    public function store(ArtikelRequest $request)
    {
        $data = $request->all();

        if ($request->has('img')) {
            $img      = $request->file('img');
            $name_img = time().'.'. $img->getClientOriginalExtension();
            $img->move(public_path('/artikels'), $name_img);
    
            $data['img'] = $name_img;
        }
        $data['user_id'] = 1;

        Artikel::create($data);

        return redirect('/artikel-without-route')->with('msg', 'Artikel berhasil ditambahakan');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('dashboardEdit.WITHOUT_artikel_edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'min:3','max:100'],
            'content' => ['required', 'string'],
            'img'     => ['required', 'mimes:png,jpg,jpeg']
        ]);

        if ($request->has('img')) {
            $img      = $request->file('img');
            $name_img = time().'.'. $img->getClientOriginalExtension();
            $img->move(public_path('/artikels'), $name_img);
    
            $data['img'] = $name_img;
        }

        Artikel::findOrFail($id)->update($data);

        return redirect('/artikel-without-route')->with('msg', 'Artikel berhasil diedit');
        
    }

   
    public function destroy($id)
    {
        Artikel::destroy($id);

        return redirect('/artikel-without-route')->with('msg', 'Artikel berhasil dihapus');
    }
}

