<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PemilikRequest;
use DB;

use App\Pemilik;
use App\Hewan;

use Storage;
use Carbon\Carbon;

class PemilikController extends Controller
{
    public function index () {
        $penitip_list = Pemilik::orderBy('nama_pemilik', 'asc')->Paginate(5);
        $jumlah_penitip = Pemilik::count();
        return view('layouts.index', compact('penitip_list','jumlah_penitip'));
    }

    public function show(Pemilik $pemilik) {
        $list_hewan = Hewan::pluck('jenis_hewan', 'id');
        return view('layouts.detail', compact('pemilik', 'list_hewan'));
    }

// | -------------------------------------------------------------------------------------------------------
// | CREATE
// | -------------------------------------------------------------------------------------------------------
    public function create() {
        $list_hewan = Hewan::pluck('jenis_hewan', 'id');
        return view('layouts.create', compact('list_hewan'));
    }

    public function store(PemilikRequest $request) {
        $input = $request->all();

        $now = Carbon::now();
        $input['batas_waktu_titip'] = $now->addDays($input['batas_waktu_titip']);

        // Upload foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        $pemilik = Pemilik::create($input);

        //data untuk pivot table
        $nama_hewan = $request->input('nama_hewan');
        $jenis_kelamin = $request->input('jenis_kelamin');
        if(isset($input['foto'])){
        }
        else{
            $input['foto']=null;
        }

        if($pemilik){
            $pemilik->hewan()->attach($request->input('hewan_pemilik'), ['jenis_kelamin' => $jenis_kelamin, 'nama_hewan' => $nama_hewan, 'foto' => $input['foto']]);
        }
        return redirect('layouts');
    }

// | -------------------------------------------------------------------------------------------------------
// | UPDATE
// | -------------------------------------------------------------------------------------------------------
public function edit(Pemilik $pemilik) {
    $list_hewan = Hewan::pluck('jenis_hewan', 'id');

    return view('layouts.edit', compact('pemilik','list_hewan'));
}

public function update(Pemilik $pemilik, PemilikRequest $request) {

    $input = $request->all();

    //update foto
    if ($request->hasFile('foto')) {
        $input['foto'] = $this->updateFoto($pemilik, $request);
    } else{
        $input['foto']=null;
    }

    //data untuk pivot table
    $nama_hewan = $request->input('nama_hewan');
    $jenis_kelamin = $request->input('jenis_kelamin');

    $pemilik->update($input);
    
    $pemilik->hewan()->wherePivot('id_pemilik', '=', $pemilik->id)->detach();
    $input_pivot = $pemilik->hewan()->attach($request->input('hewan_pemilik'), ['nama_hewan' => $nama_hewan, 'jenis_kelamin' => $jenis_kelamin, 'foto' => $input['foto']]);
    
    return redirect('layouts');
}

// | -------------------------------------------------------------------------------------------------------
// | DELETE
// | -------------------------------------------------------------------------------------------------------
public function destroy(Pemilik $pemilik) {
    // mengambil data nama foto
    $tes = DB::table('hewan_pemilik')->select('foto')->where('id_pemilik', $pemilik->id)->get();
    
    $data = json_decode($tes, true);
    if($data){
        $nama_foto = $data[0]['foto'];
        $exist = Storage::disk('foto')->exists($nama_foto);

        // Hapus foto lama
        if (isset($nama_foto) && $exist) {
            $delete = Storage::disk('foto')->delete($nama_foto);
        }
    }
    
    $pemilik->delete();
    return redirect('layouts');
  }


// | -----------------------------------------------| // -------------------------------------------------------
// | UPLOAD FOTO                                    | //
// | -----------------------------------------------| //--------------------------------------------------------
    private function uploadFoto(PemilikRequest $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $foto_name   = date('YmdHis'). ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }

// | -------------------------------------------------------------------------------------------------------
// | UPDATE FOTO
// | -------------------------------------------------------------------------------------------------------
    private function updateFoto(Pemilik $pemilik, PemilikRequest $request) {
        // Jika user mengisi foto.
        if ($request->hasFile('foto')) {
            // mengambil data nama foto
            $tes = DB::table('hewan_pemilik')->select('foto')->where('id_pemilik', $pemilik->id)->get();
            $data = json_decode($tes, true);
            if($data){
                $nama_foto = $data[0]['foto'];
                $exist = Storage::disk('foto')->exists($nama_foto);
                
                // Hapus foto lama
                if (isset($nama_foto) && $exist) {
                    Storage::disk('foto')->delete($nama_foto);
                }
            }
            //upload foto baru
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();

            if ($request->file('foto')->isValid()) {
                $foto_name   = date('YmdHis'). ".$ext";
                $request->file('foto')->move('fotoupload', $foto_name);
                return $foto_name;
            }
            
        }
    }

}
