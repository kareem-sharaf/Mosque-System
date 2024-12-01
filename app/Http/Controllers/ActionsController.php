<?php

namespace App\Http\Controllers;


use App\Http\Requests\ActionRequest;
use App\Models\Report;

use App\Models\Student;

use App\Models\Action;
use App\services\ActionService;
use Illuminate\Support\Facades\Auth;

use App\Services\PointCalculator;


class ActionsController extends Controller
{
    protected $ActionService;
    protected $pointCalculator;

    public function __construct(ActionService $ActionService, PointCalculator $pointCalculator)
    {
        $this->ActionService = $ActionService;
        $this->pointCalculator = $pointCalculator;
    }


    public function index($report_id)
    {

        if (!Auth::check()) {
            return redirect()->route('students.index');
        }

        $actions = Action::where('report_id', $report_id)->where('user_id', Auth::id())
            ->with('student')
            ->get();

        $report = Report::findOrFail($report_id);

        return view('action.index', compact('actions', 'report'));
    }





    public function create($report_id)
    {
        $report = Report::findOrFail($report_id);
        $actions = Action::where('report_id', $report_id)->pluck('student_id')->toArray();

        $students = Student::where('user_id', Auth::id())
            ->whereNotIn('id', $actions)
            ->get();

        return view('action.create', compact('students', 'report'));
    }





    public function store(ActionRequest $request, $report_id)
    {
        if (!Auth::check()) {
            return redirect()->route('students.index');
        }

        $user_id = Auth::id();

        $students = Student::where('user_id', $user_id)->get();

        if ($students->isEmpty()) {
            return redirect()->route('reports.index')->with('message', 'لا يوجد طلاب لإضافة البيانات.');
        }

        $data = $request->validated();

        $actions = $data['actions'] ?? null;
        if (!$actions) {
            return redirect()->route('reports.index')->with('message', 'لم يتم إضافة أي إجراءات!');
        }

        foreach ($actions as $student_id => $actionData) {
            $actionData['user_id'] = $user_id;
            $actionData['student_id'] = $student_id;
            $actionData['report_id'] = $report_id;

            $points = $this->pointCalculator->calculatePoints($actionData);

            $action = Action::create($actionData);

            $student = Student::find($student_id);
            $student->total_points += $points;
            $student->save();
        }

        return redirect()->route('reports.index')->with('message', 'تمت إضافة البيانات بنجاح!');
    }



    public function edit($report_id)
    {
        if (!Auth::check()) {
            return redirect()->route('students.index');
        }

        $report = Report::findOrFail($report_id);
        $actions = Action::where('report_id', $report_id)->get();
        $students = Student::whereIn('id', $actions->pluck('student_id'))->get();

        return view('action.edit', compact('report', 'actions', 'students'));
    }


    public function update(ActionRequest $request, $report_id)
    {
        if (!Auth::check()) {
            return redirect()->route('students.index');
        }

        $data = $request->input('actions', []);

        foreach ($data as $action_id => $actionData) {
            $action = Action::findOrFail($action_id);

            $pointsBefore = $this->pointCalculator->calculatePoints($action->toArray());

            $action->exist = $actionData['exist'] ?? false;
            $action->pages = $actionData['pages'] ?? 0;
            $action->hadiths = $actionData['hadiths'] ?? 0;
            $action->clothes = $actionData['clothes'] ?? false;
            $action->noisy = $actionData['noisy'] ?? false;
            $action->gift = $actionData['gift'] ?? 0;
            $action->save();

            $pointsAfter = $this->pointCalculator->calculatePoints($action->toArray());

            $student = $action->student;
            $student->total_points += $pointsAfter - $pointsBefore;
            $student->save();
        }

        return redirect()->route('reports.index')->with('message', 'تم تحديث النشاطات بنجاح!');
    }
}
