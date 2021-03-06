<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\TimeEntry;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        Model::unguard();

        // Call the seed classes to run the seeds
        $this->call('UsersTableSeeder');
        $this->call('TimeEntriesTableSeeder');
    }
}

class UsersTableSeeder extends Seeder {
	public function run()
	{
		// We want to delete the users table if it exists before running the seed
		DB::table('users')->delete();

		$users = array(
			['first_name' => 'Reymark', 'last_name' => 'Torres', 'email' => 'reymark.torres08@gmail.com', 'password' => Hash::make('secret')],
			['first_name' => 'Lady Morganne', 'last_name' => 'Lumbre', 'email' => 'ladymorgannelumbre05@gmail.com', 'password' => Hash::make('secret')],
			['first_name' => 'Talia Shyn', 'last_name' => 'Torres', 'email' => 'ts@gmail.com', 'password' => Hash::make('secret')],
			['first_name' => 'Admin', 'last_name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin')],
		);

		// Loop through each user above and create the record for them in the database
		foreach ($users as $user) {
			User::create($user);
		}
	}
}

class TimeEntriesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('time_entries')->delete();

		$time_entries = array(
			['user_id' => 1, 'start_time' => '2015-02-21T18:56:48Z', 'end_time' => '2015-02-21T20:33:10Z', 'comment' => 'Initial project setup.'],
            ['user_id' => 2, 'start_time' => '2015-02-27T10:22:42Z','end_time' => '2015-02-27T14:08:10Z','comment' => 'Review of project requirements and notes for getting started.'],
            ['user_id' => 3, 'start_time' => '2015-03-03T09:55:32Z','end_time' => '2015-03-03T12:07:09Z','comment' => 'Front-end and backend setup.'],
		);

		foreach ($time_entries as $time_entry) {
			TimeEntry::create($time_entry);
		}
	}
}
