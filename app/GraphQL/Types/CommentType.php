<?php

namespace App\GraphQL\Types;

use App\Models\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CommentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Comment',
        'description' => 'Collection of comments',
        'model' => Comment::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of comment'
            ],
            'body' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Body of the comment'
            ],
        ];
    }
}
