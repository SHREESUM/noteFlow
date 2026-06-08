<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $notes = $request->user()
            ->notes()
            ->latest()
            ->get();

        return view('dashboard', compact('notes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $request->user()->notes()->create($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Note created successfully.');
    }

    public function publish(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);

        if (! $note->share_token) {
            $note->share_token = Str::random(26);
        }

        $note->published_at = now();
        $note->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Note published successfully.');
    }

    public function edit(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);

        $notes = $request->user()->notes()->latest()->get();
        return view('dashboard', compact('notes', 'note'));
    }

    public function update(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $note->update($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Note updated successfully.');
    }

    public function destroy(Request $request, Note $note)
    {
        abort_unless($note->user_id === $request->user()->id, 403);

        $note->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Note deleted successfully.');
    }

    public function publicShow(string $token)
    {
        $note = Note::where('share_token', $token)
            ->whereNotNull('published_at')
            ->firstOrFail();

        return view('notes.public-show', compact('note'));
    }
}