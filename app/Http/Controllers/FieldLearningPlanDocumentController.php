<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Settings;

define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');

Settings::loadConfig();
class FieldLearningPlanDocumentController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateDocx(ReQuest $request)
    {

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("storage/documents/test.docx");

        // 디비에 접근 테이블에서 문서를 하나씩 출력
        // 해당 문서를 열어 각 변수에 해당 하는 값이 들어갈 수 있도록 지정
        // 더 있나?


        $templateProcessor->setValue('schoolName', '영진전문대학');
        $templateProcessor->setValue('schoolAddress', '대구광역시 북구');
        $templateProcessor->setValue('teacher', '박성원');
        $templateProcessor->setValue('schoolPhone', '010-5034-6922');
        $templateProcessor->setValue('period', '7/24 ~ 7/31');
        $templateProcessor->setValue('total_count', '51');
        $templateProcessor->setValue('teacher_count', '1');
        $templateProcessor->setValue('student_count', '50');
        $templateProcessor->setValue('facilityName', '나래 학원');
        $templateProcessor->setValue('facilityAddress', '후쿠오카 텐진');
        $templateProcessor->setValue('representative', '나래 학원 원장');
        $templateProcessor->setValue('representativePhone', '010-1234-5678');
        $templateProcessor->setValue('n', '7');
        $templateProcessor->setValue('m', '7');
        $templateProcessor->setValue('d', '23');
        $templateProcessor->setValue('applicant', '박성원');

        $templateProcessor->saveAs('./test.docx');

        return response()->download('./test.docx');


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