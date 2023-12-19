# xss_session_hijacking_example

## Execução
```bash
php -S 0.0.0.0:8080
```

## Banco de dados
 (opcional: suba um container docker com mysql com o comando `sudo docker compose up`)

 1. Crie um banco de dados MySQL com o nome definido no arquivo `conn.php` (default: xss_teste)
 2. Defina os dados para conexão com o banco no arquivo `conn.php`
 3. Utilize o arquivo `database-migration.sql` para criar a tabela de `usuarios`

 - Caso tenha um erro `"Could not find driver"`, habilite a extensão pdo_mysql no arquivo php.ini

## Session Hijacking: Passo a passo
 1. Crie um usuário não administrador e insira no campo de nome o payload do arquivo `payload.txt`
 2. Quando um usuário administrador fizer login e acessar a página admin, o cookie do usuário será enviado para o servidor local e será salvo no arquivo `cookies.txt`
 3. Na página do atacante, adicione o cookie com o nome `access_token` no browser e recarregue a página para logar como o usuário administrador