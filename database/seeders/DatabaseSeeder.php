<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        // \App\Models\Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags'=> 'laravel, javascript',
        //     'company'=> 'Acme Corp',
        //     'location'=> 'Boston, MA',
        //     'email'=> 'email1@email.com',
        //     'website'=> 'https://www.acme.com',
        //     'description'=> 'Ut velit reprehenderit commodo tempor exercitation non ullamco. Ad consectetur minim culpa amet ex non. Amet in do consequat dolore sunt enim elit ad est anim nulla excepteur. Consectetur qui anim et veniam sit mollit Lorem cupidatat proident voluptate nostrud id. Lorem velit est dolor do magna deserunt sit Lorem. Voluptate ea id eiusmod non ad. Sint aute labore ut incididunt anim est veniam aute tempor aliqua commodo enim.',
        // ]);
        // \App\Models\Listing::create([
        //     'title' => 'Laravel Junior Developer',
        //     'tags'=> 'laravel, html',
        //     'company'=> 'Acme Corp',
        //     'location'=> 'New York, NY',
        //     'email'=> 'email1@email.com',
        //     'website'=> 'https://www.acme.com',
        //     'description'=> 'Ullamco pariatur et consequat irure. Occaecat voluptate et consectetur anim. Cillum irure ullamco laboris cupidatat cupidatat veniam anim magna cupidatat officia pariatur labore elit. Culpa ut eu consectetur irure occaecat velit qui consectetur ex voluptate. Fugiat cupidatat ipsum enim laborum minim nostrud minim officia proident incididunt ullamco laboris. Quis dolore anim elit velit ex magna sint laborum qui minim et non.',
        // ]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\Listing::factory(10)->create([
            'user_id' => $user->id,
        ]);

    }
}
