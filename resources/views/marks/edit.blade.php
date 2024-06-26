@include('partials.header')
<x-layout>
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">Update
        mark</h1>
        
    <div class="mt-10">
        <form action="{{ route('students.marks.update', ['student' => $student->id, 'mark' => $mark->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <select id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($marks as $singleMark)
                    <option @if($singleMark===$mark->name) selected @endif>{{$singleMark}}</option>
                @endforeach
            </select>

            <button type="submit"
                    class="mt-5 rounded-md bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Edit
            </button>

        </form>
    </div>
    <div class="mt-10">
        <form action="/students/{{$student->id}}/marks/{{$mark->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                Delete
            </button>

        </form>
    </div>

</x-layout>
