<?php

namespace App\GraphQL\Queries\Comment;

use App\Models\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Database\Eloquent\Collection;

class CommentsQuery extends Query
{
    protected $attributes = [
        'name' => 'comments',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Comment'));
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

    /**
     * @param $root
     * @param $args
     * @return Collection
     */
    public function resolve($root, $args): Collection
    {
        return Comment::all();
    }
}
