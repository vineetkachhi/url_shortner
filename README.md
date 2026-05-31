1 i have use authentication with Laravel sanctum and admin lte panel for dashboard
2.git hub repo : https://github.com/vineetkachhi/url_shortner.git 3. step by step project setup  
-> git clone https://github.com/vineetkachhi/url_shortner.git
-> cd url_shortner
-> composer install
->.env.example to .env
->php artisan key:generate
->env changes
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortner
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=vineetpatel907@gmail.com
MAIL_PASSWORD=hddxadnwbkojlmjk
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=vineetpatel907@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

->php artisan migrate

-> php artisan db:seed
->super admin email and password is ->superadmin@gmail.com pass: 12345678

-> php artisan serve

Ai tool using chatgpt
Admin LTE menu setup  
invite system check in chat gpt
Inline Suggestion using

testing purpose i have also upload on this url  
https://wecareindia.page.gd/

login superadmin@gmail.com
pass: 12345678
