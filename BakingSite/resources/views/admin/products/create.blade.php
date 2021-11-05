<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('adminProducts') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Name of product</span>
                            </div>
                            <input required type="text" name="name"/>
                        </div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Description of product</span>
                            </div>
                            <textarea required name="description" class="h-20"></textarea>
                        </div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Price of product in €</span>
                            </div>
                            <input type="text" name="price" />
                        </div>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Image of product (Max 2mb)</span>
                                <br>
                            </div>
                            <input type="file" name="image">
                        </div>

                        <br>

                        <div class="input-group">
                            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Add</button>
                            <a href="{{ route('adminProducts') }}" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
