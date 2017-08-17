<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');

// Settings::loadConfig();
class FieldLearningPlanDocumentController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateDocx($no, $plan_number)
    {

        switch ($no) {
            case 1:
               $this->word($plan_number);
                return response()->download('./word.docx');
            break;
            case 2:
            break;
            case 3:
            break;

        }

    }



    public function word($plan_number)
    {

        // 로그인한 유저의 학교 정보(선생님)이 필요
        // Auth로 사용자 아이디 가져오기
        // works table에 teacher를 선택
        // schools 테이블 정보를 works school 컬럼이 foreign키로 가지고 있어서 둘이 공통되는 번호 찾는 쿼리

        $file = \DB::table('field_learning_plan_documents')->where('no', 1)->first();

        $file->document_url;

        // 현재 로그인한 유저(선생님)
        $user = Auth::user();

        // 현재 로그인한 유저(선생님)의 근무정보 가져옴
//        $work = \DB::table('works')->where('teacher', $user->no)->first();
        $work = \DB::table('works')->where('teacher', 106)->first();

        // 근무정보 해당하는 학교의 정보를 가져옴
        $school = \DB::table('schools')->where('no', $work->school)->first();

        // 현재 작성중인 계획 번호를 하나 가져옴
        $startDay = \DB::table('field_learning_plans')->where('no', $plan_number)->first();

        // 현재 시간을 기준으로 문서 작성
        $date = \Carbon\Carbon::now();

        // 체험학습에 참여할 총인원의 수를 가져옴
       $total_count_count = \DB::table('groups')->where('plan', $plan_number)->count();
        
        // 체험학습에 참여한 학생
        $student_count = \DB::table('groups')->where('plan', $plan_number)
                                            ->where('type', 'student')->count();

        // 체험학습에 참여한 인솔자
        $teacher_count = \DB::table('groups')->where('plan', $plan_number)
                                            ->where('type', 'teacher')->count();


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("storage/test/word.docx");


        $templateProcessor->setValue('schoolName', $school->name);
        $templateProcessor->setValue('schoolAddress', $school->address);
        $templateProcessor->setValue('schoolPhone', $school->tel);
//        $templateProcessor->setValue('teacher', $user->name);
        $templateProcessor->setValue('teacher', "박성원");
        $templateProcessor->setValue('period', $startDay->at);
        $templateProcessor->setValue('total_count', $total_count_count);
        $templateProcessor->setValue('teacher_count', $teacher_count);
        $templateProcessor->setValue('student_count', $student_count);
        $templateProcessor->setValue('date', $date);


        $templateProcessor->saveAs('./word.docx');

//        return response()->download('./word.docx');
    }



    function getEndingNotes($writers)
    {
        $result = '';

        // Do not show execution time for index
        if (!IS_INDEX) {
            $result .= date('H:i:s') . " Done writing file(s)" . EOL;
            $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;
        }

        // Return
        if (CLI) {
            $result .= 'The results are stored in the "results" subdirectory.' . EOL;
        } else {
            if (!IS_INDEX) {
                $types = array_values($writers);
                $result .= '<p>&nbsp;</p>';
                $result .= '<p>Results: ';
                foreach ($types as $type) {
                    if (!is_null($type)) {
                        $resultFile = 'results/' . SCRIPT_FILENAME . '.' . $type;
                        if (file_exists($resultFile)) {
                            $result .= "<a href='{$resultFile}' class='btn btn-primary'>{$type}</a> ";
                        }
                    }
                }
                $result .= '</p>';
            }
        }

        return $result;

    }
}