# Tutorial CRUD LARAVEL ![ForsakenWorldFwGIF](https://github.com/machadoah/p1-lp4/assets/96703665/a7b3b37a-9b2c-4048-a21e-d536e38e213b)

### Primeiros passos

Os itens necessários para a realização do projeto é:

- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/downloads)

## Projeto MVC

1. Criação do projeto

É utilizado o comando:

```
composer create-project --prefer-dist laravel/laravel nomeprojeto
```
Será criado assim a arquitetura do projeto:

<p align="center" >
    <img height=350px src="https://github.com/machadoah/p1-lp4/assets/96703665/a68deb65-294b-456c-892c-d4fe9834e246" alt="alternate text">
 </p>


2. Iniciar Projeto

Para acionar o servidor web embutido no Laravel para verificar se a aplicação foi criada corretamente e para testá-la durante o desenvolvimento, utilize:
```
php artisan serve
```
 e use ``crtl + c`` para interromper o servidor web.

### CRUD MVC

1. Configuração do Banco de Dados

O banco deve ser criado manualmente em [phpMyAdmin](http://localhost/phpmyadmin/), clicando em **novo**.

<p align="center" >
    <img height=120px src="https://github.com/machadoah/p1-lp4/assets/96703665/4fd05b40-df4d-47a5-b82f-1f4d72bd8706" alt="alternate text">
 </p>

2. Indicar para o laravel o banco de dados

As configurações pertinentes ao projeto se encontram no arquivo ``.env``

<p align="center">
    <img src="https://github.com/machadoah/p1-lp4/assets/96703665/e1cf6feb-226a-4c9c-b954-51120162598f" alt="alternate text">
 </p>

3. Criar os componentes da aplicação

```
php artisan make:model <nome do crud> --controller --resource --migration
```

Apos a executar, veremos:

<p align="center">
    <img height=120px src="https://github.com/machadoah/p1-lp4/assets/96703665/15cf9a6b-4500-4bc8-bdb9-c7d4f5b47e8b" alt="alternate text">
 </p>

Este comando como vizualizado, é responsavel por criar alguns componentes importantes, como:

- controllers
- routes
- migrations
- model

4. Configurando o 'M'

No projeto em ``App\Models`` veremos ``Time`` que foi o criado. Nele precisamos adiconar os campos do crud.

como exemplo:

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = ['ano', 'titulos', 'estado'];
}
```

Agora é necessário acessar as migrations e definir as colunas da nossa tabela no banco. Se encontra na função ``up()``

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->integer('ano');
            $table->integer('titulos');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
```

Após isso execute: ``php artisan migrate``

Sendo exibida a seguinte mensagem, mostrando que foi criado a tabela no MySQL:

![image](https://github.com/machadoah/p1-lp4/assets/96703665/d901ae06-b66c-42de-95bf-420653fab9c1)

Proximo passo é executar as seeders, alguns registros de teste, diretamente no banco atraves de nossa aplicação PHP 🐘.

Agora, em **seeders** é inserido alguns registros, como:

```
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Time;

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

            Time::create(['ano'=>1930,'titulos'=>999,'estado'=>'SP']);
            Time::create(['ano'=>1928,'titulos'=>0,'estado'=>'RJ']);
    }
}
```
para enviar esses registros para o banco é necessário executar o comando ``php artisan db:seed``. Lembrando de importar ``use App\Models\Time;``.

Será exibida a mensagem:

![image](https://github.com/machadoah/p1-lp4/assets/96703665/060a0a24-b4d3-4578-a3ec-d0c160702a70)

5. Configurando as rotas

Para isso é necessário executar a rota peincipal ``routes\web.php`` e acrescentar o seguinte código:

```
Route::resource('/times', App\Http\Controllers\TimeController::class);
```

Ao salvar e executar ``php artisan Route:list`` devemos ver:

![image](https://github.com/machadoah/p1-lp4/assets/96703665/e1a1091d-9e40-4425-9d30-b6927a66f905)

6. Acessando banco

Em controller de times na função index() adicionamos o código:

```return View('Times.index')->with('TimeCollection', Time::all());```

7. Views

insira agora todas as views, seguindo o seguinte padrão:
[Modelo de Views](https://github.com/machadoah/crud-simples-php/tree/main/aluno/resources/views)



