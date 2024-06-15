<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::all();
        return view('Dashboard.Sections.index', compact('sections'));
    }
    public function show($id)
    {
        $section = Section::findOrfail($id);
        $doctors = Section::findOrfail($id)->doctors;
        return view('Dashboard.Sections.show_doctors', compact('doctors', 'section'));
    }
    public function store($request)
    {
        Section::create([
            'name' => $request->name,
            'descripton' => $request->descripton,
        ]);
        session()->flash('add');
        return redirect()->route('Sections.index');
    }
    public function update($request)
    {
        $Section = Section::findOrfail($request->id);
        $Section->update([
            'name' => $request->name,
            'descripton' => $request->descripton,
        ]);
        session()->flash('edit');
        return redirect()->route('Sections.index');
    }
    public function destroy($request)
    {
        Section::findOrfail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }
}
