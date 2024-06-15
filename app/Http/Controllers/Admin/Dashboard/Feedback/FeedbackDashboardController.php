<?php

namespace App\Http\Controllers\Admin\Dashboard\Feedback;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;

class FeedbackDashboardController extends Controller
{
    public Function index() 
    {
        $feedbacks = FeedBack::all() ;
        return view('Admin.feedback' , compact('feedbacks')) ;
    }


    public function destroy(FeedBack $feedBack) 
    {

        $feedBack->delete() ;
        return redirect('dashboard/feedback/')->with('deleted','Feedback has been deleted successfully') ; 
    }
}
