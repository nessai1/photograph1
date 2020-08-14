<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class SiteController extends Controller
{
    public function index()
    {

        $vk = Page::byAlias('vk');
        $inst = Page::byAlias('inst');
        $image = \Storage::disk('public')->url('images/mainpage.jpg');
        $title = Page::byAlias('maintitle')->content;
        return view('mainpage',['title'=>$title, 'vk'=>$vk->content, 'inst'=>$inst->content, 'image'=>$image]);
    }

    public function about()
    {
        $title = Page::ByAlias('title');
        $desc = Page::ByAlias('desc');
        $phone = Page::ByAlias('phone');
        $vk = Page::ByAlias('vk');
        $inst = Page::ByAlias('inst');
        $email = Page::ByAlias('email');
        $image = \Storage::disk('public')->url('images/author.jpg');
        $feedbacks = \DB::table('feedback')->get();
        foreach ($feedbacks as $feedback)
        {
            $feedback->photolink = \Storage::disk('public')->url(substr($feedback->photolink,11,
            strlen($feedback->photolink)));
        }
        return view('about', ['title'=>$title->content, 'desc'=>$desc->content, 'phone'=>$phone->content,
            'vk'=>$vk->content, 'inst'=>$inst->content, 'email'=>$email->content, 'image'=>$image, 'feedbacks'=>$feedbacks]);
    }

    public function portfolio()
    {
        $sets = \DB::table('photosets')->get();
        $photopath = \Storage::disk('public')->url("images/posts/");
        return view('portfolio',['sets'=>$sets, 'photopath'=>$photopath]);
    }

    public function services()
    {
        $services = \DB::table('services')->get();

        foreach ($services as $service)
        {
            if ($service->photo == 1)
                $service->photolink = \Storage::disk('public')->url("images/services/$service->id.jpg");
        }
        return view('services', ['services'=>$services]);
    }

    public function work($id)
    {
        $info = \DB::table('photosets')->where('id',$id)->get();
        //dd($info[0]);
        $path = \Storage::disk('public')->url("images/posts/$id/");

        return view('photoset',['path' => $path, 'info'=> $info[0]]);
    }

}
