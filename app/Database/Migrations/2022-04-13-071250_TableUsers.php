<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableUsers extends Migration
{
    public function up()
    {
        $fields = [
            'fullname'     => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'password_hash'],
            'gender'       => ['type' => 'CHAR', 'constraint' => 1, 'after' => 'fullname'],
            'address'      => ['type' => 'VARCHAR', 'constraint' => 255, 'after' => 'gender'],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 15, 'after' => 'address'],
            'image_user'   => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'default.jpg', 'after' => 'phone'],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        //
    }
}
