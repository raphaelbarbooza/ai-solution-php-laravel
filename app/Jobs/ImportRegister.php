<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportRegister implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int    $year,
        public string $category,
        public string $title,
        public string $content
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::beginTransaction();
        try {
            // Check the Category Slug
            if (in_array($this->category, array_keys(config('imports.category_terms')))) {
                $categorySlug = config('imports.category_terms')[$this->category];
            } else {
                $categorySlug = config('imports.category_terms.default');
            }
            // Find the category id
            $categoryId = Category::where('slug', $categorySlug)->firstOrFail()->getAttribute('id');
            // Create the document
            Document::create([
                'year' => $this->year,
                'category_id' => $categoryId,
                'title' => $this->title,
                'contents' => $this->content
            ]);
            // Commit
            DB::commit();
        } catch (\Throwable $throwable) {
            DB::rollBack();
            Log::error($throwable->getMessage());
        }
    }
}
