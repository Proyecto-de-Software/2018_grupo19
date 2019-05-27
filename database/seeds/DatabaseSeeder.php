<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AcompanamientosTableSeeder::class,
            RegionSanitariasTableSeeder::class,
            PartidosTableSeeder::class,
            ConfigsTableSeeder::class,
            GenerosTableSeeder::class,
            LocalidadsTableSeeder::class,
            MotivoConsultasTableSeeder::class,
            ObraSocialsTableSeeder::class,
            TipoDocumentosTableSeeder::class,
            TipoInstitucionsTableSeeder::class,
            TratamientoFarmacologicosTableSeeder::class,

            //Roles
            RolesAndPermissions::class,

            //Inserta usuario root
            UsersTableSeeder::class,

            //Revisar si habia que seedear la tabla institucions
            InstitucionsTableSeeder::class,

            //Pacientes
            PacienteTableSeeder::class,

            //Consultas
            ConsultaTableSeeder::class,
        ]);
    }
}
