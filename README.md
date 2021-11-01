<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Projeto Feito em Laravel

Especificações iniciais:
- PHP versão 7.4
- Laravel versão 8.68.1

## Clone do projeto

> git clone hhttps://github.com/devbatista/tks-musicshop.git

Após o clone, criar o arquivo .env com as devidas informações do banco de dados local
```
DB_CONNECTION=mysql
DB_HOST=seu.host.local.ou.remoto
DB_PORT=XXXX
DB_DATABASE=db_name
DB_USERNAME=user
DB_PASSWORD=pass
```

## Migrations e Seeders

Depois de configurado o .env criar o banco de dados no seu SGDB de preferência. Em seguida abrir o projeto no cmd/terminal e navegar até a diretório do projeto e rodar os seguintes comandos:
```
php artisan migrate
php artisan db:seed
```
- *Migrate* para criar as tabelas
- *Seed* para preencher com os dados iniciais