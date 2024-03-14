@include('partials.header')
<x-layout>


    <div class="relative overflow-x-auto">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl">
            {{ $group->name }} information </h1>


        <table class="w-full mt-5 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                <tr class="bg-white  border-b">
                    <th scope="row"
                        class="px-6 py-4
                    @php
                     $averageTotalMarkColor = match (true){
                        $student->marks_avg_name == null => 'text-black-600',
                        $student->marks_avg_name === '5.0000' => 'text-green-600',
                        $student->marks_avg_name >= '4.0000' => 'text-yellow-600',
                        $student->marks_avg_name < '4.0000' => 'text-red-600',
                     }
                    @endphp
                    {{ $averageTotalMarkColor }}
            ">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </th>

                    @foreach ($subjects as $subject)
                        <td class="px-6 py-4">
                            @foreach ($averageMarks->where('subject_id', $subject->id)->where('student_id', $student->id) as $averageMark)
                                    {{ $averageMark->average }}
                            @endforeach
                        </td>
                    @endforeach

                    <td class="px-6 py-4">
                       {{ round(($student->marks_avg_name),1) }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
</x-layout>
