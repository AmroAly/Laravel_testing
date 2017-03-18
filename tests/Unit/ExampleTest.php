<?php

namespace Tests\Unit;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    public function testBasicTest()
    {
        // Given
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // When fetching the archives it expected to be 2 one for the current month and one for the previous one
        $posts = Post::archives();
        // dd($posts);
        
        // Then
        $this->assertCount(2, $posts);
        $this->assertEquals($posts,
        [
             [
               "year" => $first->created_at->format('Y'),
               "month" => $first->created_at->format('F'),
               "published" => 1
           ],
             [
               "year" => $second->created_at->format('Y'),
               "month" => $second->created_at->format('F'),
               "published" => 1
             ]
        ]
       );
    }
}
