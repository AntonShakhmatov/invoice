-Create a `.env` file in the root directory of the application and add the following content:

```
DATABASE_URL="mysql://username:password@localhost:3306/symfony?serverVersion=5.7&charset=utf8mb4"
```

Replace `username` with the actual username for your database and `password` with the actual password.

-Use the already created entities and create databases for the app by running the following commands in the terminal:

```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

Alternatively, you can import the `symfony.sql` file from the `sql` folder.

-In the root directory of the application, run the following command in the terminal:

```
symfony serve
```

-The Invoice maker can be accessed at: `/invoice/new`
-To add products and their types to the table, go to: `/product`
To add a product type for the invoice form, modify the file `src/Form/Type/InvoiceLinesType.php` starting from line 33.