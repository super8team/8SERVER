<?php

use Illuminate\Database\Seeder;

class FieldLearningPlanDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_learning_plan_documents')->insert([

            ['name' => '(수학여행)현장체험학습 실시 계획 기안문', 'explain' => '', 'work' => 1, 'document_url' => 'noURL'],
            ['name' => '수학여행 계획서 양식', 'explain' => '', 'work' => 1, 'document_url' => 'noURL'],
            ['name' => '안심수학여행서비스신청서', 'explain' => '', 'work' => 1, 'document_url' => 'storage/word.doc'],
            ['name' => '청렴교육', 'explain' => '', 'work' => 1, 'document_url' => 'noURL'],
            ['name' => '기본안전교육', 'explain' => '', 'work' => 1, 'document_url' => 'noURL'],
            ['name' => '체험학습 참가희망조사', 'explain' => '', 'work' => 2, 'document_url' => 'noURL'],
            ['name' => '참가의견조사결과 알림', 'explain' => '', 'work' => 4, 'document_url' => 'noURL'],
            ['name' => '미참가학생지도계획', 'explain' => '', 'work' => 5, 'document_url' => 'noURL'],
            ['name' => '소위원회 구성 기안문', 'explain' => '', 'work' => 6, 'document_url' => 'noURL'],
            ['name' => '소위원회운영 내부규정예시', 'explain' => '', 'work' => 6, 'document_url' => 'noURL'],
            ['name' => '소위원회 회의록(예시)', 'explain' => '', 'work' => 6, 'document_url' => 'noURL'],
            ['name' => '현장답사 기안문', 'explain' => '', 'work' => 7, 'document_url' => 'noURL'],
            ['name' => '수학여행 현장답사 계획서', 'explain' => '', 'work' => 7, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 KS표준 점검', 'explain' => '', 'work' => 7, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 사전답사 점검', 'explain' => '', 'work' => 7, 'document_url' => 'noURL'],
            ['name' => '위원답사 불참 위임장', 'explain' => '', 'work' => 7, 'document_url' => 'noURL'],
            ['name' => '출장복명서', 'explain' => '', 'work' => 7, 'document_url' => 'noURL'],
            ['name' => '수학여행 현장답사 결과 보고서', 'explain' => '', 'work' => 8, 'document_url' => 'noURL'],
            ['name' => '수학여행 현장답사 결과표', 'explain' => '', 'work' => 8, 'document_url' => 'noURL'],
            ['name' => '시설물 위생 및 안전점검 요청서 공문', 'explain' => '', 'work' => 9, 'document_url' => 'noURL'],
            ['name' => '화재점검 사전 요청서 공문', 'explain' => '', 'work' => 10, 'document_url' => 'noURL'],
            ['name' => '운영위원회 의안 제안서(기안)', 'explain' => '', 'work' => 11, 'document_url' => 'noURL'],
            ['name' => '운영위원회 의안 제안서(실시 계획서)', 'explain' => '', 'work' => 11, 'document_url' => 'noURL'],
            ['name' => '안전요원 배치(안) 심의', 'explain' => '', 'work' => 11, 'document_url' => 'noURL'],
            ['name' => '용역표준계약서', 'explain' => '', 'work' => 13, 'document_url' => 'noURL'],
            ['name' => '업체청렴서약서', 'explain' => '', 'work' => 14, 'document_url' => 'noURL'],
            ['name' => '교사 청렴서약서 양식', 'explain' => '', 'work' => 14, 'document_url' => 'noURL'],
            ['name' => '여행자 보험가입 안내', 'explain' => '', 'work' => 15, 'document_url' => 'noURL'],
            ['name' => '용역 의뢰방법', 'explain' => '', 'work' => 16, 'document_url' => 'noURL'],
            ['name' => '현장답사 기안문', 'explain' => '', 'work' => 17, 'document_url' => 'noURL'],
            ['name' => '현장답사 계획서', 'explain' => '', 'work' => 17, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 KS표준 점검', 'explain' => '', 'work' => 17, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 사전답사 점검', 'explain' => '', 'work' => 17, 'document_url' => 'noURL'],
            ['name' => '위원답사 불참 위임장', 'explain' => '', 'work' => 17, 'document_url' => 'noURL'],
            ['name' => '출장복명서', 'explain' => '', 'work' => 17, 'document_url' => 'noURL'],
            ['name' => '현장답사 결과 보고서', 'explain' => '', 'work' => 18, 'document_url' => 'noURL'],
            ['name' => '현장답사 결과표', 'explain' => '', 'work' => 18, 'document_url' => 'noURL'],
            ['name' => '특별보호학생 관리대책 수립계획서', 'explain' => '', 'work' => 19, 'document_url' => 'noURL'],
            ['name' => '특별보호학생 업체통보 공문', 'explain' => '', 'work' => 20, 'document_url' => 'noURL'],
            ['name' => '무사고 운행실적 확인서', 'explain' => '', 'work' => 21, 'document_url' => 'noURL'],
            ['name' => '성범죄 조회 요청(공문,신청서,동의서)', 'explain' => '', 'work' => 22, 'document_url' => 'noURL'],
            ['name' => '버스호송 및 음주측정요청 공문 및 요청서', 'explain' => '', 'work' => 23, 'document_url' => 'noURL'],
            ['name' => '교육청 신고 양식', 'explain' => '', 'work' => 24, 'document_url' => 'noURL'],
            ['name' => '컨설팅 체크리스트(점검)', 'explain' => '', 'work' => 25, 'document_url' => 'noURL'],
            ['name' => '컨설팅 체크리스트(조치결과)', 'explain' => '', 'work' => 25, 'document_url' => 'noURL'],
            ['name' => '안전요원 교육', 'explain' => '', 'work' => 29, 'document_url' => 'noURL'],
            ['name' => '비상연락망 양식', 'explain' => '', 'work' => 31, 'document_url' => 'noURL'],
            ['name' => '수학여행 나이스 초과근무상신', 'explain' => '', 'work' => 32, 'document_url' => 'noURL'],
            ['name' => '수학여행비 에듀파인 품의서 양식', 'explain' => '', 'work' => 34, 'document_url' => 'noURL'],
            ['name' => '차량부착표지', 'explain' => '', 'work' => 36, 'document_url' => 'noURL'],
            ['name' => '안전운전서약서', 'explain' => '', 'work' => 37, 'document_url' => 'noURL'],
            ['name' => '교통안전점검체크리스트', 'explain' => '', 'work' => 40, 'document_url' => 'noURL'],
            ['name' => '음식안전점검체크리스트', 'explain' => '', 'work' => 40, 'document_url' => 'noURL'],
            ['name' => '숙소안전체크리스트', 'explain' => '', 'work' => 40, 'document_url' => 'noURL'],
            ['name' => '화재예방안전점검체크리스트', 'explain' => '', 'work' => 40, 'document_url' => 'noURL'],
            ['name' => '캠핑 및 야영활동 안전점검 체크리스트', 'explain' => '', 'work' => 40, 'document_url' => 'noURL'],
            ['name' => '겨울철야외활동안전점검체크리스트', 'explain' => '', 'work' => 40, 'document_url' => 'noURL'],
            ['name' => '활동별 응급조치사항', 'explain' => '', 'work' => 44, 'document_url' => 'noURL'],
            ['name' => '사건발생시 유선보고사항', 'explain' => '', 'work' => 47, 'document_url' => 'noURL'],
            ['name' => '사건발생시 사안보고서', 'explain' => '', 'work' => 47, 'document_url' => 'noURL'],
            ['name' => '정산 및 공개 양식', 'explain' => '', 'work' => 48, 'document_url' => 'noURL'],
            ['name' => '환불 조치 기안', 'explain' => '', 'work' => 49, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 청렴도 설문지(교원)', 'explain' => '', 'work' => 50, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 결과설문지(학생)', 'explain' => '', 'work' => 51, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 결과설문지(학부모)', 'explain' => '', 'work' => 52, 'document_url' => 'noURL'],
            ['name' => '현장체험학습 결과설문지(교원)', 'explain' => '', 'work' => 53, 'document_url' => 'noURL'],
            ['name' => '평가결과 소위원회 통보양식', 'explain' => '', 'work' => 55, 'document_url' => 'noURL'],
            ['name' => '학교생활기록부기재방법', 'explain' => '', 'work' => 56, 'document_url' => 'noURL']


        ]);
    }
}
