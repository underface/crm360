<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Customer;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.app');
    }

    public function test()
    {
      $customers = Customer::select(['id','name','customer_number'])->paginate(5);

      return view('test.index')->withCustomers($customers);
   }

   public function testget(Request $request)
   {
      $id = $request->id;
      if(isset($id))
      {
         $comments = Comment::where('contract_id', $id)->get();


         $html = "";
         foreach($comments as $comment)
         {
            $html .="<blockquote>
                     ".$comment->comments."
                     <footer>
                     ".$comment->created_at."
                     </footer>
                     </blockquote>
                     ";
         }
         echo $html;
      }
      else {
         echo "Brak szukanego ID";
      }
   }

   public function testgetjson(Request $request)
   {
      $comments = Comment::where('contract_id', $request->id)->get();
      return $comments->toJson();
   }

}
