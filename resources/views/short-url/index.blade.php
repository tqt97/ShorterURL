<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('CREATE SHORTER URL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-center bg-white border-b border-gray-200">
                    <section>
                        <h1 class="text-4xl mb-3 text-blue-800">Short your link</h1>
                        @if (session('success'))
                            <span class="flex items-center text-md tracking-wide  mt-1 ml-1">
                                {!! session('success') !!}
                            </span>
                        @endif
                        <form method="POST" action="{{ route('short.create') }}">
                            @csrf
                            <input type="url" name="original_url"
                                class="border  rounded-lg  @error('original_url') border-red-500 @enderror"
                                value="{{ old('original_url') }}">

                            <button type="submit"
                                class="m-2 px-6 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg">
                                Create URL
                            </button>
                        </form>
                        @error('original_url')
                            <div class="bg-gray-50 border-l-4 border-red-500 text-red-800 p-2 m-2" role="alert">
                                <span class="flex items-center text-md tracking-wide text-red-500  mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
