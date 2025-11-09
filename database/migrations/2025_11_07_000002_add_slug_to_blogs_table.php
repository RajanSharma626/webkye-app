<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        $this->populateBlogSlugs();

        Schema::table('blogs', function (Blueprint $table) {
            $table->unique('slug');
        });

        $this->enforceNotNull();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropUnique('blogs_slug_unique');
            $table->dropColumn('slug');
        });
    }

    private function populateBlogSlugs(): void
    {
        $blogs = DB::table('blogs')->select('id', 'title')->get();

        foreach ($blogs as $blog) {
            $slug = $this->generateUniqueSlug($blog->title, $blog->id);
            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        }
    }

    private function generateUniqueSlug(string $title, int $currentId): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            DB::table('blogs')
                ->where('slug', $slug)
                ->where('id', '!=', $currentId)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function enforceNotNull(): void
    {
        $blogsMissing = DB::table('blogs')->select('id', 'title')->whereNull('slug')->get();
        foreach ($blogsMissing as $blog) {
            $slug = $this->generateUniqueSlug($blog->title, $blog->id);
            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        }

        DB::statement('ALTER TABLE blogs MODIFY slug VARCHAR(255) NOT NULL');
    }
};

