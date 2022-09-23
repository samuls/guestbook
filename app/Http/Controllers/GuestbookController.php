<?php

namespace App\Http\Controllers;

use App\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class GuestbookController
 * @package App\Http\Controllers
 */
class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestbooks = DB::table('guestbooks')->get();
        $title = 'GuestBook';
        return view('guestbook.index', compact('guestbooks', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guestbook = new Guestbook();
        return view('guestbook.create', compact('guestbook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Guestbook::$rules);

        $input = $request->all();

        if ($file = $request->file('file_name')) {
            $destinationPath = public_path('images/');
            $courseImage = 'file_' . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $courseImage);
            $input['file_name'] = "$courseImage";
        }

        Guestbook::create($input);

        return redirect()->route('guestbooks.index')
            ->with('success', 'Guestbook created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guestbook = Guestbook::find($id);

        return view('guestbook.show', compact('guestbook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guestbook = Guestbook::find($id);

        return view('guestbook.edit', compact('guestbook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Guestbook $guestbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guestbook $guestbook)
    {
        $guestbooks = Guestbook::find($request->id);
        if (!is_null($guestbooks)) {
            $input['file_name'] = $guestbooks->file_name;
        }

        $input = $request->all();
        if ($file_name = $request->file('file_name')) {
            $request->validate([
                'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            ]);
            $destinationPath = public_path('images/');
            $file = 'file_' . date('YmdHis') . "." . $file_name->getClientOriginalExtension();
            $file_name->move($destinationPath, $file);
            $input['file_name'] = "$file";
        }
       
        $guestbook->update($input);

        return redirect()->route('guestbooks.index')
            ->with('success', 'Guestbook updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $guestbook = Guestbook::find($id)->delete();

        return redirect()->route('guestbooks.index')
            ->with('success', 'Guestbook deleted successfully');
    }
}
