<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function campaign(Request $request){
        $request->validate([
            'page_id'=>'required',
            'campaignName'=> 'required',
            'budget' => 'required',
            'startDate'=>'required',
            'endDate'=>'required',
            'addContent'=>'required',
            'status' => 'required'
        ]);

        $filePath = null;

        if($request->hasFile('addContent')){
            $file = $request->file('addContent');
            $filePath = $file->store('campaign','public');
            // stored in storage/app/public/campaigns
        }

        $campaign = Campaign::create([
            'page_id'=>$request->page_id,
            'campaignName'=>$request->campaignName,
            'budget'=>$request->budget,
            'startDate'=>$request->startDate,
            'endDate'=>$request->endDate,
            'status'=>$request->status,
            'addContent'=>$filePath
        ]);

        return response()->json([
            'message'=>'Campaign Created',
            'data'=>$campaign
        ]);
    }

    public function getCampaign(){
        $campaign = Campaign::all();
        return response()->json([
            'getData'=>$campaign
        ]);
    }

    public function show($id){
        $campaign = Campaign::findOrFail($id);

        return response()->json([
            'data'=> $campaign
        ]);
    }

    public function edit(Request $request, $id){
        $campaign = Campaign::findOrFail($id);

        $request->validate([
        'page_id' => 'required|exists:pages,id',
        'campaignName' => 'required',
        'budget' => 'required',
        'startDate' => 'required',
        'endDate' => 'required',
        'addContent' => 'nullable|file',
        'status'=>'required',
    ]);

        if($request->hasFile('addContent')){
            $file = $request->file('addContent');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->store('campaign','public');
            $campaign->addContent = $filePath;
        }
        
            $campaign->page_id = $request->page_id;
            $campaign->campaignName = $request->campaignName;
            $campaign->budget = $request->budget;
            $campaign->startDate = $request->startDate;
            $campaign->endDate = $request->endDate;
            $campaign->status = $request->status;
            $campaign->save();

        return response()->json([
            'message'=> 'Campaign Updated Successfully',
            'data'=>$campaign
        ]);
    }

    public function delete($id){
        $campaign = Campaign::findOrFail($id);

        // delete the file form the storage
        if($campaign->addcontent){
            $filePath = storage_path('app/public/'.$campaign->addContent);
            if(file_exists($filePath)){
                unlink($filePath);
            }
        }

        $campaign ->delete();

        return response()->json([
            'message'=>'Campaign deleted Successfully',
            'data'=>$campaign
        ]);
    }
}
