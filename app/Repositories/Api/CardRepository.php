<?php

namespace App\Repositories\Api;

use App\Models\Card;

class CardRepository
{
    protected $card;

    public function __construct()
    {
        $this->card = new Card();
    }

    public function index($request)
    {
        $cards = $this->card->paginate();
        return $cards;
    }
}
