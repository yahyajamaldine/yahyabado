<?php

namespace App\Livewire;

use App\Models\file_tanfidi;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IdByYear extends Component
{
    public $Date_receive;
    public $DydocumentId;
    public $field;
    public $tyear;
    public function render()
    {
    
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
        //if($this->field->date_recieve)
        return view('livewire.id-by-year-component');
    }

    public function updatedDate_receive()
    {
        // No need to call getDocumentId here
      /*   
       if(empty($this->Date_receive)){
            $this->Date_receive=date('Y');
        }
        $this->tyear=date('Y', strtotime($this->Date_receive));
        $lastIdOfYear = file_tanfidi::whereYear('date_receive',date('Y', strtotime($this->Date_receive)))->max('id');

        // Set the document ID property
        $this->DydocumentId = $lastIdOfYear ? $lastIdOfYear + 1 : 1;
    }
    */
    $this->tyear=date('Y', strtotime($this->Date_receive));
}

}