<?php namespace Modules\Ticketsadmin\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Modules\Ticketsadmin\Http\Requests\UserFormRequest;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends AdminBaseController
{


    public function index()
    {
        $users = User::paginate(15);
        return view('ticketsadmin::users.users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Flash::success('User ' . $user->name . ' deleted!');
        return \Redirect::back();
    }

    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return Redirect::route('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('ticketsadmin::users.update', compact('user'));
    }
    
    public function store(UserFormRequest $request)
    {
        User::create($request->all());
        return Redirect::route('admin.users.index');
    }
    
    public function create()
    {
        return view('ticketsadmin::users.create');
    }

    public function getApiKey(Request $request)
    {
        $user = $request->user();

        if (!is_null($user->apikey)) {
            return $user->apikey;
        }
        return null;
    }

    public function generateApiKey(Request $request, $userId)
    {

        if ($request->user()->isAdmin() || $request->user()->id === $userId) {

            $user = User::find($userId);
            $user->generateApiKey();

            Flash::success('APIKey generated!');
        }
        return redirect()->back();

    }

}