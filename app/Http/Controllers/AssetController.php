<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetDetail;

class AssetController extends Controller
{
    public function index(){
        $assets = AssetDetail::all();//fetch all records from Assetdetail Model
        return view('ManageLabAsset.LabAsset', ['assets' => $assets]);
    }

    public function create(){
        return view('ManageLabAsset.CreateLabAsset');
    }

    public function store(Request $request){

        $request->validate([
            'lab_name'=>'required|string',
            'asset_name'=>'required|string',
            'asset_status'=>'required|string',
            'quantity'=>'required|numeric',
        ]);

        $assetDetails = new AssetDetail();
        $assetDetails->lab_name = $request -> input('lab_name');
        $assetDetails->asset_name = $request->input('asset_name');
        $assetDetails->asset_status =  $request->input('asset_status');
        $assetDetails->quantity =  $request->input('quantity');

        $assetDetails->save();

        return redirect(route('ManageLabAsset.LabAsset'));
    }

    public function edit(AssetDetail $assetDetails){

        $asset = AssetDetail::find($assetDetails->id);

        return view('ManageLabAsset.UpdateLabAsset', ['assetDetail' => $asset]);
    }

    public function update(Request $request, $assetDetails)
    {
    $request->validate([
        'lab_name'=>'required|string',
        'asset_status'=>'required|string',
    ]);

    $assetDetails = AssetDetail::find($assetDetails);
    $assetDetails->lab_name = $request->input('lab_name');
    $assetDetails->asset_status = $request->input('asset_status');
    $assetDetails->save();

    return redirect()->route('ManageLabAsset.ViewLabAssetTech');
    }

    public function destroy(AssetDetail $asset)
    {
        $asset->delete();

    return redirect()->route('ManageLabAsset.LabAsset');
    }

    public function search(Request $request){

        $search = $request->input('search');

        $assets = AssetDetail::when($search, function($query, $search) {
            return $query->where('asset_name', 'like', '%' . $search . '%');
        })->get();

        return view('ManageLabAsset.SearchAsset', ['assets' => $assets]);

    }


    public function index2(){
        $assets = AssetDetail::all();//fetch all records from Assetdetail Model
        return view('ManageLabAsset.ViewLabAssetTech', ['assets' => $assets]);
    }
}
