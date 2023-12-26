<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($projectId)
    {
        try {
            $comments = Comment::where('commentable_id', $projectId)
                ->where('commentable_type', '=', 'project')
                ->get();

            return response()->json($comments, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Wystąpił błąd podczas pobierania komentarzy.'], 500);
        }
    }

    public function store(Request $request, $projectId) {
        $request->validate([
            'text' => 'required|string',
        ]);
    
        try {
            $project = Project::findOrFail($projectId);
    
            $comment = new Comment([
                'text' => $request->input('text'),
                'commentable_id' => $project->id,
                'commentable_type' => 'project',
            ]);
    
            $comment->save();
    
            return response()->json(['message' => 'Komentarz został dodany pomyślnie.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Wystąpił błąd podczas dodawania komentarza.'], 500);
        }
    }

    public function destroy($comment) {
        try {
            $comment = Comment::findOrFail($comment);

            $comment->delete();
            
            return response()->json(['message' => 'Komentarz został usunięty pomyślnie.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Wystąpił błąd podczas usuwania komentarza.'], 500);
        }
    }
}
