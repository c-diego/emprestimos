<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Handle an authentication attempt.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return Response
   */
  public function authenticate(LoginRequest $loginRequest)
  {
    $validated = $loginRequest->validated();

    if (Auth::attempt($validated))
      return redirect()->intended(route('home'));
    return redirect()->intended(route('formLogin'))->withErrors('Login inválido.');
  }

  public function formLogin()
  {
    return view('login');
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->intended(route('login'));
  }
}
