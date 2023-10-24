@extends('layouts.dashboard')

@section('content')
    <h1 class="flex items-center justify-center font-bold text-2xl mb-3">Студенты группы {{ $groups->group_name }}</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

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
                    Кол-во оплаченных часов
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата регистрации
                </th>


            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">



                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->FIO }}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->age }}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->amount }}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $student->created_at }}
                    </th>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
