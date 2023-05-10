<?php

namespace App\GraphQL\Queries\Post;

use App\Models\Post;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'post',
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Post');
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
        return Post::findOrFail($args['id']);
    }
}
