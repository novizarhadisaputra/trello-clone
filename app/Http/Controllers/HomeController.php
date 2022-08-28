<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $card;

    public function __construct()
    {
        $this->card = new Card();
    }

    public function index(Request $req)
    {
        $cards = $this->card->all();
        return view('pages.home.index', compact('cards'));
    }
}
