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

        $business->name = $request->input('name');//done
        $business->hosted_by = $request->input('hosted_by');//done
        $business->hostname = $request->input('hostname');//done
        $business->category = $request->input('category');//done
        $business->location = $request->input('location');//done
        $business->phone_num = $request->input('phone_num');//done
        $business->photo_url = $request->input('photo_url');//done
        $business->price_adults = $request->input('price_adults');//done
        $business->price_kids = $request->input('price_kids');//done
        $business->description = $request->input('description');//done
        $business->wifi = $request->input('wifi');//done
        $business->toilets = $request->input('toilets');//done
        $business->water = $request->input('water');//done
        $business->parking = $request->input('parking');//done
        $business->fire = $request->input('fire');//done
        $business->shower = $request->input('shower');//done
        $business->lessons = $request->input('lessons');//done
        $business->location_coordinate = $request->input('location_coordinate');//done
        $business->lessons_details = $request->input('lessons_details');//done

        $business->save();

        echo $business;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function getBusinessByOwner($userid)
    {
        $business = Business::where('hosted_by' , $userid)->get();

        return $business ;
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
    public function destroy($id)
    {
        $business = Business::find($id)->delete();

        return response(['message' => 'Business deleted']);
    }
}
