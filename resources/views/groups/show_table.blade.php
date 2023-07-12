@include('partials.header')
<x-layout>


    <div class="relative overflow-x-auto">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">
            {{ $group->name }} information </h1>


<table class="w-full mt-5 text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-5 py-3">
                Student
            </th>
            @foreach ($subjects as $subject)
            <th scope="col" class="px-5 py-3">
                {{ $subject->name }}
            </th>
            @endforeach
            <th scope="col" class="px-5 py-3">
                Average
            </th>
        </tr>

    </thead>
    <tbody>
        @foreach ($students as $student)
 
        <tr class="bg-white  border-b dark:bg-800 dark:border-gray-700">
            @foreach ($averageTotalMarks as $averageEachMark)
            @if ($averageEachMark->student_id == $student->id)
            <th scope="row" class="px-6 py-4 @if($averageEachMark->average == '5.0') text-red-600 @endif">
                
                {{ $student->name }} {{ $student->surname }} 

            </th>
@endif
@endforeach
            @foreach ($subjects as $subject)
            <td class="px-6 py-4">
                @foreach ($average_marks as $average)
                @if ($average->subject_id == $subject->id && $average->student_id == $student->id)
                {{ $average->average }}
                @endif
                @endforeach
            </td>
            @endforeach
            <td class="px-6 py-4">
                @foreach ($averageTotalMarks as $averageEachMark)
                @if ($averageEachMark->student_id == $student->id)
                {{$averageEachMark->average}}
                @endif
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            
    </div>
</x-layout>
