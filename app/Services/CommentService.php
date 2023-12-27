<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Comment;
use App\Services\Contracts\CommentServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class CommentService implements CommentServiceInterface
{
    public function getCommentsForProject(int $projectId)
    {
        try {
            $comments = Comment::where('commentable_id', $projectId)
                ->where('commentable_type', '=', 'project')
                ->get();

            return $comments;
        } catch (\Exception $e) {
            //
            throw $e;
        }
    }

    public function addCommentToProject(int $projectId, string $text) : array
    {
        try {
            $project = Project::findOrFail($projectId);

            $comment = new Comment([
                'text' => $text,
                'commentable_id' => $project->id,
                'commentable_type' => 'project',
            ]);

            $comment->save();

            return ['message' => 'Komentarz został dodany pomyślnie.'];
        } catch (\Exception $e) {
            //
            throw $e;
        }
    }

    public function deleteComment(int $commentId): array
    {
        try {
            $comment = Comment::findOrFail($commentId);

            $comment->delete();

            return ['message' => 'Komentarz został usunięty pomyślnie.'];
        } catch (\Exception $e) {
            //
            throw $e;
        }
    }
}