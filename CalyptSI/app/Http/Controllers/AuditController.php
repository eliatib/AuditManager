<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Audit;
use App\Target;
use App\User;


class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit::all();
        return view('audits.index', compact('audits')); 
    }
    
    public function show(Audit $audit)
    {
        return view('audits.show', compact('audit'));
    }
    
    public function create()
    {
        $targets = Target::all();
        return view('audits.create', compact('targets')); 
    }
    
    public function edit(Audit $audit)
    {
        $targets = Target::all();
        return view('audits.edit', compact('audit','targets')); 
    }
    
    public function update(Request $request, Audit $audit)
    {
        if(!Target::where('id', '=', $request->get('target_id'))->exists())
        {
            if($request->get('target_id') == '0')
            {
                $target = new Target();
                $target->createTarget($request->get('target_name'));
                $audit->target_id = $target->id;
            }
            else
            {
            $request->session()->flash('msg', 'erreur: l\'entreprise n\'éxiste pas'); 
            return back();
            }
        }
        else
        {
            $audit->target_id = $request->get('target_id');
        }
        $audit->name = $request->get('name');
        $audit->info = $request->get('info');
        $audit->proxy = $request->get('proxy');
        $audit->save();
        return redirect()->route('audits.index');
    }
    
    public function store(Request $request)
    {
        $audit= new Audit;
        $id = Auth::id();
        if(!Target::where('id', '=', $request->get('target_id'))->exists())
        {
            if($request->get('target_id') == '0')
            {
                $target = new Target();
                $target->create($request->get('target_name'));
                $audit->target_id = $target->id;
            }
            else
            {
            $request->session()->flash('msg', 'erreur: l\'entreprise n\'éxiste pas'); 
            return back();
            }
        }
        else
        {
            $audit->target_id = $request->get('target_id');
        }
        $audit->name = $request->get('name');
        $audit->info = $request->get('info');
        $audit->proxy = $request->get('proxy');
        $audit->user_id = $id;
        $audit->save();
        return redirect()->route('audits.index');
    }
}
