<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmailSetting;

class MailsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	EmailSetting::create([
            'mail_transport'            =>'smtp',
            'mail_host'                 =>'smtp.mailtrap.io',
            'mail_port'                 =>'2525',
            'mail_username'             =>'ed3caa94a48fd1',
            'mail_password'             =>'baf29d92154c72',
            'mail_encryption'           =>'tls',
            'mail_from'                 => 'ajayyadavexpo@gmail.com',
        ]);
    }
}
