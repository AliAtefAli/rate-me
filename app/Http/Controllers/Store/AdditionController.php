<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdditionRequest;
use App\Http\Requests\UpdateAdditionRequest;
use App\Models\Addition;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class AdditionController extends Controller
{

    use Uploadable;
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreAdditionRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'additions', null, null);
            $data['image'] = $path;
        }
        Addition::create($data);

        return back()->with('success', trans('dashboard.addition.created successfully'));
    }


    public function show(Addition $addition)
    {
        return view('store.additions.show', compact('addition'));
    }


    public function edit($id)
    {
        //
    }


    public function update(UpdateAdditionRequest $request, Addition $addition)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            if (file_exists(public_path('assets/uploads/additions/' . $addition->image))) {
                unlink(public_path('assets/uploads/additions/' . $addition->image));
            }
            $path = $this->uploadOne($request['image'], 'additions', null, null);
            $data['image'] = $path;
        }
        $addition->update($data);

        return back()->with('success', trans('dashboard.addition.updated successfully'));
    }


    public function destroy(Addition $addition)
    {
        $addition->delete();

        return back()->with('success', trans('dashboard.addition.deleted successfully'));
    }
}
