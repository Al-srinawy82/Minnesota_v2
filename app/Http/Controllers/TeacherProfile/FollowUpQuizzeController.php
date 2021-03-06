<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\FollowUpQuizze;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpQuizzeController extends Controller 
{

  public function __construct()
    {
        $this->middleware('auth:teacher');
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $followUpQuizzes    = FollowUpQuizze::all();
    $teacherId          = Auth::guard('teacher')->user()->id;
    $classes            = ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.quizzes.follow-up-quizzes', compact('classes', 'followUpQuizzes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
 
    $request->validate([
      'quizze_id'=> ['required'],
      'student_id'=> ['required', 'integer'],
      'status'=> ['integer'],
      'mark'=> ['required', 'integer'],
  ]);

  $new_mark = $request->mark;

  
   
  $checkMark= Quizze::findOrfail($request->quizze_id);

  if ($request->mark <= $checkMark->full_mark) {
    
    $studentCheck   = FollowUpQuizze::where([

      ['quizze_id', '=', $request->quizze_id],
      ['student_id', '=', $request->student_id],
  
    ])->first();
    

    if (empty($studentCheck)) {
      
      FollowUpQuizze::create([
        'quizze_id'=> $request->quizze_id,
        'status'=> $request->status,
        'mark'=> $request->mark,
        'student_id'=> (int)$request->student_id]);

      return compact('new_mark');
  
    } elseif (!empty($studentCheck)) {
   
  
      $studentCheck->student_id = $request->student_id;
      $studentCheck->quizze_id = $request->quizze_id;
      $studentCheck->mark = $request->mark;
      $studentCheck->save();

      return compact('new_mark');
  
    }


  } else {
    $new_mark = 'الدرجة المراد تعيينها اكبر من الدرجة المعينة للإختبار';
    return compact('new_mark');
    // return redirect('/followupquizze')->with('alert', 'الدرجة المراد تعيينها اكبر من الدرجة المعينة للإختبار');
  }
  

    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>