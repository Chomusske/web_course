@extends('layouts.dashboard')

@section('content')
    <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
        <a href="{{route('create_schedule')}}">Добавить +</a></button>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Название группы
                </th>

                <th scope="col" class="px-6 py-3">
                    ФИО
                </th>
                <th scope="col" class="px-6 py-3">
                    Дневное расписание
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата начала
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата окончания
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
                <th scope="col" class="px-6 py-3">

                </th>


            </tr>
        </thead>
        <tbody>

            @foreach ($schedules as $schedule)
                <div style="display: none">{{$id = $schedule->id}}</div>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">


                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{  $schedule->group->group_name  }}
                </th>

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{  $schedule->user->FIO  }}
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               @foreach($daily_schedules as $daily_schedule)
                    @if($daily_schedule->schedule_id == $id)
                    {{  $daily_schedule->day  }}
                    {{  $daily_schedule->start_date  }}
                    {{  $daily_schedule->end_date  }} <br>
                    @endif
                @endforeach
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{  $schedule->start_date  }}
                </th>

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{  $schedule->end_date  }}
                </th>


                <td class="px-6 py-4 text-right">
                    <a href="{{route('edit_schedule', $schedule->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Изменить</a>
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Удалить</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
