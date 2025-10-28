    @foreach ($article->comments as $comment)
            <div class="card-body">
                <p class="card-text">{{$comment->author_name}}</p>
                <p class="card-text">{{$comment->text}}</p>
                <div class="btn-toolbar mt-3" role="toolbar">
                    @can('update', $comment)
                    <a href="/articles/{{$article->id}}/comments/{{$comment->id}}/edit" class="btn btn-outline-info" style="margin-right: 1rem;">Изменить</a>
                    @endcan
                    @can('delete', $comment)
                    <form action="/articles/{{$article->id}}/comments/{{$comment->id}}" method="post">
                        @METHOD("DELETE")
                        @CSRF
                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                    </form>
                    @endcan
                </div> 
            </div>
    @endforeach