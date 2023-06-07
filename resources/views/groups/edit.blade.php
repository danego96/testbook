
<x-layout>
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Create Group</h1>
  
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 h-full">
  <form action="/groups/{{$group->id}}" method="POST">
    @csrf
    @method('PUT')
    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Group</h2>
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group Name</label>
      <input type="text" name="name" id="имя" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$group->name}}">
    </div>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
  
  </form>
    </div>
    
  </x-layout>

  