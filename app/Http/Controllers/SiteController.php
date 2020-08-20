<?php

namespace App\Exceptions;
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Page;
use Exception;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{


    public function index()
    {
        $vk = Page::byAlias('vk');
        $inst = Page::byAlias('inst');
        $image = \Storage::disk('public')->url('images/mainpage.jpg');
        $image_blur = \Storage::disk('public')->url('images/mainpage_blur.jpg');
        $title = Page::byAlias('maintitle')->content;

        $sitename = $title;
        return view('mainpage',['title'=>$title, 'vk'=>$vk->content, 'inst'=>$inst->content, 'image'=>$image,'image_blur'=>$image_blur,'sitename'=>$sitename]);
    }

    public function about()
    {
        $sitename = "About";

        $name = Page::byAlias('maintitle')->content;
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
            'vk'=>$vk->content, 'inst'=>$inst->content, 'email'=>$email->content, 'image'=>$image, 'feedbacks'=>$feedbacks, 'photograph'=>$name, 'sitename'=>$sitename]);
    }

    public function portfolio()
    {
        $sitename = "Portfolio";
        $name = Page::byAlias('maintitle')->content;
        $vk = Page::ByAlias('vk')->content;
        $inst = Page::ByAlias('inst')->content;
        $sets = \DB::table('photosets')->get();
        $photopath = \Storage::disk('public')->url("images/posts/");
        foreach ($sets as $set) {

            if (strlen($set->desc) > 130) {
                $set->desc = substr($set->desc, 0,130);
                $set->desc .= '...';
            }
        }
        return view('portfolio',['sets'=>$sets, 'photopath'=>$photopath, 'photograph'=>$name, 'inst'=>$inst, 'vk'=>$vk,'sitename'=>$sitename]);
    }

    public function services()
    {
        $sitename = "Services";
        $name = Page::byAlias('maintitle')->content;
        $vk = Page::ByAlias('vk')->content;
        $inst = Page::ByAlias('inst')->content;
        $services = \DB::table('services')->get();

        foreach ($services as $service)
        {
            if ($service->photo == 1)
                $service->photolink = \Storage::disk('public')->url("images/services/$service->id.jpg");
        }
        return view('services', ['services'=>$services,'photograph'=>$name, 'inst'=>$inst, 'vk'=>$vk,'sitename'=>$sitename]);
    }

    public function work($id)
    {
        $name = Page::byAlias('maintitle')->content;

        $vk = Page::ByAlias('vk')->content;
        $inst = Page::ByAlias('inst')->content;
        $info = \DB::table('photosets')->where('id',$id)->get();

        if (!count($info))
            abort(404);
        $sitename = $info[0]->title;
        //dd($info[0]);

        $path = \Storage::disk('public')->url("images/posts/$id/");

        return view('newset',['path' => $path, 'info'=> $info[0],'photograph'=>$name, 'inst'=>$inst, 'vk'=>$vk,'sitename'=>$sitename]);
    }

}
