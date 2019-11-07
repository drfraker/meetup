<?php

namespace Tests\Feature\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Meeting;
use App\User;
use App\Services\MeetingService;
use App\Traits\HasUserTests;

class MeetingServiceTest extends TestCase
{
    use HasUserTests;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanDeleteMeeting()
    {
        // $meeting_user = $this->signIn();
        $meeting = factory(Meeting::class)->make()->save();
        (new MeetingService)->deleteMeeting($meeting->id);
        $this->assertDatabaseMissing('meetings', ['id' => $meeting->id]);
    }
}