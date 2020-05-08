<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Offer;
//use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
    return view('offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('offers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $file = $request->file('photo');

        $file_name = time() . $file->getClientOriginalName();
        $file->move('images/offers', $file_name);

        $input = $request->all();
        $input['photo'] = $file_name;

        Offer::create($input);

        return redirect()->back()->with(['success' =>__('global.success')]);
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
        $offer = Offer::find($id);
        return view('offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {

        $offer = Offer::find($id);

        if ($fil = $request->file('photo')){

            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/offers', $file_name);
            $input['photo'] = $file_name;
        }



        $input = $request->all();


        $offer->update($input);

        return redirect()->back()->with(['success' =>__('global.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->back();
    }
}
