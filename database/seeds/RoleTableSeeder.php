<?php
use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'admin';
        $role_employee->description = 'A Super admin who has access to all features';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'accounts';
        $role_manager->description = 'A accounts user will have limited access';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'user';
        $role_manager->description = 'A user will have moare limited access compared to other users';
        $role_manager->save();
    }
}
