<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::orderBy('is_read')
            ->orderByDesc('created_at')
            ->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function markRead(int $id): RedirectResponse
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->update(['is_read' => true]);
        return back()->with('success', 'Message marked as read.');
    }

    public function markUnread(int $id): RedirectResponse
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->update(['is_read' => false]);
        return back()->with('success', 'Message marked as unread.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->delete();
        return back()->with('success', 'Message deleted successfully.');
    }
}
