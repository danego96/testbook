@include('partials.header')
<x-layout>
  <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Add Student</h1>

  <div class="mx-auto max-w-2xl py-32   h-full">
<form action="/students" method="POST">
  @csrf
  <div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student Name</label>
    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your student name">
  </div>
  <div class="mb-6">
    <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student Surname</label>
    <input type="text" name="surname" id="surname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your student surname">
  </div>
  <div class="mb-6">
    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birth date</label>
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
        <input datepicker  datepicker-autohide datepicker-format="yyyy/mm/dd" type="text" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
      </div>
  <div class="mb-6">
    <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
<select id="group" name="group_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <option selected>Choose a group</option>
  @foreach ($data as $group)
  <option value="{{$group->id}}">{{$group->name}}</option>  
  @endforeach
</select>
   </div>
  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>

</form>
  </div>
  
</x-layout>