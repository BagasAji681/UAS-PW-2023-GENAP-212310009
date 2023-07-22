<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modules.Auth.admin.adminpage',[
            "products" => Products::all(),
            "users" => User::all()
        ]);
        // $products = Products::latest()->paginate(5);
        // return view('modules.Auth.admin.adminpage', compact('products'))
        // ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Products();
        if (!empty($request->id)) {

            $request->validate([
                'id' => 'required',
                'names' => 'required',
                'prices' => 'required | numeric',
                'desc' => 'required'
            ]);

            $results = $products->updatedData($request->all());
            return redirect()->route('m_menu')->with('success',($results) ? 'Menu saved.' : 'Menu failed save.');

        } else {
            
            $request->validate([
                'names' => 'required',
                'prices' => 'required | numeric',
                'desc' => 'required'
            ]);
            // $validateData = $request->validate([

            //     'names' => 'required',
            //     'prices' => 'required',
            //     'pictures' => 'required'
            // ]);

            // $validateData['pictures'] = $request->file('pictures')->store('img');
            // Products::create($validateData);
            // return redirect()->route('m_menu');

            
            
            $results = $products->storedData($request->all()); 
            return redirect()->route('m_menu')->with('success',($results)? 'Menu created successfully.' : 'Menu failed save.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $products = Products::find($request->id);
        $data ['product'] = $products->getByCondition(array('id'=>$request->id))->first();

        return view ('modules.adminpage', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        
        $products = new Products();
        $products = $products->getByCondition(array('id'=>$request->id))->first();

        return json_encode($products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // $products = Products::find($request->id);
        // $results = $products->delete();

        $products = new Products();
        $results = $products->removeByCondition(array('id'=>$request->id));

        return json_encode(array("message"=> ($results) ? 'Menu deleted successfully.' : 'Menu failed remove'));
    }
}
