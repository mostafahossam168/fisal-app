<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }


    public function index(Request $request)
    {
        $items = Message::where(function ($q) use ($request) {
            if ($request->read == 'yes') {
                $q->whereNotNull('read_at');
            }
            if ($request->read == 'no') {
                $q->whereNull('read_at');
            }
            if ($request->filter_user) {
                $q->where('user_id', $request->filter_user);
            }
            if ($request->search) {
                $q->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('message', 'LIKE', '%' . $request->search . '%');
            }
        })->latest()
            ->paginate(30);
        // dd($items);
        return view('dashboard.messages.index', compact('items'));
    }

    public function create()
    {
        $users = User::users()->pluck('id', 'name');
        return view('dashboard.messages.create', compact('users'));
    }

    public function store(MessageRequest $request)
    {
        $data = $request->validated();
        if ($request->user_id == 'all') {
            foreach (User::users()->pluck('id') as $id) {
                $data['user_id'] = $id;
                Message::create($data);
            }
        } else {
            Message::create($data);
        }
        return   redirect()->route('messages.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return   redirect()->route('messages.index')->with('success', 'تم حفظ البيانات بنجاح');
    }
}