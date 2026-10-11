<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::get();
        return view('backend.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'color'    => 'required|string|max:20',
            'category' => 'required|in:technical,tool,soft',
        ]);

        Skill::create($request->only('name', 'color', 'category'));

        return redirect()->route('admin.skill.index')->with('success', 'Skill added successfully!');
    }

    public function edit(Skill $skill)
    {
        return view('backend.skill.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'color'    => 'required|string|max:20',
            'category' => 'required|in:technical,tool,soft',
        ]);

        $skill->update($request->only('name', 'color', 'category'));

        return redirect()->route('admin.skill.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skill.index')->with('success', 'Skill deleted successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate(['ids' => 'required|array', 'ids.*' => 'integer']);

        foreach ($request->ids as $position => $id) {
            Skill::where('id', $id)->update(['sort_order' => $position]);
        }

        return response()->json(['status' => 'ok']);
    }
}
