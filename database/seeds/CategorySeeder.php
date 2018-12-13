<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriaAvisos = new Category();
        $categoriaAvisos->name = 'Avisos';
        $categoriaAvisos->description = 'Categoria exclusiva para avisos internos';
        $categoriaAvisos->save();

        $categoriaAnuncio = new Category();
        $categoriaAnuncio->name = 'Anuncios';
        $categoriaAnuncio->description = 'Categoria exclusiva para anúncios';
        $categoriaAnuncio->save();
    }
}
