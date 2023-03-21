# UUIDs

UUIDs are a nice way to obtain unique identifiers for records and 
hide the actual record ID from the endpoint and hackers.

We will add UUIDs to the tables in this step, then add a trait that 
will automatically create a new UUID for a resource when it is added.

## Adding UUID Migrations

Create the migrations (to update the tables):
```bash
sail artisan make:migration add_uuid_to_languages
sail artisan make:migration add_uuid_to_formats
sail artisan make:migration add_uuid_to_genres
sail artisan make:migration add_uuid_to_countries
sail artisan make:migration add_uuid_to_authors
sail artisan make:migration add_uuid_to_publishers
sail artisan make:migration add_uuid_to_itemstatuses
sail artisan make:migration add_uuid_to_books
```

### Modifying the add_* Migrations

The example below shows how to modify the add uuid to 
Languages migration.

Edit the add_uuid_to_genres migration and to the Up method add:

```php
Schema::table('genres', function (Blueprint $table) {
    $table->uuid('uuid')->add();
});
```

In the Down method add:
```php
Schema::table('genres', function (Blueprint $table) {
    $table->dropColumn('uuid');
});
```

## Creating a Trait

To make it simpler when we add new data to the database we will create a Trait that we can reuse.

Run the command:
```bash
sail artisan make:trait HasUuid
```
