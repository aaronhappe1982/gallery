<?php

class ArtworksController extends BaseController {

	/**
	 * Artwork Repository
	 *
	 * @var Artwork
	 */
	protected $artwork;

	public function __construct(Artwork $artwork)
	{
		$this->artwork = $artwork;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$artworks = $this->artwork->all();
		return View::make('artworks.index', compact('artworks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$galleries = Gallery::all();
		return View::make('artworks.create', compact('artworks', 'galleries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Artwork::$rules);

		if ($validation->passes())
		{
			
			if (Input::hasFile('image'))
			{
				$destinationPath = 'artworks/';
				$fileName = Input::file('image')->getClientOriginalName();
				if (Input::file('image')->move($destinationPath, $fileName) ) {
					$input['image'] = $destinationPath.$fileName;
					$this->artwork->create($input);
					return Redirect::route('artworks.index');
				}
			}
		}

		return Redirect::route('artworks.create')
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
		$artwork = $this->artwork->findOrFail($id);

		return View::make('artworks.show', compact('artwork'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$artwork = $this->artwork->find($id);

		if (is_null($artwork))
		{
			return Redirect::route('artworks.index');
		}

		return View::make('artworks.edit', compact('artwork'));
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
		$validation = Validator::make($input, Artwork::$rules);

		if ($validation->passes())
		{
			$artwork = $this->artwork->find($id);
			$artwork->update($input);

			return Redirect::route('artworks.show', $id);
		}

		return Redirect::route('artworks.edit', $id)
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
		$this->artwork->find($id)->delete();

		return Redirect::route('artworks.index');
	}

}
