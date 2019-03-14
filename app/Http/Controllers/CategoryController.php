<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Notification;
use App\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\usernotify;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('category.addcategory');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = Category::create([
            'name' => $request->input('name')  
        ]);

        if($category)
        {
            $user = User::whereNotIn('id', [Auth::user()->id])->get();
            //$user = User::get();

            $user_name = Auth::user()->name;
            $details = [
                'user_name' => $user_name,
                'category_id' => $category->id,
                'category' => $request->input('name'),
                'msg' => $user_name.' Create '.$request->input('name').' Category.'  
            ];

            
            Notification::send($user, new usernotify($details));
       
            return redirect('home')->with('success','category Added Successfully...');
        }

        return back()->withInput()->with('errors','Error create new category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $user = Auth::user();
        $notification  = count($user->notifications);

        $category = Category::find($category->id);
        //dd($category);
        return view('editCategory',compact('user','category','notification',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $cate = Category::where('id',$category->id)->update([
            'name' => $request->input('name')  
        ]);

        $user = User::whereNotIn('id', [Auth::user()->id])->get();
        $user_name = Auth::user()->name;
        $details = [
            'user_name' => $user_name,
            'category_id' => $category->id,
            'category' => $request->input('name'),
            'msg' => $user_name.' updated '.$request->input('name').' Category.'
        ];
            
        Notification::send($user, new usernotify($details));
       
        return redirect('home')->with('success','category Added Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
