<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Complaint;
class ComplaintController extends Controller
{
    public function admincomplaintpanel()
    {
        $data = Complaint::orderBy('id','DESC')->paginate(5);
        return view('auth.Complaintbox',compact('data'));
    }

    public function usercomplaintpanel()
    {
        $data = Complaint::orderBy('id','DESC')->paginate(5);
        return view('User.Complaintbox',compact('data'));
    }

    public function useraddcomplaint(Request $req){
        $complaint=Complaint::create([
            "name"=> $req->name,
            "mobile"=>$req->mobile,
            "type" => $req->type,
            "complaints" => $req->Complaint
        ]);
        if($complaint==true){
            return redirect('/home');
        }
    }

    public function updatestatus(Request $req){
        $data= $req->id;
        $update = Complaint::where('id','=',$req->id)
                            ->update([
                                'status'=> 'In Progress'
                            ]);
        if($update == true){
            return redirect('/adminComplaintbox');
        }
    }

    public function deletestatus(Request $req){
        $data= $req->id;
        $update = Complaint::where('id','=',$req->id)
                            ->update([
                                'status'=> 'Close'
                            ]);
        if($update == true){
            return redirect('/adminComplaintbox');
        }
    }

    public function totalcomplaint(){
        $data = Complaint::count("id");
        $new = Complaint::where('status','=','Submited')->count();  
        $pending = Complaint::where('status','=','In Progress')->count(); 
        $close = Complaint::where('status','=','Close')->count(); 
        return view('auth.Complaintstatus',compact('data','new','pending','close'));
    }
}
