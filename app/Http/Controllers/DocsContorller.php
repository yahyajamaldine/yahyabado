<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use Illuminate\Http\Response;

class DocsContorller extends Controller
{
    public function wordf()
    {
        // Path to the template Word document
        $templatePath = storage_path('app/public/wordfile.docx');
        
        // Load the template
        $templateProcessor = new TemplateProcessor($templatePath);
        
        // Replace variables with values
        $templateProcessor->setValue('VAR_NAME', '202000');
        $templateProcessor->setValue('VAR_DATE', date('Y-m-d'));
        
        // Save the modified document
        $outputPath = storage_path('app/public/modified_wordfile.docx');
        $templateProcessor->saveAs($outputPath);
        
        // Return the modified document as a download response
        return response()->download($outputPath, 'modified_document.docx');
    }
}
