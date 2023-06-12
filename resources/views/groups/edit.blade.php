
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
    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
  
  </form>
<div class="mt-10">
  <form method="POST" action="/groups/{{$group->id}}">
    @csrf
    @method('DELETE')
    <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
    </form>
</div>
    </div>
    
  </x-layout>

  