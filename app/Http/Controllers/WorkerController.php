<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return view('worker.all', compact('workers'));
    }

    public function addWorker()
    {
        return view('worker.create');
    }

    public function storeWorker(Request $request)
    {
        $name = $request->name;
        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $worker = new Worker();
        $worker->name = $name;
        $worker->profile_image = $imageName;
        $worker->save();

        return back()->with('worker-added', 'worker has been inserted');
    }

    public function editWorker($id)
    {
        $worker = Worker::find($id);

        return view('worker.edit', compact('worker'));
    }

    public function updateWorker(Request $request)
    {
        $name = $request->name;
        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $worker = Worker::find($request->id);
        $worker->name = $name;
        $worker->profile_image = $imageName;
        $worker->save();

        return back()->with('worker-updated', 'worker updated successfully');
    }

    public function deleteWorker($id)
    {
        $worker = Worker::find($id);
        unlink(public_path('images/'.$worker->profile_image));
        $worker->delete();

        return back()->with('worker-deleted', 'Worker has been deleted successfully');
    }
}
