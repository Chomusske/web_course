<?php

namespace App\Http\Controllers;

use App\Models\Ancestor;
use App\Models\Daily_Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Group;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    // Students
    public function index_students()
    {
        $students = Student::all();
        return view('layouts.students', compact('students'));
    }
    public function create_student()
    {
        $groups = Group::all();
        return view('layouts.create_student', compact('groups'));
    }

    public function store_student(Request $request)
    {
        $ancestor_id = null;
        if(($request->input('FIO2') != null && $request->input('phone2') != null && $request->input('workplace') != null))
        {
            $ancestor = new Ancestor;
            $ancestor->FIO = $request->FIO2;
            $ancestor->phone = $request->phone2;
            $ancestor->workplace = $request->workplace;
            $ancestor->save();

            $ancestor_id = $ancestor->id;

        }



        $request->validate([
            'FIO1' => 'required',
            'age' => 'required',
            'phone1' => 'required',
            'amount' => 'required',
        ]);

        $student = new Student;
        $student->FIO = $request->FIO1;
        $student->age = $request->age;
        $student->phone = $request->phone1;
        $student->amount = $request->amount;
        $student->group_id = $request->group;
        $student->ancestor_id = $ancestor_id;
        $student->save();

        return redirect()->route('students')->with('success','Post created successfully.');
    }

    public function edit_student(Student $student)
    {
        $groups = Group::all();
        return view('layouts.edit_student', compact('student', 'groups'));
    }

    public function update_student(Request $request, Student $student, Ancestor $ancestor)
    {



        if($student->ancestor != null)
        {
            $request->validate([
                'FIO1' => 'required',
                'age' => 'required',
                'phone1' => 'required',
                'amount' => 'required',
            ]);

            $student->update([
                'FIO' => $request->input('FIO1'),
                'age' => $request->input('age'),
                'phone' => $request->input('phone1'),
                'amount' => $request->input('amount'),
                'group_id' => $request->input('group'),
            ]);


            $student->ancestor->update([
                'FIO' => $request->input('FIO2'),

                'phone' => $request->input('phone2'),
                'workplace' => $request->input('workplace'),

            ]);




        } else {

            $request->validate([
                'FIO1' => 'required',
                'age' => 'required',
                'phone1' => 'required',
                'amount' => 'required',
            ]);

            $student->update([
                'FIO' => $request->input('FIO1'),
                'age' => $request->input('age'),
                'phone' => $request->input('phone1'),
                'amount' => $request->input('amount'),
                'group_id' => $request->input('group'),
            ]);

            $ancestor->FIO = $request->FIO2;
            $ancestor->phone = $request->phone2;
            $ancestor->workplace = $request->workplace;
            $ancestor->save();
            $ancestor_id = $ancestor->id;

            $student->ancestor_id = $ancestor_id;
            $student->save();
        }


        //dump($student);


        return redirect()->route('students')->with('success','Post updated successfully');
    }

    public function destroy_student(Student $student)
    {
        $student->delete();

        return redirect()->route('students');
    }


    //Groups
    public function index_groups()
    {
        $groups = Group::all();
        return view('layouts.groups', compact('groups'));
    }



    public function store_group(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
        ]);

        Group::create($request->all());

        return redirect()->route('groups')->with('success','Post created successfully.');
    }

    public function showStudents($id)
    {
        $students = Student::where('group_id', $id)->get();
        $groups = Group::find($id);

        return view('layouts.show_students', compact('students', 'groups'));
    }

    public function destroy_group(Group $group)
    {
        $group->delete();
        return redirect()->route('groups');
    }









    public function index_schedules()
    {
        $schedules = Schedule::all();
        $schedules2 = DB::table('schedules')->select('id');
        $daily_schedules = DB::table('daily_schedules')
            ->whereIn('schedule_id', $schedules2)
            ->get();

        return view('layouts.schedules', compact('schedules', 'daily_schedules'));
    }

    public function create_schedule()
    {
        $groups = Group::all();
        $users = User::all();
        return view('layouts.create_schedule', compact('groups', 'users'));
    }

    public function store_schedule(Request $request)
    {


        $request->validate([
            'group' => 'required',
            'user' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $schedule = new Schedule;
        $schedule->group_id = $request->group;
        $schedule->user_id = $request->user;
        $schedule->start_date = $request->start;
        $schedule->end_date = $request->end;

        $schedule->save();
        $schedule_id = $schedule->id;


        $daily_schedule = new Daily_Schedule;
        $daily_schedule->day = $request->day1;
        $daily_schedule->start_date = $request->start2;
        $daily_schedule->end_date = $request->end2;
        $daily_schedule->schedule_id = $schedule_id;
        $daily_schedule->save();

        $daily_schedule2 = new Daily_Schedule;
        $daily_schedule2->day = $request->day2;
        $daily_schedule2->start_date = $request->start3;
        $daily_schedule2->end_date = $request->end3;
        $daily_schedule2->schedule_id = $schedule_id;
        $daily_schedule2->save();



        return redirect()->route('schedules')->with('success','Post created successfully.');
    }

    public function edit_schedule(Schedule $schedule, Daily_Schedule $daily_schedule)
    {
        $users = User::all();
        $groups = Group::all();
        $schedules = Schedule::all();
        $schedules2 = DB::table('schedules')->select('id');
        $daily_schedules = DB::table('daily_schedules')
            ->whereIn('schedule_id', $schedules2)
            ->get();

        return view('layouts.edit_schedule', compact('schedule', 'schedules', 'daily_schedules', 'groups', 'users'));
    }


    public function update_schedule(Request $request, Schedule $schedule, Daily_Schedule $daily_schedule)
    {
        $request->validate([
            'user' => 'required',
            'group' => 'required',
            'start' => 'required',
            'end' => 'required',
            //'day1' => 'required',
            //'start2' => 'required',
            //'end2' => 'required',


        ]);

        $schedule->update([
            'user_id' => $request->input('user'),
            'group_id' => $request->input('group'),
            'start_date' => $request->input('start'),
            'end_date' => $request->input('end'),

        ]);

        $schedule->daily_schedule[0]->update([
            'day' => $request->input('day1'),
            'start_date' => $request->input('start2'),
            'end_date' => $request->input('end2'),
        ]);

        $schedule->daily_schedule[1]->update([
            'day' => $request->input('day2'),
            'start_date' => $request->input('start3'),
            'end_date' => $request->input('end3'),
        ]);




        return redirect()->route('schedules')->with('success','Post updated successfully');
    }






    public function index_users()
    {
        $users = User::all();
        return view('layouts.users', compact('users'));
    }



}
