<?php

namespace App\Http\Controllers;

use App\Models\GitRepository;
use Illuminate\Http\Request;

class GitRepositoryController extends Controller
{
    public function index()
    {
        $repositories = auth()->user()->gitRepositories;
        return view('git-repositories.index', compact('repositories'));
    }

    public function create()
    {
        return view('git-repositories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $repository = new GitRepository();
        $repository->url = $request->url;
        $repository->user_id = auth()->id();
        $repository->save();

        return redirect()->route('git-repositories.index');
    }

    public function show(GitRepository $repository)
    {
        return view('git-repositories.show', compact('repository'));
    }

    public function destroy(GitRepository $repository)
    {
        $repository->delete();
        return redirect()->route('git-repositories.index');
    }
}
