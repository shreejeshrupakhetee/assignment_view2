<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BackendBaseController
{
    protected $route ='user.';
    protected $panel ='User';
    protected $view ='backend.user.';
    protected $title;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->title= 'List';
        $data['row']=User::all();

        return view($this->__loadDataToView($this->view . 'index'),compact('data'));
    }

    public function show($id)
    {

        $this->title= 'View';
        $data['row']=User::findOrFail($id);
        return view($this->__loadDataToView($this->view . 'view'),compact('data'));
    }



}
