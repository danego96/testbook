@include('partials.header')
<x-layout>
    <div class="relative overflow-x-auto">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl">
            Student information </h1>

        <img src="{{$student->getStudentImage()}}">



        @foreach ($groups as $group)
            <p class="mb-3 text-gray-500"
               @if ($student->group_id == $group->id) value="{{ $group->group_id }}"> Name: {{ $student->first_name }}  <br>
                Last name:  {{ $student->last_name }} <br>
                Birth date:  {{ $student->birth_date }} <br>
                Group: {{ $group->name }}</p> @endif
            @endforeach
            </p>
            <a href="/students/{{ $student->id }}/marks/create">
                <button type="button" action="/students/{{ $student->id }}/marks/create"
                        class="block top-5 right-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Add
                    mark</button>
            </a>
            <table class="w-full mt-5 text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Marks
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Average
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $subject)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4">
                            {{ $subject->name }}
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            @foreach ($marks as $mark)
                                @if ($mark->subject_id == $subject->id)
                                    <a href="/students/{{ $student->id }}/marks/{{ $mark->id }}/edit">
                                        {{ $mark->name }}</a>
                                @endif
                            @endforeach
                        </td>
                        <th scope="row" class="px-6 py-4">
                            @foreach ($average as $each_subject)
                                @if ($subject->id == $each_subject->subject_id)
                                    {{ $each_subject->average }}
                                @endif
                            @endforeach
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</x-layout>