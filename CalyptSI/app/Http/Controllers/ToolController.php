<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool;
use App\Audit;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();
        return view('tools.index',compact('tools'));
    }
    
    public function nmap()
    {
        $audits = Audit::all();
        return view('tools.nmap.create',compact('audits'));
    }
    
    public function register(Request $request) /*Test: enregistrement d'un scan nmap*/ 
    {
        $audits = Audit::all();
        
        return view('tools.nmap.create',compact('audits'));
    }
}
