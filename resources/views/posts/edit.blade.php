<x-app-layout>
    <div class="bg-white py-16 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @php
                if (isset($post)) {
                    $action = route('posts.update', $post);
                } else {
                    $action = route('posts');
                }
            @endphp
            <form method="POST" action="{{ $action }}">
                @csrf

                {{-- Switch edit to a PUT request --}}
                @isset($post)
                    <input type="hidden" name="_method" value="PUT">
                @endisset

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl text-center">
                            {{ $editPageTitle }}
                        </p>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <div>
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title', $post->title ?? '')" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="body"
                                    class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                                <div class="mt-2">
                                    <textarea id="body" name="body" rows="8"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                         placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                         sm:text-sm sm:leading-6">{{ $post->body ?? '' }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('body')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        @isset($post)
                            <a href="{{ route('posts.show', $post) }}"><button type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                        @endisset
                        <x-primary-button type="submit">Save</x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>
