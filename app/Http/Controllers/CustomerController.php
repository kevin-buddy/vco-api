<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\JoinEmail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'limit' => 'required|numeric|min:0',
            'offset' => 'required|numeric|min:0'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        return CustomerResource::collection(
            Customer::offset($request->offset)
                ->limit($request->limit)
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $email = $request->email;
        $find_cus = Customer::where('email', $email)->count();
        if ($find_cus > 0) {
            return response("This Email is already registered", 409);
        }
        $logoPath = public_path('logo-header.png');
        Mail::to($email)->send(new JoinEmail($logoPath));
        $name = substr($email, 0, strrpos($email, '@'));
        $new_customer = new Customer;
        $new_customer->name = $name;
        $new_customer->email = $email;
        $new_customer->save();
        return response("Customer ".$email." Successfully Created", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email:rfc,dns'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'errors' => $validator->errors()
        //     ], 422);
        // }
        // $email = $request->email;
        // $find_cus = Customer::where('email', $email)->count();
        // if ($find_cus > 0) {
        //     return response("This Email is already registered", 409);
        // }
        // $update_customer = Customer::findOrFail(1);
        // $update_customer->name = $request->name;
        // $update_customer->email = $request->email;
        // $update_customer->phone = $request->phone;
        // $update_customer->save();
        return response("Update is not yet maintained", 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_cus = Customer::findOrFail($id);
        Customer::where('id', '=', $id)->delete();
        return response("Customer Deleted", 200);
    }
}
