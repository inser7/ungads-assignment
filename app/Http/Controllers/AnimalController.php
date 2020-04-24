<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Animal;
use App\Http\Requests\AnimalRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Animal::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        $image = $request->get('image');
        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('image'))->save(public_path('images/').$name);

        $request->picture_path = $name;

        if ($request->validated()) {
            $animal = new Animal();
            $animal->name = $request->get('name');
            $animal->type = $request->get('type');
            $animal->nick = $request->get('nick');
            $animal->picture_path = $name;
            $animal->save();
            return response($animal->jsonSerialize(), Response::HTTP_CREATED);
        } else {
            return response(null, Response::HTTP_BAD_REQUEST);
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
        return response(Animal::findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AnimalRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->fill($request->except(['id']));
        $animal->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animal::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}
