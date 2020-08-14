<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\service;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    public function index()
    {
        $services = \DB::table('services')->get();

        return view('admin.newsection', ['services'=>$services]);
    }

    public function addItem(Request $request)
    {
        //dd($request);

        $this->validate($request, [
           'title' => 'required',
           'maintext' => 'required',
           'secondtext' => 'required',
           'image' => 'mimes:jpg,png,jpeg|dimensions:max_width=2000,max_height=2000'
        ]);

        $service = new service();
        $service->title = $request->get('title');
        $service->maintext = $request->get('maintext');
        $service->secondtext = $request->get('secondtext');
        if ($request->get('price'))
            $service->price = $request->get('price');
        else
            $service->price = 'null';

        $service->photo = 0;
        $service->save();

        if ($request->hasFile('image'))
        {
            $service->photo = 1;

            $savepath = 'app/public/images/services/';
            $savepath .= $service->id;
            $savepath .= '.jpg';

            $image = $request->file('image');

            \Image::make($image)->resize(500,null,function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path($savepath));
        }
        else
        {
            $service->photo = 0;
        }

        $service->save();
        return back()->with('message','Serivce successful added');

    }

    public function delete($id){
        \DB::delete('delete from services where id = ?', [$id]);
        File::delete(storage_path("app/public/images/services/".$id.'.jpg'));
        return back()->with('message', 'Service successful deleted');
    }
}
