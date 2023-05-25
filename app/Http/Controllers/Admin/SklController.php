<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SklController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		abort_if(Gate::denies('skl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		$module_name = 'Proses RIPH';
		$page_title = 'SKL Terbit';
		$page_heading = 'SKL Terbit';
		$heading_class = 'fa fa-file';
		return view('admin.skl.index', compact('module_name', 'page_title', 'page_heading', 'heading_class'));
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Skl  $skl
	 * @return \Illuminate\Http\Response
	 */
	public function show(Skl $skl)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Skl  $skl
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Skl $skl)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Skl  $skl
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Skl $skl)
	{
		//
	}

	public function recomendations()
	{
		if (Auth::user()->roles[0]->title !== 'Pejabat') {
			abort(403, 'Unauthorized');
		}

		$module_name = 'Proses RIPH';
		$page_title = 'SKL Terbit';
		$page_heading = 'SKL Terbit';
		$heading_class = 'fa fa-file';

		$skls = Skl::where('status', '6')
			->whereNull('approved_by')
			->whereNull('approved_at')
			->get();

		return view('admin.skl.recomendations', compact('module_name', 'page_title', 'page_heading', 'heading_class'));
	}

	public function destroy(Skl $skl)
	{
		//
	}
}
