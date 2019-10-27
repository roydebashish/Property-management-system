<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_accounts  = Role::where('name', 'accounts')->first();

        $employee = new User();
        $employee->name = 'Mr. Admin';
        $employee->email = 'admin@admin.com';
        $employee->password = bcrypt('12345678');
        $employee->save();
        $employee->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'Mr. Account User';
        $manager->email = 'account@account.com';
        $manager->password = bcrypt('12345678');
        $manager->save();
        $manager->roles()->attach($role_accounts);
        
        // DB::table('users')->insert([
        //     'name' => 'Mr. System Admin',
        //     'password'=> bcrypt('<d7ms*x5cT/@WRPx#S/!'),
        //     'email' => 'system@gmail.com',
        //     'user_role' => 'system',
        // ]);
        
        // DB::table('users')->insert([
        //     'name' => 'Mr. Admin',
        //     'password'=> bcrypt(12345678),
        //     'email' => 'admin@gmail.com',
        //     'user_role' => 'admin',
        // ]);
       
        // DB::table('users')->insert([
        //     'name' => 'Mr. Account User',
        //     'password'=> bcrypt(12345678),
        //     'email' => 'account@gmail.com',
        //     'user_role' => 'account',
        // ]);
        
        // DB::table('users')->insert([
        //     'name' => 'Mr. User',
        //     'password'=> bcrypt(12345678),
        //     'email' => 'user@gmail.com',
        //     'user_role' => 'user',
        // ]);
    }
}
