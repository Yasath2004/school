<?php
namespace App\Http\Controllers;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        $teachers = Teacher::visible()->get();
        $internationalTeachers = $teachers->whereIn('section', ['international', 'both']);
        $preschoolTeachers = $teachers->whereIn('section', ['preschool', 'both']);
        return view('teachers.index', compact('teachers', 'internationalTeachers', 'preschoolTeachers', 'lang'));
    }
}
