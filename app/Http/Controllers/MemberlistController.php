<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberlistController extends Controller
{
    public function wing_a_member(){
        $data = Member::where('house_no','like','A%')->paginate(5);
      
        return view('auth.memberdictionary',compact('data'));
    }
    public function wing_b_member(){
        $data = Member::where('house_no','like','B%')->paginate(5);
        return view('auth.memberdictionary',compact('data'));
    }
    public function wing_c_member(){
        $data = Member::where('house_no','like','C%')->paginate(5);
        return view('auth.memberdictionary',compact('data'));
    }
    public function wing_d_member(){
        $data = Member::where('house_no','like','D%')->paginate(5);
        return view('auth.memberdictionary',compact('data'));
    }

    public function addmember(Request $request){
        $request->validate([
            'name' => 'required | string',
            'mobile' => 'required | max:10',
            'email' => 'required | email',
            'flat' => 'required'
        ]);

        $data = Member::insert([
            'name' =>$request->name,
            'mobile' => $request->mobile,
            'email' => $request->email, 
            'house_no' => $request->flat
        ]);

        if($data){
            return redirect('/member');
        }
    }

    public function deletemember(Request $req){
        $data = $req->wing;
        $member=Member::where('house_no','like', '%'.$data.'%')->get();
        return view('auth.memberdelete',compact('member'));
    }

    public function delete(Request $req){
        $data = Member::where('id','=',$req->id)->delete();
        return redirect('/member');
    }
}
