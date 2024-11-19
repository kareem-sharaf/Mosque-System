<?php
namespace App\Http\Controllers;


use App\Http\Requests\ActionRequest;
use App\Models\Report;

use App\Models\Student;

use App\Models\Action;
use App\Services\actionService;
use Illuminate\Support\Facades\Auth;

use App\Services\PointCalculator;


class ActionsController extends Controller
{
    protected $actionService;
    protected $pointCalculator;

    public function __construct(actionService $actionService,PointCalculator $pointCalculator)
    {
        $this->actionService = $actionService;
        $this->pointCalculator = $pointCalculator;

    }


    public function index($report_id)
    {
        $actions =
            Action::with('student')
            ->where('user_id', Auth::id())
            ->where('report_id', $report_id)
            ->get();



        $report = Report::findOrFail($report_id);

        return view('action.index', compact('actions', 'report'));
    }




    public function create($report_id)
    {
        $report = Report::findOrFail($report_id);
        $students = Student::where('user_id', Auth::id())->get();

        return view('action.create', compact('students', 'report'));
    }





    public function store(ActionRequest $request, $report_id)
    {
        if (!Auth::check()) {
            return redirect()->route('students.index');
        }

        $user_id = Auth::id();

        $data = $request->validated();
        $actions = $data['actions'];
        if(!$actions) {
            return redirect()->route('reports.index')->with('message', 'Actions added successfully!');
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

        return redirect()->route('reports.index')->with('message', 'Actions added successfully!');
    }
}
