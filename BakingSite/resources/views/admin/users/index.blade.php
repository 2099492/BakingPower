<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-button class="mb-4">
                <a href="{{ route('adminUsersCreate') }}">
                    {{ __('Add user') }}
                </a>
            </x-button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($users as $user)
                    <a href="{{ route('adminUsersEdit', $user->id)}}">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="text-xl font-bold text-gray-900">{{ $user->name }}</h1>
                            <p class="text-md text-gray-600">{{ $user->email }}</p>
                            <div class="flex justify-end">
                                <form method="POST" action="{{ route('adminUsersDestroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-button>Delete</x-button>
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
