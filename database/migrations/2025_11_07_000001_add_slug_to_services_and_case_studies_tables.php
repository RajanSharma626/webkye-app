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
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        Schema::table('case_studies', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        $this->populateServiceSlugs();
        $this->populateCaseStudySlugs();

        Schema::table('services', function (Blueprint $table) {
            $table->unique('slug');
        });

        Schema::table('case_studies', function (Blueprint $table) {
            $table->unique('slug');
        });

        $this->enforceNotNull();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->dropUnique('case_studies_slug_unique');
            $table->dropColumn('slug');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropUnique('services_slug_unique');
            $table->dropColumn('slug');
        });
    }

    private function populateServiceSlugs(): void
    {
        $services = DB::table('services')->select('id', 'title')->get();

        foreach ($services as $service) {
            $slug = $this->generateUniqueSlug('services', $service->title, $service->id);
            DB::table('services')->where('id', $service->id)->update(['slug' => $slug]);
        }
    }

    private function populateCaseStudySlugs(): void
    {
        $caseStudies = DB::table('case_studies')->select('id', 'title')->get();

        foreach ($caseStudies as $caseStudy) {
            $slug = $this->generateUniqueSlug('case_studies', $caseStudy->title, $caseStudy->id);
            DB::table('case_studies')->where('id', $caseStudy->id)->update(['slug' => $slug]);
        }
    }

    private function generateUniqueSlug(string $table, string $title, int $currentId): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            DB::table($table)
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
        $servicesMissing = DB::table('services')->select('id', 'title')->whereNull('slug')->get();
        foreach ($servicesMissing as $service) {
            $slug = $this->generateUniqueSlug('services', $service->title, $service->id);
            DB::table('services')->where('id', $service->id)->update(['slug' => $slug]);
        }

        $caseStudiesMissing = DB::table('case_studies')->select('id', 'title')->whereNull('slug')->get();
        foreach ($caseStudiesMissing as $caseStudy) {
            $slug = $this->generateUniqueSlug('case_studies', $caseStudy->title, $caseStudy->id);
            DB::table('case_studies')->where('id', $caseStudy->id)->update(['slug' => $slug]);
        }

        DB::statement('ALTER TABLE services MODIFY slug VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE case_studies MODIFY slug VARCHAR(255) NOT NULL');
    }
};

