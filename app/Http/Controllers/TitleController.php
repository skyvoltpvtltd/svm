<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

/**
 * Class TitleController
 * @package App\Http\Controllers
 */
class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::paginate();

        return view('title.index', compact('titles'))
            ->with('i', (request()->input('page', 1) - 1) * $titles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = new Title();
        return view('title.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Title::$rules);

        $title = Title::create($request->all());

        return redirect()->route('titles.index')
            ->with('success', 'Title created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = Title::find($id);

        return view('title.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = Title::find($id);

        return view('title.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Title $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        request()->validate(Title::$rules);

        $title->update($request->all());

        return redirect()->route('titles.index')
            ->with('success', 'Title updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $title = Title::find($id)->delete();

        return redirect()->route('titles.index')
            ->with('success', 'Title deleted successfully');
    }
}
