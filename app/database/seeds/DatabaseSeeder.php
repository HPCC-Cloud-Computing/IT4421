<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ClustersTableSeeder');
		$this->call('ExamroomsTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('UniversitiesTableSeeder');
		$this->call('MajorsTableSeeder');
		$this->call('DepartmentsTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ScoresTableSeeder');
	}

}
