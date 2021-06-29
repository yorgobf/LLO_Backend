<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addReservation(Request $request)
    {
        $reservation = new Reservation;

        $reservation->user_id = $request->input('userId');
        $reservation->username = $request->input('username');
        $reservation->business_id = $request->input('businessId');
        $reservation->businessname = $request->input('businessName');
        $reservation->number_adults = $request->input('number_adults');
        $reservation->number_kids = $request->input('number_kids');
        $reservation->date = $request->input('date');

        $reservation->save();

        echo $reservation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation,$id)
    {
        $reservation=Reservation::where('business_id' , $id)->get();

        return $reservation ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
