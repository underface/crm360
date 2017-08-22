<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Contract;
use App\Customer;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

     $time_start = microtime(true);
     sleep(1);

     $customers = Customer::with(['contracts' => function($query)
           {
              $query->where('pos', 'Ropczyce')
                    ->where('typ', 'U')
                    ->where('data_end','>=','2017-07-01')
                    ->where('data_end','<=','2017-08-31');
           }
          ])->whereHas('contracts', function ($query) {
              $query->where('pos', 'Ropczyce')
                    ->where('typ', 'U')
                    ->where('data_end','>=','2017-07-01')
                    ->where('data_end','<=','2017-08-31');
          })
          ->paginate(20);
      $time_end = microtime(true);
      $time = $time_end - $time_start;
      return view('contracts.index')->withCustomers($customers)->withTime($time);



    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
