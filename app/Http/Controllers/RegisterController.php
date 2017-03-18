<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterationForm;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registeration.create');
    }

    public function store(RegisterationForm $form)
    {
        $form->persist();

        session()->flash('message', 'Thanks so much for signing up!');

        return redirect()->home();
    }
}
