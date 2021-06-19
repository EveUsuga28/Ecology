<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;

class PDFController extends Controller
{
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function preview()
    {
        return view('charts.chart');
    }
  
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $render = view('charts.chart')->render();
  
        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('chart'));
   
        return response()->download(public_path('chart'));
    }
}
