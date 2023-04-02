<?php

namespace Tests;

use App\Models\UserRole;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        // Make sure tests are being executed on testing database
        $databaseName = DB::getDatabaseName();
        if ($databaseName != 'testing_bakalarskapraca')
        {
            $this->fail('Tests must be run on database testing_bakalarskapraca');
        }
    }
}
