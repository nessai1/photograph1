<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $image = \Storage::disk('public')->url('images/mainpage.jpg');
        $title = Page::byAlias('maintitle')->content;
        return view('admin.index', ['title'=> $title, 'image'=>$image]);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
           'title' => 'required',
           'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=1920,min_height=1020|max:10500000' //
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            \Image::make($image)->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/images/mainpage.jpg'));
        }


        $maintitle = Page::byAlias('maintitle');
        $maintitle->content = $request->get('title');
        $maintitle->save();

        return back()->with('message', 'Page updated');
    }

}
