@include('partials.header')
<x-layout>
    <a href="/students/create">
    <button type="button" action="/groups/create" class="block top-5 right-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add student</button>
    </a>
      <div class="relative overflow-x-auto">
        <table class="w-full mt-5 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
              @foreach ($data as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4">
                      {{$student->id}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/students/{{$student ->id}}">{{$student->name}} {{$student->surname}}</a>
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($group_data as $group_name)
                        @if ($student->group_id == $group_name->id)
                        {{$group_name->name}} 
                        @endif
                        @endforeach
                      </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     <a href="/students/{{$student->id}}/edit">Edit</a>
                      </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="block mt-5">
    {{ $data->links()}}

    </div>
</x-layout>