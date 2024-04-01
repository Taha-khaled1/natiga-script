<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\UserData;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = College::all();

        return view('dashboard.coupon.index', compact('coupons'));
    }
    public function store(Request $request)
    {
        $coupons = new College();
        $coupons->name = $request->name;
        $coupons->save();
        return back();
    }
    public function create(Request $request)
    {
        $coupons = College::all();
        return view(
            'dashboard.coupon.store',
            compact('coupons'),
        );
    }
    public function destroy(Request $request)
    {
        $coupon = College::find($request->id);
        $coupon->delete();
        session()->flash('delete', 'تم حذف البيانات بنجاح ');
        return redirect()->route('coupons')->with('success', 'color deleted successfully');
    }
}
