<?php

namespace App\Http\Controllers\Backend;

use App\Models\WorkExperience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $experiences = WorkExperience::orderBy('sort_order')->orderByDesc('id')->get();
        return view('backend.work-experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('backend.work-experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role'            => 'required|string|max:255',
            'company'         => 'required|string|max:255',
            'employment_type' => 'required|string',
            'workplace_type'  => 'required|string',
            'location'        => 'nullable|string|max:255',
            'start_date'      => 'required|string|max:50',
            'end_date'        => 'nullable|string|max:50',
            'description'     => 'nullable|string',
            'achievements'    => 'nullable|string',
            'tech_stack'      => 'nullable|string',
            'sort_order'      => 'nullable|integer|min:0',
        ]);

        WorkExperience::create($this->prepareData($validated));

        return redirect()->route('admin.work-experience.index')
            ->with('success', 'Work experience added successfully!');
    }

    public function edit(string $id)
    {
        $experience = WorkExperience::findOrFail($id);
        return view('backend.work-experience.edit', compact('experience'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'role'            => 'required|string|max:255',
            'company'         => 'required|string|max:255',
            'employment_type' => 'required|string',
            'workplace_type'  => 'required|string',
            'location'        => 'nullable|string|max:255',
            'start_date'      => 'required|string|max:50',
            'end_date'        => 'nullable|string|max:50',
            'description'     => 'nullable|string',
            'achievements'    => 'nullable|string',
            'tech_stack'      => 'nullable|string',
            'sort_order'      => 'nullable|integer|min:0',
        ]);

        WorkExperience::findOrFail($id)->update($this->prepareData($validated));

        return redirect()->route('admin.work-experience.index')
            ->with('success', 'Work experience updated successfully!');
    }

    public function destroy(string $id)
    {
        WorkExperience::findOrFail($id)->delete();

        return redirect()->route('admin.work-experience.index')
            ->with('success', 'Work experience deleted successfully!');
    }

    /**
     * Convert raw form strings into arrays for JSON columns.
     * Achievements: one bullet per line. Tech stack: comma-separated tags.
     */
    private function prepareData(array $data): array
    {
        $data['achievements'] = $this->parseLines($data['achievements'] ?? '');
        $data['tech_stack']   = $this->parseCsv($data['tech_stack'] ?? '');
        return $data;
    }

    private function parseLines(?string $text): array
    {
        if (empty($text)) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $text))));
    }

    private function parseCsv(?string $text): array
    {
        if (empty($text)) return [];
        return array_values(array_filter(array_map('trim', explode(',', $text))));
    }
}
