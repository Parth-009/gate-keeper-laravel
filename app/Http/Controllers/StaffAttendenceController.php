<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Attendence;
use Illuminate\Support\Facades\DB;

class StaffAttendenceController extends Controller
{
    public function table(){
        $data = DB::table('staffs')->select('*')->get();
        
        return view('auth.staffattendence',compact('data'));
    }   
    
    public function present(Request $req){
        $array=(array_count_values($req->present));
        foreach($array as $key=>$value){
            if($array[$key]==2)
            {
                $status=Attendence::insert([
                    "staff_id"=> $key,
                    "date"=> $req->date,
                    "status"=> "present"
                ]); 
            }
            else{
                $status=Attendence::insert([
                    "staff_id"=> $key,
                    "date"=> $req->date,
                    "status"=> "absent"
                ]); 
            }
        }
        if($status){
            return redirect('/home')->with('alert','Attendece taken successfully');
        }
    }

    public function attendencelist(Request $req){
        $data = DB::table('attendences')
                ->join('staffs','attendences.staff_id','=','staffs.id')
                ->select('staffs.name','staffs.id','attendences.date','attendences.status')
                ->where('attendences.date','=',$req->date)->paginate(10);
        //dd($data);
        return view('auth.attendencelist',compact('data'));
    }
}
