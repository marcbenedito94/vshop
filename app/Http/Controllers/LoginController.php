<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller {
  private $exist_this_user_name = false;
  private $user_in_bbdd = [];

  public function getUser(Request $request) {
    $user = new User;
    $user->userEmail = $request->userEmail;

    if ($user) {
      $this->user_in_bbdd = User::where('email', $user)->select('email')->get();
      // if (count($user_in_bbdd) > 0) {
        return view ('/login', compact('user_in_bbdd'));
      // } else {
        // return redirect ('/aboutUs');
      // }
    } else {
      return redirect ('/aboutUs');
    }
  }
}
