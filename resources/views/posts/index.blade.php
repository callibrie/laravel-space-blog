<x-app-layout>
    @guest
        <x-slot name="textBanner">
            <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Login to edit your posts or create new ones') }}
            </h4>
        </x-slot>
    @endguest
    <div class="mx-auto max-w-8xl px-6 my-16 lg:px-8">
        @if (empty($posts))
            <div class="mx-auto max-w-2xl text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">No posts yet</p>
                <a href="{{ route('posts.new') }}"><x-primary-button class="mt-8">Create a new
                        post</x-primary-button></a>
            </div>
        @else
            <div class="mx-auto max-w-2xl text-center">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $listTitle }}</p>
            </div>
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-4 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                    <div class="mt-8 max-w-2xl rounded-3xl ring-1 ring-gray-400 shadow-lg">
                        <a href="{{ route('posts.show', $post) }}">
                            <div class="flex-auto">
                                <article class="flex max-w-2xl flex-col items-start justify-between p-8">
                                    <img class="rounded-xl" src="https://i.ibb.co/mt5jRPf/9735805.jpg">
                                    <div class="mt-8 flex items-center gap-x-8 text-xs">
                                        <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at }}</time>
                                    </div>
                                    <div class="group relative">
                                        <h3
                                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <span class="absolute inset-0"></span>
                                            {{ $post->title }}
                                        </h3>
                                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->body }}
                                        </p>
                                    </div>
                                    <div class="relative mt-8 flex items-center gap-x-4">
                                        <img src="https://i.ibb.co/549VV9j/Violet.png" alt="Violet"
                                            class="h-10 w-10 rounded-full bg-gray-50">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <span class="absolute inset-0"></span>
                                                {{ $post->user->name }}
                                            </p>
                                            <p class="text-gray-600">{{ $post->user->email }}</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
