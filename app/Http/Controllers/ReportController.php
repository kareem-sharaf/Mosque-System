<?php


namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Services\reportService;

class ReportController extends Controller
{



    protected $reportService;

    public function __construct(reportService $reportService)
    {
        $this->reportService = $reportService;
    }


    public function index()
    {
        $reports = Report::all();
        return view('report.index', compact('reports'));
    }


    // public function showOne($report_id)
    // {
    //     $report = $this->reportService->getreport($report_id);

    //     if (!$report) {
    //         return redirect()->route('reports.index')->with('error', 'report not found');
    //     }

    //     return view('reports.show', compact('report'));
    // }






    // public function create()
    // {
    //     return view('report.create');
    // }


    // public function store(ReportRequest $request)
    // {


    //     $data = $request->validated();


    //     $report = Report::create($data);

    //     return redirect()->route('report.index')->with('message', 'report added successfully!');
    // }





    // public function destroy($report_id)
    // {
    //     $report = Report::findOrFail($report_id);
    //     $report->delete();

    //     return redirect()->route('reports.index')->with('message', 'report deleted successfully!');
    // }







    // public function edit($report_id)
    // {
    //     $report = $this->reportService->getreport($report_id);

    //     if (!$report) {
    //         return redirect()->route('reports.index')->with('message', 'report not found.');
    //     }

    //     return view('report.edit', compact('report'));
    // }


    // public function update(reportRequest $request, $report_id)
    // {
    //     $data = $request->validated();
    //     $report = $this->reportService->getreport($report_id);
    //     if (!$report) {
    //         return redirect()->route('reports.index')->with('error', 'report does not exist!');
    //     }
    //     $report->update($data);
    //     return redirect()->route('reports.index')->with('message', 'report updated successfully!');
    // }











    //****************************************************************************** */





    // public function search(Request $request)
    // {

    //     $name = $request->query('name');


    //     if (!$name) {
    //         return response()->json([
    //             'message' => "There is nothing to search.",
    //         ]);
    //     }

    //     $reports = $this->reportService->search($name);


    //     return response()->json([
    //         'message' => "There are the items.",
    //         'reports' => $reports,
    //     ]);
    // }








}
