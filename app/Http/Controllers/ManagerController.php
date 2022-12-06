<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{


  public function solicitations()
  {
    $solicitations = [];
    $allSolicitations = Loan::where('situation', 'Pendente')->get();
    foreach ($allSolicitations as $solicitation) {
      if ($solicitation->item->sector->id == Auth::user()->id)
        array_push($solicitations, $solicitation);
    }

    return view('manager.solicitations', ['solicitations' => $solicitations]);
  }

  public function approveSolicitation(Loan $loan)
  {
    $loan->situation = 'Aprovado';
    $loan->save();
    return redirect()->intended(route('manager.solicitations'));
  }


  public function denySolicitation(Loan $loan)
  {
    $loan->situation = 'Negado';
    $loan->save();
    return redirect()->intended(route('manager.solicitations'));
  }

}
