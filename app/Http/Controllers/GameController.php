<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Jobs\ProcessGameSubmission;
class GameController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Game::class, 'game');
    }

    public function index()
    {
        $games = auth()->user()->games;
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $this->authorize('create', Game::class);
        $repositories = auth()->user()->gitRepositories;
        return view('games.create', compact('repositories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Game::class);
        
        $game = new Game();
        $game->title = $request->title;
        $game->description = $request->description;
        $game->user_id = auth()->id();
        $game->git_repository_id = $request->git_repository_id;
        $game->status = 'initializing';
        $game->save();

        return redirect()->route('games.show', $game)
            ->with('status', [
                'type' => 'success',
                'message' => 'Game created successfully!'
            ]);
    }

    public function show(Game $game)
    {
        $this->authorize('view', $game);
        return view('games.show', compact('game'));
    }

    public function play(Game $game, Request $request)
    {
        $this->authorize('play', $game);
        
        // Get the base path for the game files using repository ID
        $basePath = storage_path('app/public/repositories/' . $game->git_repository_id);
        
        // Get the requested path and sanitize it
        $requestedPath = $request->path ?? 'index.html';
        $requestedPath = ltrim($requestedPath, '/');
        
        // Prevent directory traversal
        if (str_contains($requestedPath, '..')) {
            abort(403, 'Invalid path');
        }
        
        // Build full file path
        $filePath = $basePath . '/' . $requestedPath;
        
        // Check if file exists
        if (!file_exists($filePath)) {
            abort(404);
        }
        
        // Get MIME type
        $mimeType = mime_content_type($filePath);
        
        // Return file response with security headers
        return response()->file($filePath, [
            'Content-Type' => $mimeType,
            'X-Content-Type-Options' => 'nosniff',
            'X-Frame-Options' => 'DENY',
            'Content-Security-Policy' => "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;"
        ]);
    }

    public function destroy(Game $game)
    {
        $this->authorize('delete', $game);
        $game->delete();
        return redirect()->route('games.index');
    }
}
