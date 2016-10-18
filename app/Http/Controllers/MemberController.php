<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use App\Member;
use Storage;


class MemberController extends Controller
{
    public function index()
    {
        $members = Member::All();
        return response()->json([
            'data' => $members,
            'message' => 'Get all members success',
            'status' => true
        ]);
    }

    public function store(Request $request)
    {
        $member = new Member();
        
        if($request->hasFile('photo')){

            $member->name = $request->name;
            $member->address = $request->address;
            $member->age= $request->age;
            $image = $request->file('photo');
            $image_size = File::size($image);
          //  return $image_size;
            $file_name = rand(1000,10000).'-'.$image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $array = ['jpg','png','gif'];
            $location = public_path('images/');
            if(in_array($ext,$array)){
                $member->photo = 'public/images/'.$file_name;
                $member->save();
                $image->move($location, $file_name);
                return response()->json([
                        'status' => true,
                        'data' => $member,
                        'message' => 'add member success'
                    ]);
                
            }
            else{
                return response()->json([
                        'status' => false,
                        'message' => 'Photo format wrong.'
                           
                ]);
            }
            if($image_size <= 10000000){
                $member->photo = 'public/images/'.$file_name;
                $member->save();
                $image->move($location, $file_name);
                return response()->json([
                        'status' => true,
                        'data' => $member,
                        'message' => 'add member success'
                    ]);
                
            }
            else{
                return response()->json([
                        'status' => false,
                        'message' => 'Image is too large.Only 10 MB was allowed.'
                           
                ]);
            }

        }
        else{
            $member->name = $request->name;
            $member->address = $request->address;
            $member->age= $request->age;
            $member->save();
            return response()->json([
                'data' => $member,
                'message' => 'add member success but not photo'
            ]);
        }


    }

    public function show(Request $request, $id)
    {
        $member = Member::find($id);
        return response()->json([
            'data' => $member,
            'message' => 'Information of member'
        ]);
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);

            $member->name = $request->name;
            $member->address = $request->address;
            $member->age = $request->age;
        if($request->photo1){
            
            $member->photo = $request->photo1;
            $member->save();
        }else{
            
            $member->save();
        }

        return response()->json([
            'data' => $member,
            'message' => 'Update member successfully'
        ]);
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return response()->json([
            'data' => $member,
            'message' => 'remove member success'
        ]);
        
    }

    public function uploadImg(Request $request)
    {
         if($request->hasFile('photo1')){
            $image = $request->file('photo1');
            $file_name = rand(1000,10000).'-'.$image->getClientOriginalName();//
            $ext = $image->getClientOriginalExtension();
            $array = ['jpg','png','gif'];
            $location = public_path('images/');

            if(in_array($ext,$array)){
                
                
                $image->move($location, $file_name);
                $path = 'public/images/'.$file_name;
                return response()->json([
                    'status' => true,
                    'data' => $path,
                    'message' => 'upload image success'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Photo format wrong !'
                ]);
            }
        }
    }
}
