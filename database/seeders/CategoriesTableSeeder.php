<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name_en' => 'Trading', 'name' => 'تجارة', 'description' => ' اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Travel & Tourism', 'name' => 'رحلة سياحية', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Civil Engineering ', 'name' => 'هندسة مدنية', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Real Estate', 'name' => 'العقارات', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Construction', 'name' => 'بناء', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Building Construction', 'name' => 'تشييد المباني', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Manifacturing', 'name' => 'التصنيع', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Educational institutions', 'name' => 'المؤسسات التعليمية', 'description' => 'اي وصف للاختبار ', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Medical Service providers', 'name' => 'مقدمو الخدمات الطبية', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Investment', 'name' => 'استثمار', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Pharmaceuticals', 'name' => 'الأدوية', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Courier services', 'name' => 'خدمات الشحن', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Nonprofit organizations', 'name' => 'منظمات غير ربحية', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'Hotels and Restaurants ', 'name' => 'الفنادق والمطاعم', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
        Category::create(['name_en' => 'MCG & Retail', 'name' => 'MCG والتجزئة', 'description' => 'اي وصف للاختبار', 'description_en' => 'any description english for testing', 'status' => 1]);
    }
}
