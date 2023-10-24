@extends('layouts.dashboard')

@section('content')

    <div class="flex ">
        <form method="POST" action="{{route('update_schedule', $schedule->id)}}">
            @method('PUT')
            @csrf
            <div class="wrapper flex">
                <div class="">
                    <div class=" justify-center mr-3 mt-6">
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio" class="text-white mb-10 flex bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Выбор группы <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg></button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDefaultRadio" class="z-10 flex  hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                @foreach($groups as $group)
                                    <li>
                                        <div class="flex items-center">
                                            <input name="group" id="default-radio-1" type="radio" value="{{$group->id}}"  class=" text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$group->group_name}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button id="dropdownRadioBgHoverButton" data-dropdown-toggle="dropdownRadioBgHover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Выбор преподавателя <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownRadioBgHover" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
                            @foreach($users as $user)
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="default-radio-4" type="radio" value="{{$user->id}}" name="user" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="default-radio-4" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$user->FIO}}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class=" ml-3">
                    <div class="flex flex-col flex-wrap">
                        <label class="text-center" for="start">Начало занятий</label>
                        <input name="start" value="{{$schedule->start_date}}" id="start" type="date">

                    </div>
                </div>
                <div class=" ml-3">
                    <div class="flex flex-col flex-wrap">
                        <label class="text-center" for="start">Окончание занятий</label>
                        <input name="end" value="{{$schedule->start_date}}" id="start" type="date">
                    </div>
                </div>

            </div>

            <div style="display: none">{{$id = $schedule->id}}</div>
            <div style="display: none">{{$day = "day1"}}
                {{$start = "start2"}}
                {{$end = "end2"}}</div>
            @foreach($daily_schedules as $daily_schedule)
                @if($daily_schedule->schedule_id == $id)
            <div id="check"   class="grid checked mt-10">
                <div class="relative z-0 w-full mb-6 group">
                    <input value="{{$daily_schedule->day}}" id="kek" type="text" name="{{$day}}"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                    <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">День</label>
                </div>
                <div class="w-20 h-18  ml-3">
                    <div class="flex flex-col flex-wrap">
                        <label class="text-center h-8" for="start">Начало занятий</label>

                        <input class="w-48" value="{{$daily_schedule->start_date}}" name="{{$start}}" id="start" type="time">

                    </div>
                </div>
                <div class="w-20 h-18 ml-3">
                    <div class="flex flex-col flex-wrap">
                        <label class="text-center h-8 mt-3" for="start">Окончание занятий</label>

                        <input class="w-48" value="{{$daily_schedule->end_date}}"  name="{{$end}}" id="start" type="time">

                    </div>
                </div>
            </div>
                    <div style="display: none">
                    {{$day = "day2"}}
                    {{$start = "start3"}}
                    {{$end = "end3"}}
                    </div>
                @endif

            @endforeach


            <button type="submit" class="text-white mt-3 bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Обновить</button>
        </form>
    </div>



@endsection
