<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $title = Page::ByAlias('title');
        $desc = Page::ByAlias('desc');
        $phone = Page::ByAlias('phone');
        $vk = Page::ByAlias('vk');
        $inst = Page::ByAlias('inst');
        $email = Page::ByAlias('email');

        $image = \Storage::disk('public')->url('images/author.jpg');

        return view('admin.about', ['title'=>$title->content, 'desc'=>$desc->content, 'phone'=>$phone->content,
            'vk'=>$vk->content, 'inst'=>$inst->content, 'email'=>$email->content, 'image'=> $image]);
    }

    public function saveabout(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'inst' => 'required',
            'vk' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=660,min_height=661'
        ]);

        // image work
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            \Image::make($image)->resize(null, 662, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/images/author.jpg'));
        }




//        $image = $request->file('image')->storePublicly('public/images/about');
//        $image = \Image::make($image);
//        $image->resize(662, null, function ($constraint) {
//            $constraint->aspectRatio();
//        });
//        $image->save(storage_path('public/images/about'));





        $title = Page::byAlias('title');
        $title->content = $request->get('title');
        $title->save();
        $desc = Page::byAlias('desc');
        $desc->content = $request->get('desc');
        $desc->save();
        $inst = Page::byAlias('inst');
        $inst->content = $request->get('inst');
        $inst->save();
        $vk = Page::byAlias('vk');
        $vk->content = $request->get('vk');
        $vk->save();
        $email = Page::byAlias('email');
        $email->content = $request->get('email');
        $email->save();
        $phone = Page::byAlias('phone');
        $phone->content = $request->get('phone');
        $phone->save();
        return back()->with('message', 'Page updated');

    }
}
