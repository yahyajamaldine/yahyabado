<?php

namespace App\Livewire;

use App\Models\file_tanfidi;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IdByYear extends Component
{
    public $selectedYear;
    public $DydocumentId;
    public $field;
    public $tyear;
    public function render()
    {
        if(empty($this->selectedYear)){
       $LastEntry=file_tanfidi::latest('id')->first();
        $MaxIdYear= date('Y', strtotime($LastEntry->date_receive));
        $TodayYear= date('Y');
        if($TodayYear == $MaxIdYear){
           $this->DydocumentId = $LastEntry->id+1;
        }
        else if($TodayYear > $MaxIdYear){
           $this->DydocumentId = file_tanfidi::whereYear('date_receive', $TodayYear)->max('id') + 1;
           if(empty($this->DydocumentId)){
            $this->DydocumentId = 1;
           }
        }
        }
        //if($this->field->date_recieve)
        return view('livewire.id-by-year-component');
    }

    public function updatedSelectedYear()
    {
        // No need to call getDocumentId here
         
        if(empty($this->selectedYear)){
            $this->selectedYear=date("Y");
        }
        $lastIdOfYear = file_tanfidi::whereYear('date_receive', $this->selectedYear)->max('id');

        // Set the document ID property
        $this->DydocumentId = $lastIdOfYear ? $lastIdOfYear + 1 : 1;
    }

}
