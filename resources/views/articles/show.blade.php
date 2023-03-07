<x-app>
    <x-slot name="title">
        記事詳細
    </x-slot>
    @include('nav')
    <div class="container">
        @include('articles.card')
    </div>

</x-app>
