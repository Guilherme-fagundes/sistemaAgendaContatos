# sistemaAgendaContatos
Este repositório pertence ao teste de criação de um sistema de agenda de contatos proposto para teste de entrevista da empresa LOHR

## Instalação

Baixe o projeto via git clone, coloque a pasta no servidor.
Foi utilizada a versão 8.0 do php e pacote XAMPP para desenvolvimento.

```bash
git clone https://github.com/Guilherme-fagundes/sistemaAgendaContatos.git
```

<b>IMPORTANTE</b> Renomeia a pasta de onde se encontra os arquivos para <i>agentaContatos</i>

Entre na pasta do projeto e instale as dependencias do composer
usando o seguinte comando:
```bash
composer update --no-dev
```
e em seguida 
```bash 
php artisan key:generate
```

Copie o texto de dento do arquivo .env.exemple para um arquivo .env

Altere as seguintes chaves:

```.env
APP_URL=http://localhost/agendaContatos
APP_NAME='Agenda de contatos'
DB_DATABASE=agenda
```
Usuário e senha deixe padrão

As configurações de email use suas credenciais.

Importe o sql do banco de dados que se encontra na pasta BKP_BANCO

Crie sua conta na aplicação e faça o login

## API

Acesse a documentação da api <a href="https://documenter.getpostman.com/view/13685786/TzJybvA4">aqui</a>


