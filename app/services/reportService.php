<?php

namespace App\Services;

use App\Models\Report;
use App\Models\Subject;
use App\Models\User;


class  ReportService
{

    public function getreport($report_id)
    {
        $report = Report::where('id', $report_id)->first();
        if ($report) {
            return $report;
        } else{
            return null;
        }
    }


    public function search($name)
    {
        return report::where('name', 'like', '%' . $name . '%')
            ->get();
    }






}
