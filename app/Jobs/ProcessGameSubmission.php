<?php

namespace App\Jobs;

use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ProcessGameSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function handle()
    {
        $repositoryUrl = $this->game->git_repository_url;
        $storagePath = storage_path('app/public/repositories/' . $this->game->git_repository_id);
        
        // Create directory if it doesn't exist
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        // Clone repository
        $process = new Process(['git', 'clone', $repositoryUrl, $storagePath]);
        $process->setTimeout(300);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Validate the submission
        $this->validateSubmission($storagePath);

        // Update game status
        $this->game->update(['status' => 'ready']);
    }

    protected function validateSubmission($path)
    {
        // Check for required files
        $requiredFiles = ['index.html', 'main.js', 'style.css'];
        
        foreach ($requiredFiles as $file) {
            if (!file_exists($path . '/' . $file)) {
                throw new \Exception("Missing required file: $file");
            }
        }

        // Additional validation logic can be added here
        // For example: checking file sizes, validating HTML structure, etc.
    }
}
