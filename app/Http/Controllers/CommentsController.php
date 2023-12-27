<?php

namespace App\Http\Controllers;

use App\Services\Contracts\CommentServiceInterface;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $commentService;

    public function __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index(int $projectId)
    {
        try {
            $comments = $this->commentService->getCommentsForProject($projectId);

            return response()->json($comments, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Wystąpił błąd podczas pobierania komentarzy.'], 500);
        }
    }

    public function store(Request $request, int $projectId) {
        $request->validate([
            'text' => 'required|string',
        ]);

        try {
            $result = $this->commentService->addCommentToProject($projectId, $request->input('text'));

            return response()->json(['message' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Wystąpił błąd podczas dodawania komentarza.'], 500);
        }
    }

    public function destroy(int $comment) {
        try {
            $result = $this->commentService->deleteComment($comment);

            return response()->json(['message' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Wystąpił błąd podczas usuwania komentarza.'], 500);
        }
    }
}