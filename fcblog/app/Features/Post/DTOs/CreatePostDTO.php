<?php

namespace App\Features\Post\DTOs;

readonly class CreatePostDTO
{
    public function __construct(
        public string $title,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(title: $data['title']);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
