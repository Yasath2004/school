<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Intake;
use App\Models\Event;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\Faq;
use App\Models\ContactMessage;
use App\Models\SchoolSetting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::firstOrCreate(
            ['email' => 'admin@chalkchauser.lk'],
            [
                'name' => 'School Administrator',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. School Settings
        SchoolSetting::set('school_name', 'Chalk & Chauser International School', 'චෝක් සහ චෝසර් ජාත්‍යන්තර පාසල');
        SchoolSetting::set('motto', 'Dedicated to Standards of Excellence', 'විශිෂ්ටත්වයේ ප්‍රමිතීන්ට කැපවී');
        SchoolSetting::set('phone', '+94 11 234 5678');
        SchoolSetting::set('email', 'info@chalkchauser.lk');
        SchoolSetting::set('address', 'No. 124, Havelock Road, Colombo 05, Sri Lanka');

        // 3. Teachers
        $teachers = [
            [
                'name' => 'Mrs. Dilani Senanayake',
                'role_en' => 'Principal & Head of School',
                'role_si' => 'විදුහල්පතිනිය',
                'section' => 'both',
                'subject_en' => 'Educational Leadership',
                'qualifications_en' => 'M.Ed (UK), B.Sc (Hons), PGDE',
                'bio_en' => 'Over 20 years guiding international academic standards across Sri Lanka and the region.',
                'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'sort_order' => 1,
            ],
            [
                'name' => 'Mr. Christopher Fernando',
                'role_en' => 'Head of Science & Cambridge Coordinator',
                'role_si' => 'විද්‍යා අංශ ප්‍රධානී',
                'section' => 'international',
                'subject_en' => 'Physics & Chemistry',
                'qualifications_en' => 'B.Sc (Physical Science), Cambridge Certified',
                'bio_en' => 'Passionate about inquiry-led discovery and mentoring students toward top regional Olympiad finishes.',
                'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80',
                'sort_order' => 2,
            ],
            [
                'name' => 'Ms. Anusha Wickramasinghe',
                'role_en' => 'Head of Preschool & Early Childhood',
                'role_si' => 'පූර්ව ළමාවිය අංශ ප්‍රධානී',
                'section' => 'preschool',
                'subject_en' => 'Early Years Education',
                'qualifications_en' => 'Diploma in Early Childhood Education (Australia)',
                'bio_en' => 'Believes every child thrives when self-expression, music, and gentle routine converge.',
                'photo' => 'https://images.unsplash.com/photo-1580894732489-32cf4b6e5831?auto=format&fit=crop&w=600&q=80',
                'sort_order' => 3,
            ],
            [
                'name' => 'Mr. Ruwan Jayasuriya',
                'role_en' => 'Head of Physical Education & Sports',
                'role_si' => 'ක්‍රීඩා අංශ ප්‍රධානී',
                'section' => 'international',
                'subject_en' => 'Athletics & Team Sports',
                'qualifications_en' => 'B.P.Ed, National Level Coach',
                'bio_en' => 'Inspiring resilience, team spirit, and physical health across all age cohorts.',
                'photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'sort_order' => 4,
            ]
        ];

        foreach ($teachers as $t) {
            Teacher::create($t);
        }

        // 4. Intakes
        Intake::create([
            'title_en' => 'Academic Year 2025/2026 Admissions Intake',
            'title_si' => '2025/2026 අධ්‍යයන වර්ෂය සඳහා නව සිසුන් ඇතුළත් කරගැනීම',
            'description_en' => 'Applications are now open for Nursery, Kindergarten, and Grades 1 through 9. Early entrance assessments scheduled monthly.',
            'description_si' => 'පූර්ව ළමාවිය සහ 1 සිට 9 ශ්‍රේණි දක්වා ඇතුළත් කිරීම් දැන් විවෘතයි.',
            'section' => 'both',
            'grades_ages_en' => 'Preschool (Ages 2.5–5) & Grades 1–9',
            'grades_ages_si' => 'වයස 2.5–5 සහ 1–9 ශ්‍රේණි',
            'academic_year' => '2025/2026',
            'status' => 'open',
            'sort_order' => 1,
        ]);

        Intake::create([
            'title_en' => 'Mid-Term Preschool Playgroup Intake',
            'title_si' => 'පූර්ව පාසල් අතරමැදි ඇතුළත් කිරීම',
            'description_en' => 'Limited spaces available in our sensory playgroup program starting this term.',
            'description_si' => 'සීමිත ආසන සංඛ්‍යාවක් ඉතිරිව ඇත.',
            'section' => 'preschool',
            'grades_ages_en' => 'Ages 2.5 – 3 Years',
            'grades_ages_si' => 'වයස අවුරුදු 2.5 – 3',
            'academic_year' => '2025 Term 2',
            'status' => 'open',
            'sort_order' => 2,
        ]);

        // 5. Events / News / Achievements
        Event::create([
            'title_en' => 'Annual Cultural & Literary Day 2025',
            'title_si' => 'වාර්ෂික සාහිත්‍ය හා සංස්කෘතික දිනය',
            'description_en' => 'Celebration of bilingual oratory, student dramatic showcases, and classical poetry exhibitions.',
            'description_si' => 'ද්විභාෂා කථික සහ නාට්‍ය සංදර්ශන.',
            'type' => 'event',
            'event_date' => now()->addDays(20),
            'location_en' => 'Main Auditorium, Colombo',
            'location_si' => 'ප්‍රධාන ශ්‍රවණාගාරය',
            'status' => 'published',
        ]);

        Event::create([
            'title_en' => 'Inter-House Sports Meet & Track Championships',
            'title_si' => 'වාර්ෂික නිවාසාන්තර ක්‍රීඩා උළෙල',
            'description_en' => 'Our annual athletics showcase where houses compete in track, field, and team challenges.',
            'description_si' => 'නිවාසාන්තර ක්‍රීඩා තරඟාවලිය.',
            'type' => 'event',
            'event_date' => now()->addDays(35),
            'location_en' => 'Sugathadasa Stadium Grounds',
            'location_si' => 'සුගතදාස ක්‍රීඩාංගනය',
            'status' => 'published',
        ]);

        Event::create([
            'title_en' => 'Students Excel in Regional Science & Innovation Fair',
            'title_si' => 'ප්‍රාදේශීය විද්‍යා තරඟාවලියේදී ජයග්‍රහණ',
            'description_en' => 'Chalk & Chauser junior secondary innovators achieved 1st place in the Sustainable Energy exhibition.',
            'description_si' => 'තිරසාර බලශක්ති ප්‍රදර්ශනයේ ප්‍රථම ස්ථානය දිනාගැනීම.',
            'type' => 'achievement',
            'event_date' => now()->subDays(10),
            'status' => 'published',
        ]);

        // 6. Gallery
        $album1 = GalleryAlbum::create([
            'title_en' => 'Science Lab & Interactive Learning',
            'title_si' => 'විද්‍යාගාර අත්දැකීම්',
            'category' => 'classroom',
            'cover_image' => 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?auto=format&fit=crop&w=800&q=80',
            'is_visible' => true,
        ]);
        $album1->images()->createMany([
            ['image_path' => 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?auto=format&fit=crop&w=800&q=80', 'caption_en' => 'Chemistry experiments'],
            ['image_path' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80', 'caption_en' => 'Microscope exploration'],
        ]);

        $album2 = GalleryAlbum::create([
            'title_en' => 'Preschool Discovery & Play Time',
            'title_si' => 'පූර්ව පාසල් විනෝද කටයුතු',
            'category' => 'preschool',
            'cover_image' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80',
            'is_visible' => true,
        ]);
        $album2->images()->createMany([
            ['image_path' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80', 'caption_en' => 'Sensory play'],
        ]);

        // 7. FAQs
        Faq::create([
            'question_en' => 'What are the school operating hours?',
            'question_si' => 'පාසල් වේලාවන් කෙසේද?',
            'answer_en' => 'Preschool operates from 8:00 AM to 12:00 PM. The International School primary & secondary sections operate from 7:45 AM to 2:15 PM.',
            'answer_si' => 'පූර්ව පාසල පෙ.ව. 8:00 සිට 12:00 දක්වාද, ජාත්‍යන්තර පාසල පෙ.ව. 7:45 සිට ප.ව. 2:15 දක්වාද ක්‍රියාත්මක වේ.',
            'category' => 'general',
            'sort_order' => 1,
        ]);

        Faq::create([
            'question_en' => 'Is transport provided across Colombo suburbs?',
            'question_si' => 'ප්‍රවාහන පහසුකම් සලසන්නේද?',
            'answer_en' => 'Yes, verified private school van routes service Colombo 03, 04, 05, 07, Nugegoda, Kohuwala, and Dehiwala.',
            'answer_si' => 'ඔව්, කොළඹ සහ තදාසන්න නගර ආවරණය කරමින් ප්‍රවාහන සේවා ක්‍රියාත්මක වේ.',
            'category' => 'general',
            'sort_order' => 2,
        ]);

        // 8. Sample Contact Enquiry
        ContactMessage::create([
            'parent_name' => 'Mrs. K. Jayawardena',
            'contact_number' => '+94 77 456 7890',
            'email' => 'kavindi.j@example.com',
            'school_section' => 'preschool',
            'preferred_grade' => 'Playgroup (Age 2.8)',
            'message' => 'We would love to visit the campus next Tuesday morning to see the play areas.',
            'lang' => 'en',
            'status' => 'new',
            'internal_notes' => null,
            'ip_address' => '127.0.0.1',
        ]);
    }
}
