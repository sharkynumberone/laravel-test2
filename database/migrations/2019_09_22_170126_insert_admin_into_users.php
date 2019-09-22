<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

/**
 * Class InsertAdminIntoUsers
 */
class InsertAdminIntoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::create([
            'email' => 'admin@root.com',
            'name' => 'administrator',
            'password' => bcrypt(config('users.default_admin_password')),
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('email', 'admin@root.com')->delete();
    }
}
