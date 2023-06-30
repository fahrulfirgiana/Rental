<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SopirControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sopirs = sopir::latest()->paginate(20);
        return view('sopir.index', compact('sopirs'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sopir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_sopir' => 'required',
            'nm_sopir' => 'required',
            'nohp' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'ket' => 'required',
            'gambar' => 'required',
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'sopirdata_file';
        $file->move($tujuan_upload, $nama_file);

        Sopir::create([
            'kd_sopir' => $request->kd_sopir,
            'nm_sopir' => $request->nm_sopir,
            'nohp' => $request->nohp,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'ket' => $request->ket,
            'gambar' => $nama_file,
        ]);
        return redirect()->route('sopir.index')
            ->with('success', 'Sopir created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(sopir $sopir)
    {
        return view('sopir.edit', compact('sopir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sopir $sopir)
    {
        $request->validate([
            'kd_sopir' => 'required',
            'nm_sopir' => 'required',
            'nohp' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'ket' => 'required',
        ]);
        $sopir->update($request->all());
        return redirect()->route('sopir.index')
            ->with('success', 'Data berhasil dirubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sopir $sopir)
    {
        File::delete('data_file/' . $sopir->gambar);
        $sopir->delete();
        return redirect()->route('sopir.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
