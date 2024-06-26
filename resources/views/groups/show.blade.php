@include('partials.header')
<x-layout>
    <a href="/students/create">
    <button type="button" class="inline-block top-5 right-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Add student</button>
    </a>
    <a href="/groups/{{$group->id}}/table">
        <button type="button" class="inline-block top-5 right-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">View table</button>
        </a>
      <div class="relative overflow-x-auto">
        <table class="w-full mt-5 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Stundent ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Student Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Group
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit Student
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4">
                        {{$student->id}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <a href="/students/{{$student ->id}}">{{$student->first_name}} {{$student->last_name}}</a>
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$group->name}}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                     <a href="/students/{{$student->id}}/edit">Edit</a>
                      </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="block mt-5">
    {{ $students->links()}}
    </div>
</x-layout>