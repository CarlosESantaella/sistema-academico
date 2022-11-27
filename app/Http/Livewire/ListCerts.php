<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ListCerts extends Component
{
    public $files;
    public $newFiles = [];
    public $years = [];
    public $year;



    public function mount()
    {

        $this->year = '';
        $this->files = Storage::files('public/students/certs');
        $files = $this->files;
        $i = 0;
        $diffYear = 0;
        $this->years = [];
        foreach($files as $file){
            $file = $file;
            if(strpos($file, auth()->user()->codigo) !== false){
                // $this->newFiles[] = $file;
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $year = substr($filename, -2);
                if($year != $diffYear){
                    $this->years[] = $year;
                    $diffYear = $year;
                }
    
            }
    
        }
    }

    public function filterByYear()
    {
        if($this->year != ''){

            $this->files = Storage::files('public/students/certs');
            $files = $this->files;
            $i = 0;
            // $diffYear = 0;
            $this->newFiles = [];
            foreach($files as $file){
                $file = $file;
                if(strpos($file, auth()->user()->codigo) !== false){
    
                    $filename = pathinfo($file, PATHINFO_FILENAME);
                    $year = substr($filename, -2);
                    if($year == $this->year){
                        // $this->years[] = $year;
                        // $diffYear = $year;
                        $this->newFiles[] = $file;
                    }
    
                }
            }
        }else{
            $this->newFiles = [];
        }
        
    }

    public function render()
    {
        
        return view('livewire.list-certs');
    }
}
