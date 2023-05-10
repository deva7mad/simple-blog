<?php

namespace App\GraphQL\Types;

use App\Models\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'Collection of posts',
        'model' => Post::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of post'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the post'
            ],
            'image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Image of the post'
            ],
            'content' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Content of the post'
            ],
            'comments' => [
                'type' => Type::listOf(GraphQL::type('Comment')),
                'description' => 'List of comments'
            ]
        ];
    }
}
