<?php

use Illuminate\Database\Seeder;

class FieldLearningPlanWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_learning_plan_works')->insert([

            ['name' => '체험학습 기본계획수립', 'step' => 1, 'explain' => ''],
            ['name' => '체험학습 참가희망 조사 실시', 'step' => 2, 'explain' => ''],
            ['name' => '학생선호도 조사 실시', 'step' => 2, 'explain' => ''],
            ['name' => '참가의견 조사결과 회신', 'step' => 2, 'explain' => ''],
            ['name' => '미참가 학생지도 계획수립', 'step' => 2, 'explain' => ''],
            ['name' => '소위원회 구성', 'step' => 3, 'explain' => ''],
            ['name' => '현장답사[계약 전] 계획 수립', 'step' => 4, 'explain' => ''],
            ['name' => '현장답사[계약 전] 결과 보고', 'step' => 4, 'explain' => ''],
            ['name' => '전기, 가스, 위생 등 안전점검 확인 요청(숙박업소)', 'step' => 4, 'explain' => ''],
            ['name' => '화재점검 사전 요청(관할 소방서)', 'step' => 4, 'explain' => ''],
            ['name' => '운영위원회 의안 제안 및 심의', 'step' => 5, 'explain' => ''],
            ['name' => '학교장 결제 요청', 'step' => 5, 'explain' => ''],
            ['name' => '표준약관 계약서 사용 계약', 'step' => 6, 'explain' => ''],
            ['name' => '청렴 서약(업체, 교사)', 'step' => 6, 'explain' => ''],
            ['name' => '여행자 보험 가입 안내', 'step' => 6, 'explain' => ''],
            ['name' => '용역 의뢰', 'step' => 6, 'explain' => ''],
            ['name' => '현장답사[시행 직전] 계획 수립', 'step' => 7, 'explain' => ''],
            ['name' => '현장답사[시행 직전] 결과 보고', 'step' => 7, 'explain' => ''],
            ['name' => '특별 보호대상학생 관리 계획 수립', 'step' => 8, 'explain' => ''],
            ['name' => '특별 보호대상학생 업체 통보', 'step' => 8, 'explain' => ''],
            ['name' => '무사고 운행실적 확인', 'step' => 8, 'explain' => ''],
            ['name' => '안전요원 확보 및 필수사항 확인 요청', 'step' => 8, 'explain' => ''],
            ['name' => '경찰서 호송 및 음주측정 요청', 'step' => 8, 'explain' => ''],
            ['name' => '교육청 신고', 'step' => 8, 'explain' => ''],
            ['name' => '현장체험학습 교육청 컨설팅 신청', 'step' => 8, 'explain' => ''],
            ['name' => '기본안전교육 실시	', 'step' => 9, 'explain' => ''],
            ['name' => '체험 유형별 안전교육 실시', 'step' => 9, 'explain' => ''],
            ['name' => '성범죄 예방 교육실시', 'step' => 9, 'explain' => ''],
            ['name' => '안전요원 안전교육 실시', 'step' => 9, 'explain' => ''],
            ['name' => '인솔 및 지도교사 안전교육 실시', 'step' => 9, 'explain' => ''],
            ['name' => '비상연락망 작성', 'step' => 9, 'explain' => ''],
            ['name' => '계획서 홈페이지 공개', 'step' => 10, 'explain' => ''],
            ['name' => 'NEIS 복무신청(초과근무 포함)', 'step' => 10, 'explain' => ''],
            ['name' => '비상약품 구비', 'step' => 10, 'explain' => ''],
            ['name' => '경비 지출 품의', 'step' => 10, 'explain' => ''],
            ['name' => '교육청 현장 점검', 'step' => 11, 'explain' => ''],
            ['name' => '단체차량이용 사전점검 및 차량표지 부착', 'step' => 11, 'explain' => ''],
            ['name' => '운전자 안전운전 교육 실시', 'step' => 11, 'explain' => ''],
            ['name' => '운송수단 이용 안전교육 실시', 'step' => 11, 'explain' => ''],
            ['name' => '경찰 호송 및 음주측정 실시', 'step' => 11, 'explain' => ''],
            ['name' => '사제동행 현장교육실시', 'step' => 11, 'explain' => ''],
            ['name' => '이동경로별 안전교육 실시', 'step' => 11, 'explain' => ''],
            ['name' => '숙소 안전교육 실시', 'step' => 11, 'explain' => ''],
            ['name' => '숙박지 현장점검실시(표집실시)', 'step' => 11, 'explain' => ''],
            ['name' => '사고발생시 조치사항 숙지', 'step' => 11, 'explain' => ''],
            ['name' => '임시출납원 임명', 'step' => 11, 'explain' => ''],
            ['name' => '학교법인카드 사용', 'step' => 11, 'explain' => ''],
            ['name' => '사건발생시 사안보고 요령 숙지', 'step' => 11, 'explain' => ''],
            ['name' => '정산 및 내역 공개', 'step' => 12, 'explain' => ''],
            ['name' => '환불조치', 'step' => 12, 'explain' => ''],
            ['name' => '인솔 교직원 청렴도 평가 실시', 'step' => 13, 'explain' => ''],
            ['name' => '학생 평가 실시', 'step' => 13, 'explain' => ''],
            ['name' => '학부모 평가 실시', 'step' => 13, 'explain' => ''],
            ['name' => '교사 평가 실시', 'step' => 13, 'explain' => ''],
            ['name' => '평가결과 현장체험학습 공개방에 공개', 'step' => 14, 'explain' => ''],
            ['name' => '평가결과 소위워회 통보', 'step' => 14, 'explain' => ''],
            ['name' => '학교생활기록부 기재', 'step' => 14, 'explain' => '']

        ]);
    }
}
