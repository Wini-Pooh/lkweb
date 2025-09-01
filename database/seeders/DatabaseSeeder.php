<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            TemplateSeeder::class,
            NavigationBlockSeeder::class,
            HeroBlockSeeder::class,
            WebDevelopmentServiceSeeder::class,
            AboutCompanyBlockSeeder::class,
            ContactBlockSeeder::class,
            FooterBlockSeeder::class,
            CTABlockSeeder::class,
            GalleryBlockSeeder::class,
            TestimonialBlockSeeder::class,
            TeamBlockSeeder::class,
            FaqBlockSeeder::class,
            PricingBlockSeeder::class,
        ]);
    }
}
