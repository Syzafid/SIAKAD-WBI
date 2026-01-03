<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of all notifications (History).
     */
    public function index()
    {
        $notifications = Notifikasi::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('notifikasi.index', compact('notifications'));
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead()
    {
        Notifikasi::where('user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Semua notifikasi ditandai sebagai dibaca.');
    }

    /**
     * Mark a single notification as read and redirect to its link.
     */
    public function read($id)
    {
        $notification = Notifikasi::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $notification->update(['is_read' => true]);

        if ($notification->link) {
            return redirect($notification->link);
        }

        return redirect()->back();
    }
}
