<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use Uploadable;
    public function index()
    {
        $offers = Offer::all();

        return view('dashboard.offers.index', compact('offers'));
    }

   public function create()
    {
        //
    }

    public function store(StoreOfferRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'offers', null, null);
            $data['image'] = $path;
        }

        Offer::create($data);

        return back()->with('success', trans('dashboard.offer.created successfully'));
    }

    public function show(Offer $offer)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            if (file_exists(public_path('assets/uploads/offers/' . $offer->image))) {
                unlink( public_path('assets/uploads/offers/' . $offer->image) );
            }
            $path = $this->uploadOne($request['image'], 'offers', null, null);
            $data['image'] = $path;
        }

        $offer->update($data);

        return back()->with('success', trans('dashboard.offer.updated successfully'));
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return back()->with('success', trans('dashboard.offer.deleted successfully'));
    }
}
