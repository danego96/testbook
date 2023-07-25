@include('partials.header')
<x-layout>
  <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">Add mark</h1>


<form action="/students/{{$student->id}}/marks" method="POST">
  @csrf
  <div class="mb-6">
<select id="subject_id" name="subject_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
  @foreach ($data as $subject)
  <option value="{{$subject->id}}">{{$subject->name}}</option>  
  @endforeach
</select>
   </div>
   <select id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    @foreach ($marks as $mark)
    <option >{{$mark}}</option>  
    @endforeach
  </select>
     
  <button type="submit" class="mt-5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>

</form>
  </div>
  
</x-layout>