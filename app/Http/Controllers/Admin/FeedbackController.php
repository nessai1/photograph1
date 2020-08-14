<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feedback;
use Illuminate\Support\Facades\File;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = \DB::table('feedback')->get();
        return view('admin.newfeedback',['feedbacks'=>$feedbacks]);
    }


    public function addItem(Request $request)
    {

        // validate
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'maintext' => 'required',
            'image' => 'mimes:jpg,png,jpeg|dimensions:max_width=1000,max_height=1000,min_width=400,min_height=400'
            // ,width/height=1 /// add late
        ]);




        // create item
        $feedback = new Feedback();
        $feedback->title = $request->get('title');
        $feedback->maintext = $request->get('maintext');
        $feedback->date = $request->get('date');
        $feedback->photolink = '-';
        $feedback->service = $request->get('service');
        $feedback->save();

        // if admin upload file
        if ($request->hasFile('image'))
        {
            // get feedbackID and create photoPath via ID
            $savepath = 'app/public/images/feedback/';
            $savepath .= $feedback->id;
            $savepath .= '.jpg';


            // Edit image
            $image = $request->file('image');
            \Image::make($image)->resize(400,null,function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path($savepath));
        }
        else
        {
            $savepath = 'app/public/images/feedback/';
            $savepath .= 0;
            $savepath .= '.jpg';
        }

        // set photo path
        $feedback->photolink = $savepath;
        $feedback->save();

        return back()->with('message', 'Post successful added');
    }

    public function delete($id) {
        // delete user with ID = $id
        \DB::delete('delete from feedback where id = ?',[$id]);

        // delete file with name ($id + '.jpg')
        File::delete(storage_path("app/public/images/feedback/".$id.'.jpg'));
        return back()->with('message', 'Post deleted');
    }

}
