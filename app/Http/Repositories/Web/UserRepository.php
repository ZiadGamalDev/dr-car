<?php

namespace App\Http\Repositories\Web;

use App\Http\Interfaces\Web\UserInterface;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    function __construct(private ImageService $imageService)
    {
    }

    public function index()
    {
        $users = User::where('role_id', '!=', 1)->paginate(10);
        return view('settings.users.index', ['dataTable' => $users]);
    }

    public function create()
    {
        $roles = [
            2 => trans('lang.customer'),
            3 => trans('lang.winch'),
            4 => trans('lang.garage'),
        ];
        return view('settings.users.create', compact('roles'));
    }

    public function store($request)
    {
        $requestData = $request->validated();
        $requestData['password'] = Hash::make($request->input('password'));
        $requestData['short_biography'] = strip_tags($request->input('short_biography'));
        $requestData['image'] = $this->imageService->store($request, 'users');

        $user = User::create($requestData);
        switch ($user->role_id) {
            case 2:
                $user->user_information()->create($requestData);
                break;
            case 3:
                $user->winch_information()->create($requestData);
                break;
            case 4:
                $requestData['garage_type'] = 'none';
                $user->garage_information()->create($requestData);
                break;
        }

        return redirect()->route('users.index')->with([
            'success' => 'Created successfully'
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('settings.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $userInfo = $user->info();
        if ($userInfo) {
            $user->setAttribute('phone_number', $userInfo->phone_number);
            $user->setAttribute('short_biography', $userInfo->short_biography);
            $user->setAttribute('address', $userInfo->address);
        }
        $roles = [
            2 => trans('lang.customer'),
            3 => trans('lang.winch'),
            4 => trans('lang.garage'),
        ];
        return view('settings.users.edit', compact('user', 'roles'));
    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $requestData = $request->validated();
        $requestData['short_biography'] = strip_tags($request->input('short_biography'));
        $requestData['image'] = $this->imageService->update($request, 'users');

        $user->update($requestData);
        $user->info()->update($requestData);

        return redirect()->route('users.index')->with([
            'success' => 'Updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->imageService->delete($user, 'users', throw: 'info');
        $user->info()->delete();
        $user->delete();
        return redirect()->route('users.index')->with([
            'success' => 'Deleted successfully'
        ]);
    }
}
