<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Auth;

class SubscribeController extends Controller
{
    public function submit(){
        $email=request()->email;
        $parent=\App\User::where('referral_code',request()->referral_code)->where('email','!=',$email)->first();
        $old_user=\App\User::where('email',$email)->first();
        if($parent && $old_user){
//            $user= \App\User::create(['email'=>$email,'parent_id'=>$parent->id,'referral_code'=>$this->random_strings(8),'password'=>bcrypt('password')]);
       Auth::login($old_user);
            return redirect()->route('profile');
        }elseif($parent && !$old_user){
            $user= \App\User::create(['email'=>$email,'parent_id'=>$parent->id,'referral_code'=>$this->random_strings(8),'password'=>bcrypt('password')]);
            Auth::login($user);
            return redirect()->route('profile');
        }elseif ($old_user){
            Auth::login($old_user);
            return redirect()->route('profile');
        }else{
            $user= \App\User::create(['email'=>$email,'referral_code'=>$this->random_strings(8),'password'=>bcrypt('password')]);
            Auth::login($user);
            return redirect()->route('profile');
        }

    }

    public function profile(){

        if (Auth::check()){

              $waiting_list=\App\User::has('children', '<', 3)->withCount('children')->orderBy('children_count', 'desc')
                ->orderBy('created_at','asc')->get();
            $accepted_count=\App\User::has('children', '>=', 3)->count();
            $userIndex = $waiting_list->search(function($user) {
                return $user->id === Auth::id();
            });
            $position =$userIndex+$accepted_count;
            return view('page2',compact('position'));
        }else{
            return redirect()->route('landing');
        }
    }

    public function landing(){
        $referral_code='';
        $waiting_list=\App\User::has('children', '<', 3)->count();
        if (request()->referral_code!==''){
            $referral_code=request()->referral_code;
        }else{
            $referral_code='';
        }

        if (!Auth::check()){

            return view('page1',compact('referral_code','waiting_list'));
        }else{
            return redirect()->route('profile');
        }
    }

    public function random_strings($length_of_string)
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }
}
