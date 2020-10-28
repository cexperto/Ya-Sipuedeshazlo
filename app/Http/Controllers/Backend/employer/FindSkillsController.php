<?php

namespace App\Http\Controllers\Backend\employer;
use App\User;
use App\Http\Controllers\Controller;
use App\Skill;
use Illuminate\Http\Request;

class FindSkillsController extends Controller
{
    public function view(){
        $skills = Skill::latest()->get();
        //return $skills;
        return view('employer/skills.homeSkill',compact('skills'));        
    }
    public function buscador(Request $request){
        $skills    =   Skill::where("name",'like',$request->texto."%")->take(10)->get();
        return view("employer.skills.skills",compact("skills"));        
    }
    public function detaill(Request $request){
        $id= $request->input('id');
        $idSkill= $request->input('skill');
        $skills = Skill::where('id','=',$idSkill)->get();
        $users = User::where('id','=',$id)->get();
        //return $users;
        return view('employer/skills.detaill', compact('users','skills'));

    }
}
