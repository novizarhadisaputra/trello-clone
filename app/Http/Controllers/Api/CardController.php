<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCardRequest;
use App\Http\Transformers\CardTransformer;
use App\Http\Transformers\ResponseTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CardController extends Controller
{
    protected $card;

    public function __construct()
    {
        $this->card = app()->make('repo.api.card');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $response = $this->card->index($request);
            if ($response instanceof MessageBag) {
                return (new ResponseTransformer)->json(400, $response);
            }
            return (new CardTransformer)->all($response);
        } catch (Exception $e) {
            return (new ResponseTransformer)->json(400, $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCardRequest $request)
    {
        try {
            $response = $this->card->index($request);
            if ($response instanceof MessageBag) {
                return (new ResponseTransformer)->json(400, $response);
            }
            return (new CardTransformer)->all($response);
        } catch (Exception $e) {
            return (new ResponseTransformer)->json(400, $e->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
