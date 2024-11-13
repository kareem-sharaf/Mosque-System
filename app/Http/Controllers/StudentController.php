<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Services\studentService;
use App\Http\Middleware\CustomAuthMiddleware;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{



    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }








    public function create()
    {
        return view('student.create');
    }


    public function store(StudentRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $data = $request->validated();
        $data['user_id'] = $user_id;

        Student::create($data);

        return redirect()->route('students.index')->with('message', 'تمت إضافة الطالب بنجاح!');
    }



    public function index()
    {
        $students = Student::where('user_id', Auth::id())->get();
        return view('student.index', compact('students'));
    }



    public function destroy($student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();

        return redirect()->route('students.index')->with('message', 'Student deleted successfully!');
    }







    public function edit($student_id)
    {
        $student = $this->studentService->getstudent($student_id);

        if (!$student) {
            return redirect()->route('students.index')->with('message', 'Student not found.');
        }

        return view('student.edit', compact('student'));
    }


    public function update(StudentRequest $request, $student_id)
    {
        $data = $request->validated();
        $student = $this->studentService->getstudent($student_id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student does not exist!');
        }
        $student->update($data);
        return redirect()->route('students.index')->with('message', 'Student updated successfully!');
    }











    //****************************************************************************** */





    public function search(Request $request)
    {

        $name = $request->query('name');


        if (!$name) {
            return response()->json([
                'message' => "There is nothing to search.",
            ]);
        }

        $students = $this->studentService->search($name);


        return response()->json([
            'message' => "There are the items.",
            'students' => $students,
        ]);
    }







    public function showOne($student_id)
    {
        $student = $this->studentService->getStudent($student_id);

        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }

        return view('students.show', compact('student'));
    }
}
