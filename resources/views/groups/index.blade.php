@include('partials.header')
<x-layout>
    <a href="/groups/create">
    <button type="button" action="/groups/create" class="block top-5 right-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add group</button>
    </a>
      <div class="relative overflow-x-auto">
        <table class="w-full mt-5 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Group ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Group
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $group)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4">
                        {{$group->id}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{$group->name}}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     <a href="/groups/{{$group->id}}/edit">Edit</a>
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