<x-app>
    <x-slot name="title">
        $user->name.'のフォロー中'
    </x-slot>
    @include('nav')
    <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
        @foreach ($followings as $person)
            @include('users.person')
        @endforeach
    </div>
</x-app>
