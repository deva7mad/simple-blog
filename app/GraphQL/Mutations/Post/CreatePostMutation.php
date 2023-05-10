<?php

namespace App\GraphQL\Mutations\Post;

use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphQLType;

class CreatePostMutation extends Mutation
{
    public function type(): GraphQLType
    {
        return GraphQL::type('Post');
    }

}
