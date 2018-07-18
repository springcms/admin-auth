<?php

namespace SpringCms\AdminAuth\App\Http\Controllers;

use Illuminate\Http\Request;
use SpringCms\AdminAuth\App\Http\SpringAdminBaseController;
use SpringCms\AdminAuth\Models\Admin;
use Validator;

class UsersManagementController extends SpringAdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::orderBy('id', 'desc')->paginate(20);
        $data = [
            'users' => $users
        ];
        return view('adminspringcms::usersmanagement.show-users',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminspringcms::usersmanagement.create-users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                  => 'required|string|max:150',
            'username'                 => 'required|string|max:20|unique:admins',
            'password'              => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|string|same:password',
        ];
        $messages = [
            'username.unique'         => trans('adminspringcms::springusersmanagement.messages.userNameTaken'),
            'username.required'       => trans('adminspringcms::springusersmanagement.messages.userNameRequired'),
            'name.required'       => trans('adminspringcms::springusersmanagement.messages.userNameRequired'),          
            'password.required'   => trans('adminspringcms::springusersmanagement.messages.passwordRequired'),
            'password.min'        => trans('adminspringcms::springusersmanagement.messages.PasswordMin'),
            'password.max'        => trans('adminspringcms::springusersmanagement.messages.PasswordMax'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {            
            return back()->withErrors($validator)->withInput();
        }
        $user = Admin::create([
            'name'    => $request->input('name'),
            'username'=> $request->input('username'),
            'password'=> bcrypt($request->input('password')),
        ]);
        $user->save();

        return redirect('/admin/users')->with('success', trans('adminspringcms::springusersmanagement.messages.user-creation-success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $data = [
            'user'=> $user,
        ];
        return view('adminspringcms::usersmanagement.edit-users')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $rules = [
            'name'                  => 'required|string|max:255',
            'username'                 => 'required|string|max:255|unique:admins',
            
        ];
        $messages = [
            'username.unique'         => trans('adminspringcms::springusersmanagement.messages.userNameTaken'),
            'username.required'       => trans('adminspringcms::springusersmanagement.messages.userNameRequired'),
            'name.required'       => trans('adminspringcms::springusersmanagement.messages.userNameRequired'),
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {            
            return back()->withErrors($validator)->withInput();
        }
        $user = Admin::findOrFail($id);         
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->save();
        return redirect('/admin/users')->with('success', trans('adminspringcms::springusersmanagement.messages.user-creation-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $user = Admin::findOrFail($id); 
        $user->delete();
        return redirect('/admin/users')->with('success', trans('adminspringcms::springusersmanagement.messages.user-creation-success'));
    }
}
