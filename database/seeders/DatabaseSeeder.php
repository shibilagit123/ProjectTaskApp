<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



         $projects = ['SchoolApp', 'HospitalmanagementApp', 'DeliverymanagementApp', 'GymManagementApp', 'PatientbookingApp', 'VehicleRentalApp', 'TurfbookingApp'];

        foreach ($projects as $proj) {
            Project::create(['name' => $proj]);
        }

        $task = ['Document prepration', 'Demo prepration', 'module management', 'Designing', 'Testing', 'Development ', 'BugFixing', 'Module design creation ', 'User interface design', 'figma design', 'MobileApp screen design','Domain purchase&verification','Api Integration' ,'Hosting'];

        foreach ($task as $ts) {
            Task::create(['name' => $ts]);
        }

         DB::table('project_tasks')->insert([
            [
                'project_id' => '1',
                'task_id' => '1',
                'status' => '1',
            ],
            [
                'project_id' => '2',
                'task_id' => '2',
                'status' => '1',
            ],
            [

                'project_id' => '2',
                'task_id' => '3',
                'status' => '1',
            ],
             [

                'project_id' => '1',
                'task_id' => '3',
                'status' => '1',
            ],
             [

                'project_id' => '1',
                'task_id' => '4',
                'status' => '1',
            ],
            [

                'project_id' => '2',
                'task_id' => '4',
                'status' => '1',
            ],
            [

                'project_id' => '3',
                'task_id' => '4',
                'status' => '1',
            ],
             [

                'project_id' => '3',
                'task_id' => '3',
                'status' => '1',
            ],
             [

                'project_id' => '3',
                'task_id' => '4',
                'status' => '1',
            ],
        ]);

    }
}
