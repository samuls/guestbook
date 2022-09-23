<?php

namespace App\Http\Controllers;

use App\Guestbook;
use Illuminate\Http\Request;

/**
 * Class GuestbookController
 * @package App\Http\Controllers
 */
class GuestbookController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestbooks = Guestbook::paginate();

        return view('guestbook.index', compact('guestbooks'))
            ->with('i', (request()->input('page', 1) - 1) * $guestbooks->perPage());
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

        if ($file = $request->file('document')) {
            $destinationPath = public_path('images/');
            $document = 'file_' . date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $document);
            $input['document'] = $document;
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
            $input['document'] = $guestbooks->document;
        }

        $input = $request->all();
        if ($document = $request->file('document')) {
            $request->validate([
                'document' => 'required',
            ]);
            $destinationPath = public_path('images/');
            $file = 'file_' . date('YmdHis') . "." . $document->getClientOriginalExtension();
            $document->move($destinationPath, $file);
            $input['document'] = $file;
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
        $strRedirectRout = auth()->user()->is_admin == 1 ? 'admin.home' : 'guestbooks.index';
        return redirect()->route($strRedirectRout)->with('success', 'Record deleted successfully');
    }

    public function adminApprove(Request $request, $id) {
        $guestbooks = Guestbook::find($id);
        $guestbooks->is_approved =  1;
        $guestbooks->save();
        return redirect()->route('admin.home')->with('success', 'Record approved successfully');
    }
}
