<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Http\Requests\EditCardRequest;
use App\Models\Card;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class CardController extends Controller
{
    protected $card;

    public function __construct()
    {
        $this->card = new Card();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            DB::beginTransaction();
            $this->card->create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
            ]);
            DB::commit();
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back();
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
    public function update(EditCardRequest $request, $id)
    {
        $card = $this->card->find($id);
        if (!$card) {
            return (new MessageBag())->add('card_id', 'Not Found');
        }

        try {
            DB::beginTransaction();
            $this->card->where('id', $id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
            ]);
            DB::commit();
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = $this->card->find($id);
        if (!$card) {
            return (new MessageBag())->add('card_id', 'Not Found');
        }

        try {
            DB::beginTransaction();
            $this->card->where('id', $id)->delete();
            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
