<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Imports\SchoolFilterImport;
use Livewire\WithFileUploads;
use Excel;

class ExcelImport extends Component
{
    use WithFileUploads;
    public $excel;

    public function render()
    {
        return view('livewire.excel-import');
    }

    public function updatedExcel(){
        Excel::import(new SchoolFilterImport, $this->excel);
    }
}
