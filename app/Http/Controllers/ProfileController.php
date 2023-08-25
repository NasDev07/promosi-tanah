<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Accon;
use App\Models\Pesan;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function ListData(Request $request)
    {
        $keyword = $request->input('keyword');

        $menuListdata = 'active';

        $listdata = Accon::latest()
            ->join('users', 'accons.user_id', '=', 'users.id')
            ->where('accons.noHp', 'LIKE', '%' . $keyword . '%')
            ->orWhere('users.name', 'LIKE', '%' . $keyword . '%')
            ->select('accons.*') // Pilih kolom dari tabel accons
            ->paginate(10);

        return view('dashboard.list-data-user.datauser', compact('menuListdata', 'listdata'));
    }

 

    public function pesanTanah(Request $request)
    {
        $menuPesanTanah = 'active';
        $query = Pesan::latest();

        if ($request->has('tanggal')) {
            $tanggal = $request->tanggal;
            $query->whereDate('created_at', $tanggal);
        }

        $listdata = $query->paginate(10);
        $listpenjual = Accon::all();
        $product = Produk::all();

        return view('dashboard.pesan.pesan-tanah', compact('menuPesanTanah', 'listdata', 'listpenjual', 'product'));
    }
}
