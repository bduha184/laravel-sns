<x-app>
    <x-slot name="title">
        $user->name.'のいいねした記事'
    </x-slot>
    @include('nav')
    <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
        @foreach ($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
</x-app>
