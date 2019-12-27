<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Manager;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->query('title');
        if ($searchTerm) {
            return Shop::search($searchTerm);
        } else {
            return Shop::all();
        }
        // $shops = Shop::with('manager')->latest()->paginate(10);
        // $searchTerm = $request->query('title');
        // if ($searchTerm) {
        //     return Shop::search($searchTerm);

        // } else {
        //     return Shop::all();
        // }
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
    public function store(ShopRequest $request)
    {
        // $data = $request->all();
        // $shop = new Shop();
        // $shop->title = $data['title'];
        // $shop->photo = $data['photo'];
        // $shop->manger_id = $data['manager_id'];
        // $shop->save();

        // return Shop::create($data);

        $shop = Shop::create([

            'title' => $request->title,
            'photo' => $request->photo,
            'manager_id' => $request->manager_id,

        ]);
        //uzimanje shop id i dodeljivanje manageru
        if ($request->manager_id !== null) {
            $manager = Manager::find($request->manager_id);
            $manager->shop_id = $shop->id;
            $manager->save();
        }
        return $shop;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shop::findOrFail($id);
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
        $shop = Shop::find($id);
        $shop->update($request->all());

        return $shop;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
    }
}
