<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'AUDIT SERVICES',
            'name' => 'خدمات المراقبة',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'VAT CONSULTATION',
            'name' => 'استشارات ضريبة القيمة المضافة',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'FINANCIAL ANALAYSIS',
            'name' => 'تحليل مالي',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'BUDGETING & FORECASTING',
            'name' => 'وضع الموازنة والتنبؤ',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'BUSINESS PLANS',
            'name' => 'خطط العمل',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'USINESS VALUATION',
            'name' => 'تقييم الاعمال',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'DUE DILIGENCE',
            'name' => 'اجراءات لارضاء المتطلبات',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'HUMAN RESOURCE',
            'name' => 'الموارد البشرية',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);

        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'ACCOUNTING SERVICES',
            'name' => 'خدمات المحاسبة',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
        Service::create([
            'brief' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'brief_en' => 'Although an audit is generally a regulatory requirement, we at Dar Alnuzum provide ...',
            'name_en' => 'LIQUIDATION SERVICES',
            'name' => 'خدمات التصفية',
            'description' => ' اي وصف للاختبار',
            'description_en' => 'any description english for testing',
        ]);
    }
}
