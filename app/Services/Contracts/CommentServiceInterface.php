<?php 

namespace App\Services\Contracts;

interface CommentServiceInterface
{
    public function getCommentsForProject(int $projectId);
    public function addCommentToProject(int $projectId, string $text);
    public function deleteComment(int $commentId);
}