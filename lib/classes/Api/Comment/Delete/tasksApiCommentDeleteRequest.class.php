<?php

final class tasksApiCommentDeleteRequest
{
    /**
     * @var int
     */
    private $commentId;

    public function __construct(int $commentId)
    {
        $this->commentId = $commentId;
    }

    public function getCommentId(): int
    {
        return $this->commentId;
    }
}
