<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\Penunjang;
use Illuminate\Support\Facades\DB;


use Livewire\Component;

class PeriksaPenunjang extends Component
{
    public $accounts, $account, $username, $account_id;
    public $foreign, $nama, $foto;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields(){
        $this->foreign = '';
        $this->nama = '';
        $this->foto = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
                'nama.0' => 'required',
                'foto.0' => 'required',
                'nama.*' => 'required',
                'foto.*' => 'required',
            ],
            [
                'nama.0.required' => 'nama field is required',
                'foto.0.required' => 'Username field is required',
                'nama.*.required' => 'nama field is required',
                'foto.*.required' => 'Username field is required',
            ]
        );
        
        $rekampasif = DB::table('rekam_pasifs')->get();
        dd($rekampasif);
        foreach ($this->account as $key => $value) {
            Penunjang::create(['foreign' => $rekampasif->id,'nama' => $this->nama[$key], 'foto' => $this->foto[$key]]);
        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Account Added Successfully.');
    }

    public function render()
    {
        $data = Penunjang::all();
        return view('livewire.periksa-penunjang',['data' => $data]);
    }
    
    // public function render()
    // {
    //     return view('livewire.periksa-penunjang');
    // }
}
