<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountRegistration;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = AccountRegistration::with('user.patientProfile')->latest()->get();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function verify(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $account = AccountRegistration::findOrFail($id);
        $account->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
            'verified_by' => auth()->id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Status akun berhasil diperbarui.');
    }
}
