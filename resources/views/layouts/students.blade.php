@extends('layouts.dashboard')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
        <a href="{{ route('create_student') }}">Добавить +</a></button>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ФИО
                </th>
                <th scope="col" class="px-6 py-3">
                    Возраст
                </th>
                <th scope="col" class="px-6 py-3">
                    Родители
                </th>
                <th scope="col" class="px-6 py-3">
                    Кол-во оплаченных занятий
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата регистрации
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
                <th scope="col" class="px-6 py-3">

                </th>


            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">



                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $student->FIO }}
                </th>
                <td class="px-6 py-4">
                    {{ $student->age }}
                </td>
                @if(isset($student->ancestor))

                <td class="px-6 py-4">
                    ФИО: {{ $student->ancestor->FIO }} <br>
                    Номер: {{ $student->ancestor->phone }} <br>
                    Место работы: {{ $student->ancestor->workplace }}
                </td>
                @else
                    <td class="px-6 py-4">
                        ФИО: - <br>
                        Номер: - <br>
                        Место работы: -
                    </td>
                @endif
                <td class="px-6 py-4">
                    {{ $student->amount }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->created_at }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{route('edit_student', $student->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Изменить</a>
                </td>
                <td class="px-6 py-4 text-right">
                    <form method="POST" action="{{ route('destroy_student', $student->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
