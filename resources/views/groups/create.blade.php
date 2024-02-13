@include('partials.header')
<x-layout>
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">Create
        Group</h1>

    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 h-full">
        <form action="/groups" method="POST">
            @csrf
            <h2 class="text-base font-semibold leading-7 text-gray-900">Create Group</h2>
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Group Name</label>
                <input type="text" name="name" id="имя"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Enter your group name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>

        </form>
    </div>

</x-layout>
