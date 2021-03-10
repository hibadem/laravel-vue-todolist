# Laravel & Vue todoList Uygulaması
Backend için Laravel, veritabanı için Mysql kullanılmıştır.
Önyüz Vue js ve REST Api ile çalışmaktadır.
JWT  ile kullancı kontrolü sağlanmaktadır.
Üye girişi yapmış kullanıcı kendine ait maddeleri(todo) ekleyebilir, silebilir, düzenleyebilir.
 <br/>


<br>

### Uygulamayı Çalıştırmak için:

<br/><br/>

ADIM 1 - Github'dan clone edip çalıştırmak için
> \>git clone https://github.com/hibadem/laravel-vue-todolist.git
>ADIM 2 - Dosyanın kurulu olduğu yere gidin
> \>cd laravel-vue-todolist/
>ADIM 3 - composer yükleyin
> \>composer install
> .env.example dosyasını kopyalayın ve .env dosyası olarak yeniden adlandırın 
> \>copy .env.example .env
> Yeni bir anahtar oluşturmak için aşağıdaki komutu çalıştırın
> \>php artisan key:generate
> Database migrationlarını çalıştırın

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


<br/>
<br/>





