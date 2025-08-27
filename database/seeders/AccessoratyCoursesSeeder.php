<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccessoratyCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('📚 بدء إضافة بيانات الكورسات التعليمية في أكسسوراتى...');

        // 1. إنشاء الكورسات
        $this->createCourses();
        
        // 2. إنشاء الطلاب
        $this->createStudents();
        
        // 3. إنشاء محتوى الكورسات
        $this->createCourseContents();
        
        // 4. إنشاء الحضور
        $this->createAttendances();
        
        // 5. إنشاء الامتحانات
        $this->createExams();
        
        // 6. إنشاء نتائج الامتحانات
        $this->createExamResults();
        
        // 7. إنشاء الشهادات
        $this->createCertificates();

        $this->command->info('✅ تم إضافة جميع بيانات الكورسات التعليمية بنجاح! 🎉');
    }

    private function createCourses()
    {
        $this->command->info('📖 إنشاء الكورسات التعليمية...');

        $courses = [
            [
                'name' => 'كورس التجميل الاحترافي',
                'description' => 'كورس شامل لتعلم فنون التجميل الحديثة والمتطورة، يشمل المكياج اليومي والمسائي والمناسبات الخاصة',
                'duration' => '3 أشهر',
                'instructor' => 'أ. سارة أحمد',
                'max_students' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس تصميم الأزياء الأساسي',
                'description' => 'تعلم أساسيات تصميم الأزياء، رسم الموديلات، اختيار الألوان والقماش، وتقنيات الخياطة الأساسية',
                'duration' => '6 أشهر',
                'instructor' => 'أ. فاطمة محمد',
                'max_students' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس العناية بالبشرة',
                'description' => 'كورس متخصص في العناية بالبشرة، أنواع البشرة، المنتجات المناسبة، والروتين اليومي للعناية',
                'duration' => '2 أشهر',
                'instructor' => 'أ. نورا خالد',
                'max_students' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس تصفيف الشعر المتقدم',
                'description' => 'تعلم تقنيات تصفيف الشعر المتقدمة، قص الشعر، صبغ الشعر، وتصفيفات المناسبات',
                'duration' => '4 أشهر',
                'instructor' => 'أ. ليلى سعد',
                'max_students' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كورس التصوير الفوتوغرافي',
                'description' => 'كورس شامل لتعلم فن التصوير الفوتوغرافي، إعدادات الكاميرا، الإضاءة، والتكوين',
                'duration' => '5 أشهر',
                'instructor' => 'أ. أحمد علي',
                'max_students' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($courses as $course) {
            DB::table('courses')->updateOrInsert(
                ['name' => $course['name']],
                $course
            );
        }

        $this->command->info('✅ تم إنشاء الكورسات التعليمية بنجاح');
    }

    private function createStudents()
    {
        $this->command->info('👩‍🎓 إنشاء الطلاب...');

        $students = [
            [
                'name' => 'فاطمة أحمد محمد',
                'email' => 'fatima.ahmed@example.com',
                'phone' => '+966501234567',
                'course_id' => 1, // كورس التجميل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نورا خالد السعد',
                'email' => 'nora.khalid@example.com',
                'phone' => '+966507654321',
                'course_id' => 1, // كورس التجميل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة محمد العلي',
                'email' => 'sara.mohammed@example.com',
                'phone' => '+966503456789',
                'course_id' => 2, // كورس تصميم الأزياء
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ليلى أحمد حسن',
                'email' => 'layla.ahmed@example.com',
                'phone' => '+966509876543',
                'course_id' => 2, // كورس تصميم الأزياء
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ريم خالد محمد',
                'email' => 'reem.khalid@example.com',
                'phone' => '+966505555555',
                'course_id' => 3, // كورس العناية بالبشرة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'أسماء سعد علي',
                'email' => 'asma.saad@example.com',
                'phone' => '+966506666666',
                'course_id' => 3, // كورس العناية بالبشرة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'هند محمد أحمد',
                'email' => 'hind.mohammed@example.com',
                'phone' => '+966507777777',
                'course_id' => 4, // كورس تصفيف الشعر
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نور محمد سعد',
                'email' => 'noor.mohammed@example.com',
                'phone' => '+966508888888',
                'course_id' => 4, // كورس تصفيف الشعر
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مريم أحمد علي',
                'email' => 'mariam.ahmed@example.com',
                'phone' => '+966509999999',
                'course_id' => 5, // كورس التصوير
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'زينب محمد حسن',
                'email' => 'zainab.mohammed@example.com',
                'phone' => '+966500000000',
                'course_id' => 5, // كورس التصوير
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($students as $student) {
            DB::table('students')->updateOrInsert(
                ['email' => $student['email']],
                $student
            );
        }

        $this->command->info('✅ تم إنشاء الطلاب بنجاح');
    }

    private function createCourseContents()
    {
        $this->command->info('📚 إنشاء محتوى الكورسات...');

        $contents = [
            // كورس التجميل
            [
                'course_id' => 1,
                'title' => 'أساسيات المكياج',
                'type' => 'video',
                'file_path' => '/courses/makeup/basics.mp4',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'أدوات التجميل الأساسية',
                'type' => 'pdf',
                'file_path' => '/courses/makeup/tools.pdf',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'المكياج المسائي',
                'type' => 'video',
                'file_path' => '/courses/makeup/evening.mp4',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // كورس تصميم الأزياء
            [
                'course_id' => 2,
                'title' => 'أساسيات الرسم',
                'type' => 'pdf',
                'file_path' => '/courses/fashion/drawing.pdf',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'أنواع الأقمشة',
                'type' => 'presentation',
                'file_path' => '/courses/fashion/fabrics.pptx',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'تقنيات الخياطة',
                'type' => 'video',
                'file_path' => '/courses/fashion/sewing.mp4',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($contents as $content) {
            DB::table('course_contents')->updateOrInsert(
                ['course_id' => $content['course_id'], 'title' => $content['title']],
                $content
            );
        }

        $this->command->info('✅ تم إنشاء محتوى الكورسات بنجاح');
    }

    private function createAttendances()
    {
        $this->command->info('📅 إنشاء سجلات الحضور...');

        $attendances = [
            [
                'student_id' => 1,
                'course_id' => 1,
                'session_date' => '2025-01-15',
                'present' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 1,
                'session_date' => '2025-01-15',
                'present' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'course_id' => 2,
                'session_date' => '2025-01-16',
                'present' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 4,
                'course_id' => 2,
                'session_date' => '2025-01-16',
                'present' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($attendances as $attendance) {
            DB::table('attendances')->insert($attendance);
        }

        $this->command->info('✅ تم إنشاء سجلات الحضور بنجاح');
    }

    private function createExams()
    {
        $this->command->info('📝 إنشاء الامتحانات...');

        $exams = [
            [
                'course_id' => 1,
                'title' => 'امتحان منتصف الفصل - التجميل',
                'type' => 'quiz',
                'questions' => json_encode([
                    'ما هي الأدوات الأساسية للمكياج؟',
                    'كيف تختارين لون الأساس المناسب؟',
                    'ما هي خطوات المكياج اليومي؟'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title' => 'امتحان نهائي - تصميم الأزياء',
                'type' => 'final',
                'questions' => json_encode([
                    'ارسمي موديل أنيق للمناسبات الرسمية',
                    'اشرحي كيفية اختيار الألوان المتناسقة',
                    'ما هي أساسيات الخياطة؟'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($exams as $exam) {
            DB::table('exams')->updateOrInsert(
                ['course_id' => $exam['course_id'], 'title' => $exam['title']],
                $exam
            );
        }

        $this->command->info('✅ تم إنشاء الامتحانات بنجاح');
    }

    private function createExamResults()
    {
        $this->command->info('📊 إنشاء نتائج الامتحانات...');

        $results = [
            [
                'exam_id' => 1,
                'student_id' => 1,
                'score' => 85,
                'passed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'exam_id' => 1,
                'student_id' => 2,
                'score' => 92,
                'passed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'exam_id' => 2,
                'student_id' => 3,
                'score' => 78,
                'passed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'exam_id' => 2,
                'student_id' => 4,
                'score' => 65,
                'passed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($results as $result) {
            DB::table('exam_results')->insert($result);
        }

        $this->command->info('✅ تم إنشاء نتائج الامتحانات بنجاح');
    }

    private function createCertificates()
    {
        $this->command->info('🏆 إنشاء الشهادات...');

        $certificates = [
            [
                'student_id' => 1,
                'course_id' => 1,
                'certificate_path' => '/certificates/fatima_ahmed_makeup.pdf',
                'signed_by' => 'أ. سارة أحمد',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 1,
                'certificate_path' => '/certificates/nora_khalid_makeup.pdf',
                'signed_by' => 'أ. سارة أحمد',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'course_id' => 2,
                'certificate_path' => '/certificates/sara_mohammed_fashion.pdf',
                'signed_by' => 'أ. فاطمة محمد',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($certificates as $certificate) {
            DB::table('certificates')->insert($certificate);
        }

        $this->command->info('✅ تم إنشاء الشهادات بنجاح');
    }
}
