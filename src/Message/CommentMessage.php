<?php

namespace App\Message;

namespace App\Message;
final readonly class CommentMessage
{
    public function __construct(
        public int $id,
        public array $context = [],
    ) { }
}
