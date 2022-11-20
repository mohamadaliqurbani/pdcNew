<?php

namespace App\Http\Controllers;

use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SlugController extends Controller
{
    public function index(){
        $slugs=Slug::all();
        // $string="  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore atque sint non aperiam, odio iusto perferendis distinctio facilis, ipsa labore quidem voluptatibus placeat, nemo ea ipsam amet et doloribus saepe.";
        // dd(substr($string,0,90));
        return view('slug',compact('slugs','string'));
    }

    public function create(){
        return view('slugCreate');
    }

    public function store(Request $request){
        // dd();
        $slug =  new Slug();
        $slug->title=$request->title;
        $slug->desc=$request->desc;
        $slug->slug=str_replace(' ','-',$request->title);
        // $slug->slug= Str::slug($request->title,'-');
        // dd(str_ireplace($request->title,'-',0,strlen($request->title)))
        $slug->save();
    }
    public function show(Slug $id){

    }
}
