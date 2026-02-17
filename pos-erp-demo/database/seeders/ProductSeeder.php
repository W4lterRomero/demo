<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $desayunos = Category::where('name', 'Desayunos')->first();
        $almuerzos = Category::where('name', 'Almuerzos')->first();
        $bebidas = Category::where('name', 'Bebidas')->first();
        $postres = Category::where('name', 'Postres')->first();
        $turismo = Category::where('name', 'Turismo')->first();

        $products = [
            // Desayunos (Precios típicos)
            ['category_id' => $desayunos->id, 'name' => 'Pupusas de queso', 'price' => 0.50, 'cost' => 0.20, 'image' => 'pupusas-queso.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Pupusas revueltas', 'price' => 0.60, 'cost' => 0.25, 'image' => 'pupusas-revueltas.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Pupusas de frijol', 'price' => 0.50, 'cost' => 0.18, 'image' => 'pupusas-frijol.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Tamal de pollo', 'price' => 1.75, 'cost' => 0.80, 'image' => 'tamal-pollo.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Tamal de elote', 'price' => 1.50, 'cost' => 0.60, 'image' => 'tamal-elote.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Plátanos fritos', 'price' => 2.00, 'cost' => 0.50, 'image' => 'platanos.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Frijoles con crema', 'price' => 3.50, 'cost' => 1.20, 'image' => 'frijoles-crema.jpg'],
            ['category_id' => $desayunos->id, 'name' => 'Huevos rancheros', 'price' => 4.00, 'cost' => 1.50, 'image' => 'huevos-rancheros.jpg'],

            // Almuerzos
            ['category_id' => $almuerzos->id, 'name' => 'Arroz frito', 'price' => 4.50, 'cost' => 1.80, 'image' => 'arroz-frito.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Pollo guisado', 'price' => 5.00, 'cost' => 2.00, 'image' => 'pollo-guisado.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Carne asada', 'price' => 6.50, 'cost' => 3.00, 'image' => 'carne-asada.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Yuca frita', 'price' => 2.50, 'cost' => 0.80, 'image' => 'yuca-frita.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Yuca con chicharrón', 'price' => 5.50, 'cost' => 2.50, 'image' => 'yuca-chicharron.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Sopa de res', 'price' => 5.00, 'cost' => 2.20, 'image' => 'sopa-res.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Sopa de gallina', 'price' => 6.00, 'cost' => 2.80, 'image' => 'sopa-gallina.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Pescado frito', 'price' => 7.50, 'cost' => 3.50, 'image' => 'pescado-frito.jpg'],
            ['category_id' => $almuerzos->id, 'name' => 'Casamiento', 'price' => 3.50, 'cost' => 1.20, 'image' => 'casamiento.jpg'],

            // Bebidas
            ['category_id' => $bebidas->id, 'name' => 'Horchata', 'price' => 1.00, 'cost' => 0.30, 'image' => 'horchata.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Tamarindo', 'price' => 1.00, 'cost' => 0.30, 'image' => 'tamarindo.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Jamaica', 'price' => 1.00, 'cost' => 0.25, 'image' => 'jamaica.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Café americano', 'price' => 1.50, 'cost' => 0.40, 'image' => 'cafe-americano.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Café con leche', 'price' => 2.00, 'cost' => 0.60, 'image' => 'cafe-leche.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Jugo de naranja', 'price' => 2.50, 'cost' => 0.80, 'image' => 'jugo-naranja.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Licuado de frutas', 'price' => 3.00, 'cost' => 1.00, 'image' => 'licuado.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Refresco lata', 'price' => 1.25, 'cost' => 0.60, 'image' => 'soda.jpg'],
            ['category_id' => $bebidas->id, 'name' => 'Agua embotellada', 'price' => 0.75, 'cost' => 0.30, 'image' => 'agua.jpg'],

            // Postres
            ['category_id' => $postres->id, 'name' => 'Quesadilla salvadoreña', 'price' => 2.50, 'cost' => 0.90, 'image' => 'quesadilla.jpg'],
            ['category_id' => $postres->id, 'name' => 'Semita', 'price' => 1.50, 'cost' => 0.50, 'image' => 'semita.jpg'],
            ['category_id' => $postres->id, 'name' => 'Tres leches', 'price' => 3.50, 'cost' => 1.20, 'image' => 'tres-leches.jpg'],
            ['category_id' => $postres->id, 'name' => 'Flan', 'price' => 2.75, 'cost' => 0.90, 'image' => 'flan.jpg'],
            
            // Turismo
            ['category_id' => $turismo->id, 'name' => 'Tour Cuatrimoto 1h', 'price' => 35.00, 'cost' => 5.00, 'unit' => 'hora', 'image' => 'moto-tour.jpg'],
            ['category_id' => $turismo->id, 'name' => 'Tour Cuatrimoto 2h', 'price' => 60.00, 'cost' => 10.00, 'unit' => 'hora', 'image' => 'moto-tour-2.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
