<?php

namespace App\GraphQL\Queries\Comment;

use App\Models\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CommentQuery extends Query
{
    protected $attributes = [
        'name' => 'comment',
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Comment');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Comment::findOrFail($args['id']);
    }
}
