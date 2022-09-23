<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Guestbook;
use Tests\TestCase;

class GuestBookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_store_guestbook()
    {
        $guestbook = $this->app->make(Guestbook::class);
        $payload = [
            'title' => 'test title',
            'description' => 'test demo',
            'user_id' => 2
        ];

        $result = $guestbook->create($payload);
        $this->assertSame($payload['title'],$result->title,'Book created successfully');
    }


    public function test_update_guestbook() {
        $repository = $this->app->make(GuestBook::class);

        $dummyPost = GuestBook::factory(1)->create()[0];

        // source of truth
        $payload = [
            'title' => 'abc123',
        ];

        // compare
        $updated = $repository->update( $dummyPost, $payload );
        $this->assertSame($payload['title'], $updated->title, 'Record updated does not have the same title.');
    }

    public function test_delete_guestbook() {
        $repository = $this->app->make(GuestBook::class);
        $dummy = GuestBook::factory(1)->create()->first();

        // compare
        $deleted = $repository->forceDelete($dummy);

        // verify if it is deleted
        $found = GuestBook::query()->find($dummy->id);

        $this->assertSame(null, $found, 'Record is not deleted');
    }

    


}
