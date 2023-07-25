@include('partials.header')
<x-layout>
 <a href="/subjects/create">
    <button type="button" action="/groups/create" class="block top-5 right-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Add subject</button>
    </a>
      <div class="relative overflow-x-auto">
        <table class="w-full mt-5 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Subject ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $subject)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4">
           {{$subject->id}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                       {{$subject->name}}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              <a href="/subjects/{{$subject->id}}/edit">Edit</a> 
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