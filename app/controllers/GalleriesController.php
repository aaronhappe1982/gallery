<?php

class GalleriesController extends BaseController {

	/**
	 * Gallery Repository
	 *
	 * @var Gallery
	 */
	protected $gallery;

	public function __construct(Gallery $gallery)
	{
		$this->gallery = $gallery;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = $this->gallery->all();

		return View::make('galleries.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('galleries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Gallery::$rules);

		if ($validation->passes())
		{
			$this->gallery->create($input);

			return Redirect::route('galleries.index');
		}

		return Redirect::route('galleries.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gallery = $this->gallery->findOrFail($id);

		return View::make('galleries.show', compact('gallery'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = $this->gallery->find($id);

		if (is_null($gallery))
		{
			return Redirect::route('galleries.index');
		}

		return View::make('galleries.edit', compact('gallery'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Gallery::$rules);

		if ($validation->passes())
		{
			$gallery = $this->gallery->find($id);
			$gallery->update($input);

			return Redirect::route('galleries.show', $id);
		}

		return Redirect::route('galleries.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->gallery->find($id)->delete();

		return Redirect::route('galleries.index');
	}

}
