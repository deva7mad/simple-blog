<?php

namespace App\GraphQL\Queries\Post;

use App\Models\Post;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Database\Eloquent\Collection;


class PostsQuery extends Query
{
    protected $attributes = [
        'name' => 'posts',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Post'));
    }

    /**
     * @param $root
     * @param $args
     * @return Collection
     */
    public function resolve($root, $args): Collection
    {
        return Post::all();
    }
}
