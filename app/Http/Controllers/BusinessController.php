<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessResource;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function list() {
        $data = Business::all();
        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addbusiness(Request $request)
    {
        $business = new Business;

        $business->name = $request->input('name');
        $business->hosted_by = $request->input('hosted_by');
        $business->hostname = $request->input('hostname');
        $business->category = $request->input('category');
        $business->location = $request->input('location');
        $business->location_coordinate = $request->input('location_coordinate');
        $business->price_adults = $request->input('price_adults');
        $business->price_kids = $request->input('price_kids');
        $business->description = $request->input('description');
        $business->lessons = $request->input('lessons');
        $business->wifi = $request->input('wifi');
        $business->toilets = $request->input('toilets');
        $business->water = $request->input('water');
        $business->parking = $request->input('parking');
        $business->fire = $request->input('fire');
        $business->shower = $request->input('shower');
        $business->lessons = $request->input('lessons');
        $business->location_coordinate = $request->input('location_coordinate');
        $business->lessons_details = $request->input('lessons_details');

        $business->save();

        echo $business;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {

        $business->update($request->all());

        return response([ 'business' => new
        BusinessResource($business), 'message' => 'Success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();

        return response(['message' => 'Employee deleted']);
    }
}
