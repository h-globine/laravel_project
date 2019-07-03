<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Notifications\MessageReceived;
use App\Repository\AddFriendRepository;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddFriendController extends Controller
{

    private $addfriendRepository;
    private $auth;


    public function __construct(AddFriendRepository $addfriendRepository,AuthManager $auth)
    {
        $this->middleware('auth');
        $this->addfriendRepository = $addfriendRepository;
        $this->auth = $auth;
    }


    public function index()

    {

        return view('addFriend/addfriend');

    }

    public function search(Request $request){

        $search =  $this->addfriendRepository->getPerson(
            $request->search
        );

        return view('addFriend/addfriend', [
            'search' => $search
        ]);

    }



    public function create()

    {

        

    }




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
