<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CtvProfile;
use Illuminate\Http\Request;

/**
 * Serves the CTV weekly schedule registration page.
 */
class CtvSchedulePageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ctv']);
    }

    /**
     * Show the weekly schedule registration page.
     */
    public function index(Request $request)
    {
        $user    = $request->user();
        $profile = CtvProfile::where('user_id', $user->id)->firstOrFail();

        return view('content.ctv.schedule', [
            'user'    => $user,
            'profile' => $profile,
        ]);
    }
}
