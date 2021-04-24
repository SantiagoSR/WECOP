<?php

/**
 * WECOP
 *
 * @author fperezm1
 * PHP: 8.0.2
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\EcoProduct;
use Illuminate\Support\Facades\Auth;

/**
 * Class ReviewAdminController
 *
 * @package App\Http\Controllers
 */
class ReviewAdminController extends Controller
{
    /**
     * This function is run every time an AdminHomeController is instanced. It checks
     * if the user is a client or an admin for access permisions.
     *
     * @return next with the previous request
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            function ($request, $next) {
                if (Auth::user()->getRole() == 'client') {
                    return redirect()->route('home.index');
                }
                return $next($request);
            }
        );
    }

    public function list($id)
    {
        $data = []; //to be sent to the view
        $data['reviews'] = Review::where('eco_product_id', $id)->get();
        $ecoProduct = EcoProduct::findOrFail($id);
        $data['ecoProduct'] = $ecoProduct;

        return view('admin.review.list')->with('data', $data);
    }


    public function show($id)
    {
        $data = []; //to be sent to the viewS
        $review = Review::findOrFail($id);
        $ecoProduct = EcoProduct::findOrFail($review->getEcoProduct());
        $data['ecoProduct'] = $ecoProduct;

        $data['review'] = $review;
        $data['title'] = $review->getTitle();

        return view('admin.review.show')->with('data', $data);
    }


    public function delete($id)
    {
        $data = Review::find($id);
        $data->delete();
        return redirect()->route('admin.review.list');
    }
}
