<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        return response()->json(Label::all());
    }

    public function show($id)
    {
        $label = Label::find($id);
        if (!$label) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($label);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $label = Label::create($validated);
        return response()->json($label, 201);
    }

    public function update(Request $request, $id)
    {
        $label = Label::find($id);
        if (!$label) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $label->update($validated);
        return response()->json($label);
    }

    public function destroy($id)
    {
        $label = Label::find($id);
        if (!$label) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $label->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
