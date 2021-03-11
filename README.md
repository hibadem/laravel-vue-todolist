# Laravel & Vue todoList Uygulaması
Backend için Laravel, veritabanı için Mysql kullanılmıştır.
Önyüz Vue js ve REST Api ile çalışmaktadır.
JWT  ile kullancı kontrolü sağlanmaktadır.
Üye girişi yapmış kullanıcı kendine ait maddeleri(todo) ekleyebilir, silebilir, düzenleyebilir.
 <br/>


<br>

### Uygulamayı Çalıştırmak için:

<br/><br/>


Github'dan clone edip çalıştırmak için

    git clone https://github.com/hibadem/laravel-vue-todolist.git

Dosyanın kurulu olduğu yere gidin

    cd laravel-vue-todolist/

Composer yükleyin

    composer install

.env.example dosyasını kopyalayın ve .env dosyası olarak yeniden adlandırın 

    copy .env.example .env

Yeni bir anahtar oluşturmak için aşağıdaki komutu çalıştırın 

    php artisan key:generate
    
.env dosyanızdaki database bilgilerinizin doğruluğundan emin olun.Böyle bir veritabanı 
dosyanız olduğundan emin olun.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

Veritabanı tablolarını eklemek için

    php artisan migrate


Yerel geliştirme sunucusunu başlatın

    php artisan serve

Artık sunucuya şu adresten erişebilirsiniz: http://localhost:8000

Modülleri yüklemek için çalıştırın

    npm install

Webpack derlemesi için

    npm run watch
<br/>
<br/>





