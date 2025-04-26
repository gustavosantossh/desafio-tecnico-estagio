# Todo List Manager

📌Objetivo: Criar uma sistema de gestão de tarefas (To-do List).

**Observações: O projeto foi desenvolvido em laravel com jetstream, por padrão o jetstream utiliza tailwindcss, mas como o desafio pedia em bootstrap 5 decidi fazer apenas a parte desafio em bootstrap que será requisito usado pelo desafio e o restante esta padrão do jetstream**

# Requisitos

- PHP 8.x ou superior
- Laravel 8.x ou superior
- Servidor Web: Apache (Laragon ou Xampp)
- MySql
- composer

# Instalação

- Clone o projeto `https://github.com/gustavosantossh/desafio-tecnico-estagio.git`

- Extraia o projeto clonado no caminho: `C:\laragon\www` 

- Incie seu servior web (laragon)

- Abra o terminal (laragon) 

- Rode `cd desafio-tecnico-estagio`

- Rode `cp .env.example .env`

- Rode `php artisan key:generate`

- Rode `php artisan migrate` caso apareça   Would you like to create it? (yes/no) escolha (yes)  :)

- Rode `php artisan serve`

````
cd desafio-tecnico-estagio &&
cp .env.example .env &&
php artisan key:generate &&
php artisan migrate &&
php artisan serve
````
