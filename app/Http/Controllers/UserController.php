<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
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
        $guestBooks = DB::table('guestbooks')->get();
        $title = 'GuestBook';
        return view('user.index', compact('guestBooks', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'pathology_name' => 'required',
            'mobile' => 'required',
            'pathology_address' => 'required'
        ]);
        $password = Hash::make($request->get('password'));
        $user = new User([
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "mobile" => $request->get('mobile'),
            "password" => $password,
            'is_admin' => 2,
            'pathology_name' => $request->get('pathology_name'),
            'pathology_address' => $request->get('pathology_address'),
        ]);
        $user->save();
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'pathology_name' => 'required',
            'mobile' => 'required',
            'pathology_address' => 'required'
        ]);

        $user = User::where( 'email', '=', $request->get('email') )->where('id','!=',$id)->first();
        if($user)
        {
            $this->validate($request, [
                'email' => 'email|unique:users,email',
            ]);
        }

        $user = User::find($id);
        if( !empty( $request->get('password') ) ) {
            $this->validate($request, [
                'password' => 'required|same:confirm_password',
            ]);
            $user->password = Hash::make($request->get('password'));
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->pathology_name = $request->get('pathology_name');
        $user->pathology_address = $request->get('pathology_address');
        $user->update();
        return redirect()->route('users.index')->with('success','User successfully updated.');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
