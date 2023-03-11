<x-app>
    <x-slot name="title">
        $user->name.'のフォロワー'
    </x-slot>
      @include('nav')
      <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
        @foreach($followers as $person)
          @include('users.person')
        @endforeach
      </div>
</x-app>
