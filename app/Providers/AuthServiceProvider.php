<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\AuthorizationException;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Article::class => ArticlePolicy::class,
        // Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        
        Gate::define('article', function (User $user){
            if ($user->role_id == 1)
                return true;

            throw new AuthorizationException('You don`t moderator');
        });

        Gate::define('comment', function(User $user, Comment $comment){
            if ($user->id == $comment->user_id || $user->role_id == 1)
                return true;

            throw new AuthorizationException('You can`t edit or delete this comment');
        });
        
    }
}
