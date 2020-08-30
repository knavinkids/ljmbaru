<?php

namespace App\Http\Controllers\Api;

use App\Brg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BrgCollection;
use App\Http\Resources\BrgItem;
class BrgController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return new BrgCollection(Brg::get());
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
		$this->validate($request, Brg::rules(false));

        if (!Brg::create($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 200,
            ];
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Brg  $brg
	 * @return \Illuminate\Http\Response
	 */
	public function show(Brg $brg)
	{
		return new BrgItem($brg);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Brg  $brg
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Brg $brg)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Brg  $brg
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Brg $brg)
	{
		$this->validate($request, Brg::rules(true, $brg->id));

		if (!$brg->update($request->all())) {
				return [
						'message' => 'Bad Request',
						'code' => 400,
				];
		} else {
				return [
						'message' => 'OK',
						'code' => 201,
				];
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Brg  $brg
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Brg $brg)
	{
		if ($brg->delete()) {
			return [
					'message' => 'OK',
					'code' => 204,
			];
	} else {
			return [
					'message' => 'Bad Request',
					'code' => 400,
			];
	}
	}
}
