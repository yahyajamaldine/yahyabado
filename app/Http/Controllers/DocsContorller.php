<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use Illuminate\Http\Response;

use App\Models\Mahdar;

use Carbon\Carbon;

use App\Models\file_tanfidi;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Collection;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class DocsContorller extends Controller
{
    public function wordf(Request $request)

    {
        //getting the info about the current document
        $file_tanfidi=file_tanfidi::find(request('id'));
        
        $fontStyle = new \PhpOffice\PhpWord\TemplateProcessor;
        $fontStyle->setName('Times New Roman');
        $fontStyle->setSize(14);
        $fontStyle->setBold(true);
        $fontStyle->setColor('blackaqxcvwqsdfgj<WXCVW>w>XCDF');




        $taleb= $file_tanfidi->taleb;
        $matlob= $file_tanfidi->matlob;
        $MahdarID=DB::table('Mahdar')->latest()->first();
        $Mahdar=new Mahdar();

        if(!empty($MahdarID)){
            $Mahdar->id=($MahdarID->id)+1;
        }
        else{
            $Mahdar->id=1;        
        }
        $Mahdar->sub=request('source');
        $Mahdar->date_creation=request('date_creation');
        $Mahdar->wife=$request->has('taleb');
        $Mahdar->date_mahdar="2020/02/01";
        $Mahdar->child=$request->has('matlob');
        $Mahdar->start_date=request('start_date');
        $Mahdar->end_date=request('end_date');
        $Mahdar->aasel=request('lAsel');
        $Mahdar->saair=request('saar');
        $Mahdar->lmofawad=request('mofawed');
        $Mahdar->lkhazina=request('wajiblkhazina');
        $Mahdar->tva=request('tva');
        $Mahdar->total=request('total');
        $Mahdar->save();

        // Path to the template Word document
        $templatePath = storage_path('app/public/wordfile.docx');
        
        // Load the template
        $templateProcessor = new TemplateProcessor($templatePath);
        
        // Replace variables with values
        $templateProcessor->setValue('VAR_TALEB', $taleb);
        $templateProcessor->setValue('VAR_MATLOB', $matlob);
        $templateProcessor->setValue('VAR_DATE', request('date_creation'));
        $templateProcessor->setValue('VAR_TOTAL', request('total'));
        $templateProcessor->setValue('VAR_AASEL', request('lAsel'));
        $templateProcessor->setValue('VAR_SDATE', request('start_date'));
        $templateProcessor->setValue('VAR_EDATA', request('end_date'));
        $templateProcessor->setValue('VAR_SAAIR', request('saar'));
        $templateProcessor->setValue('VAR_LMOFAWAD', request('mofawed'));
        $templateProcessor->setValue('VAR_TVA', request('tva'));
        $templateProcessor->setValue('VAR_LKHAZINA', request('wajiblkhazina'));

        // Save the modified document
        $outputPath = storage_path('app/public/modified_wordfile.docx');
        $templateProcessor->saveAs($outputPath);
        
        // Return the modified document as a download response
        return response()->download($outputPath, 'modified_document.docx');
    }
}
