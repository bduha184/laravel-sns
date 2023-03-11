<x-app>
    <x-slot name="title">
        $user->name
    </x-slot>
    @include('nav')
    <div class="container">
        @include('users.user')
        @include('users.tabs',['hasArticles'=>true,'hasLikes'=>false])
        @foreach ($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
</x-app>
