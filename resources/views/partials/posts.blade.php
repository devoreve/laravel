<ul class="list-unstyled">
    @foreach($posts as $post)
        <li>
            <article class="my-2">
                <header class="border-bottom py-2">
                    <h2 class="h5"><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                    <small>Rédigé par {{ $post->user->name }} dans la catégorie {{ $post->category->name }}</small>
                </header>
                {{ substr($post->content, 0, 200) }}[...]<a href="{{ route('posts.show', ['id' => $post->id]) }}">(voir la suite)</a>
            </article>
        </li>
    @endforeach
</ul>