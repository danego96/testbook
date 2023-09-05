@include('partials.header')
<x-layout>
  <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">Edit Student info</h1>

  <div class="mx-auto max-w-2xl py-32   h-full">
<form action="/students/{{$student->id}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Student Name</label>
    <input type="text" name="first_name" id="first_name" value="{{$student->first_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter your student name">
  </div>
  <div class="mb-6">
    <label for="surname" class="block mb-2 text-sm font-medium text-gray-900">Student Surname</label>
    <input type="text" name="last_name" id="last_name" value="{{$student->last_name}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter your student surname">
  </div>
  <div class="mb-6">
    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Birth date</label>
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
        </div>
        <input datepicker  datepicker-autohide datepicker-format="yyyy/mm/dd" value="{{$student->birth_date}}"  type="text" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date">
      </div>
  <div class="mb-6">
    <label for="group" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label>
<select id="group" name="group_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    @foreach ($data as $group)
    <option @if ($student->group_id == $group->id) selected @endif value="{{$group->id}}">{{$group->name}}</option>
  @endforeach
</select>
   </div>
  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
</form>
<div class="mt-10">
    <form method="POST" action="/students/{{$student->id}}">
      @csrf
      @method('DELETE')
      <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete</button>
      </form>
  </div>
  </div>
</x-layout>