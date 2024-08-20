<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FpxSetting;
use Illuminate\Http\Request;

class FpxSettingController extends Controller
{
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],

        ]);

        FpxSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
            ]
        );

        toastr('Updated Successfully!', 'success', 'Success');
        return redirect()->back();
    }
}
