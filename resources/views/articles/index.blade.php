<x-app>
    <x-slot name="title">
        記事一覧
    </x-slot>
    @include('nav')
    <div class="container">
        @foreach ($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
</x-app>
