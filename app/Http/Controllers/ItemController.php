<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /* protected $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $currentUser = Auth::user();
         
        $userid = $currentUser->id;
        
        $kullanici = DB::table('items')->where('user_id',  $userid)->join('users' , 'user_id', '=', 'users.id')->select('users.name as userName', 'items.*')->get();
        
        return $kullanici;
            
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $currentUser = Auth::user();
         
        $userid = $currentUser->id;
        
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->user_id = $userid;
        $newItem->save();
        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $currentUser = Auth::user();
         
        $userid = $currentUser->id;
        $uItem = Item::find($id);
        if($uItem){
            /* $uItem->completed = $request->item['completed'] ? true : false; */
            $uItem->name = $request->ad;
            /* $uItem->completed_at = $request->item['completed_at'] ? Carbon::now() : null; */
            $uItem->user_id = $userid;
            $uItem->save();
            return true;
        }
        return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteItem = Item::find($id);
        if($deleteItem){
            $deleteItem->delete();
            return "Item silindi";
        }
        return "Item bulunamadı.";
    }
}
