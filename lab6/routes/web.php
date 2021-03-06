<?php
namespace App;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/add', function(){
    DB::insert('insert into student(Name, Date_Of_Birth, GPA, advisor) values (?,?,?,?)',
    ['Ayazhan', '2001-12-16', '3.5', 'Ualikhan Sadyk']);
});

Route::get('/select', function(){
    $results=DB::select('select * from student where id=?', [3]);
    foreach($results as $student){
        echo "Name is: ".$student->Name;
        echo "<br>";
        echo "Date of birth is: ".$student->Date_Of_Birth;
        echo "<br>";
        echo "GPA is: ".$student->GPA;
        echo "<br>";
        echo "Advisor is: ".$student->advisor;
    }
});

Route::get('/update', function(){
    $updated=DB::update('update student set GPA="3.6" where id=?', [1]);
    return $updated;
});

Route::get('/delete', function(){
    $deleted=DB::delete('delete from student where id=?', [1]);
    return $deleted;
});

Route::get('/insert', function(){
    $student = new Student;
    $student ->Name='Aruzhan';
    $student ->Date_Of_Birth='2002-02-09';
    $student ->GPA='3.5';
    $student ->advisor='Ualikan Sadyk';
    $student ->save();
});

Route::get('/read', function(){
    $student=Student::all();
    foreach($student as $stud){
        echo "Name is: ".$stud->Name;
        echo "<br>";
        echo "Date of birth is: ".$stud->Date_Of_Birth;
        echo "<br>";
        echo "GPA is: ".$stud->GPA;
        echo "<br>";
        echo "Advisor is: ".$stud->advisor;
    }
});

Route::get('/basicupdate', function(){
    $student = Student::find(2);
    $student ->GPA='3.6';
    $student ->advisor='U.Sadyk';
    $student ->save();
});

Route::get('/delete2', function(){
    $student = Student::find(2);
    $student ->delete();
});


