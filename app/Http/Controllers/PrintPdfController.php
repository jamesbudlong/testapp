<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use PDF;

class PrintPdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Prints a pdf.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryResource::collection(Category::with('values')->get());

        $pdf = PDF::loadView('pdfs.test', compact('data'));

        return $pdf->download('itsolutionstuff.pdf');

    }
}
