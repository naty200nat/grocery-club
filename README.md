Bloco 1: Registo, autenticação e gestão de utilizadores

Funcionalidades implementadas

Registo de utilizadores com os seguintes campos:

Nome (obrigatório)

Email (obrigatório)

Palavra-passe (obrigatória)

Género (M/F)

NIF (opcional)

Morada de entrega (opcional)

Fotografia de perfil (opcional)

Início e término de sessão

Verificação de email após registo

Atribuição automática do tipo de utilizador: pending_member

Validação no backend para todos os campos

Armazenamento da fotografia em storage/app/public/photos

Tecnologias utilizadas

Laravel 12

Breeze + Blade + TailwindCSS

MySQL (via Laragon)

Mailpit para testes locais de email

Configuração de email

Dificuldades ao enviar emails para o Mailpit devido a conflitos na porta 1025. Utilizou-se MAIL_MAILER=log para simular o envio no ficheiro storage/logs/laravel.log.

Exemplo de configuração funcional:

MAIL_MAILER=log
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"

Instruções de instalação

Clonar o repositório:

git clone <repositório>
cd Ainet-Projeto

Instalar dependências:

composer install
npm install && npm run dev

Configurar o ficheiro .env e gerar chave:

cp .env.example .env
php artisan key:generate

Criar a base de dados Ainet-Projeto no MySQL

Executar as migrações:

php artisan migrate

Criar ligação simbólica para armazenar fotografias:

php artisan storage:link

Iniciar o servidor:

php artisan serve

Aceder no navegador:

http://127.0.0.1:8000/register

Testes realizados

Registo de utilizadores com dados diversos

Verificação manual de email via laravel.log

Visualização de utilizadores na base de dados com todos os campos personalizados

Próximo passo: Bloco 2 – Catálogo de produtos e gestão de papéis.

