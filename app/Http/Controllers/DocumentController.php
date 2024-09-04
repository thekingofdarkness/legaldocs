<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    // GET /api/documents
    public function index(Request $request)
    {
        $query = Document::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('tags')) {
            $tags = explode(',', $request->tags);
            $query->whereIn('tags', $tags);
        }

        if ($request->has('keywords')) {
            $keywords = explode(',', $request->keywords);
            foreach ($keywords as $keyword) {
                $query->where('description', 'like', '%' . $keyword . '%');
            }
        }

        $documents = $query->get();

        return response()->json($documents);
    }

    // POST /api/documents
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        $document = Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
            'file_path' => $path,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($document, 201);
    }
}
