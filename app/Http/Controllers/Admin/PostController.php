<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\photoset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function index()
    {
        $posts = \DB::table('photosets')->get();
        return view('admin.newpost',['posts' => $posts]);
    }

    public function addItem(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required'
        ]);


        $photos = $request->file('images');
        if ($photos == null)
            return redirect("/apanel/newpost")->withErrors(['Images are required']);


        $i = 0;
        foreach ($photos as $photo)
        {
            if (!$this->validateType($photo->getClientOriginalName()))
            {
                return redirect("/apanel/newpost")->withErrors(['Required image format: jpg, jpeg, png']);
            }
            $i++;
        }

        $pset = new photoset();
        $pset->title = $request->get('title');
        $pset->desc = $request->get('desc');
        $request->get('service') == null ? $pset->service = 'null' : $pset->service = $request->get('service');
        $pset->size = $i;
        $pset->save();

        $folderpath = 'app/public/images/posts/';
        $folderpath .= $pset->id;
        File::makeDirectory(storage_path($folderpath));
        $folderpath .= '/';

        $i = 0;

        foreach ($photos as $photo)
        {
            $path = $folderpath.$i;
            //$path .= '.jpg';

            \Image::make($photo)->resize(null,350,function ($constraint) {
               $constraint->aspectRatio();
            })->save(storage_path($path.'.jpg'));
            \Image::make($photo)->save(storage_path($path.'f.jpg'));
            $i++;
        }


        return back()->with('message','Post successful added');

    }


    public function delete($id){
        File::deleteDirectory(storage_path("app/public/images/posts/$id"));
        \DB::delete('delete from photosets where id = ?', [$id]);
        return back()->with('message','Photoset successful deleted');
    }


    private function validateType ($inLine)
    {
        $rs = false;
        $temp = ['.jpg', '.png', '.jpeg'];

        for ($i = 0; $i < count($temp); $i++) {
            if (substr($inLine,strlen($inLine)-strlen($temp[$i]),strlen($temp[$i])) == $temp[$i])
            {
                $rs = true;
                break;
            }
        }

        return $rs;
    }
}
