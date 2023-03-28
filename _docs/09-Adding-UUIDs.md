# UUIDs

UUIDs are a nice way to obtain unique identifiers for records and 
hide the actual record ID from the endpoint and hackers.

We will add UUIDs to the tables in this step, then add a trait that 
will automatically create a new UUID for a resource when it is added.

## Adding UUID Migrations
Presuming you have already created the models, controlers, migrations etc
for each of the tables using:

```bash
sail artisan make:model Format -ars
sail artisan make:model Genre -ars
sail artisan make:model Country -ars
sail artisan make:model Author -ars
sail artisan make:model Publisher -ars
sail artisan make:model ItemStatus -ars
sail artisan make:model Book -ars
```
Remember that the `-ars` or `-a -r -s` flags do the following:
- `a` All - creates model, migration, factory, controller, etc
- `r` Resource - the controller is made into a resourceful controller
- `s` Seeder - add the seeder


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

The example below shows how to modify the add `uuid` to 
Languages migration.

Edit the `add_uuid_to_genres` migration and to the `up` method add:

```php
Schema::table('genres', function (Blueprint $table) {
    $table->uuid('uuid')->add();
});
```

In the `down` method add:
```php
Schema::table('genres', function (Blueprint $table) {
    $table->dropColumn('uuid');
});
```

## Creating a Trait

To make it simpler when we add new data to the database we will 
create a Trait that we can reuse.

Traits are reusable code that you write and may use anywhere 
you need to.

They are generally used when you need to use the same code 
across many classes.

- [How Laravel traits are different from helpers](https://codebriefly.com/how-laravel-traits-are-different-from-the-helpers-in-php)
- [How Laravel traits are different from the helpers](https://morioh.com/p/72765f8d7f8e)
- [When to use a trait?](https://matthiasnoback.nl/2022/07/when-to-use-a-trait/)
- [Laravel 8 - Traits - 3 Easy Steps](https://dev.to/dalelantowork/laravel-8-traits-4ai)

## Adding the HasUuid Trait

Add a folder to the App folder called `Traits`.

Make sure you are in your project's root folder then use:
```bash
mkdir app/Traits
```

Click on this Traits folder and then to create the trait use:

- File->New->PHP Class

Enter HasUuid as the name, change the type to Trait

Clicking OK/Create will then reveal a stub trait ready to add the required code.

Edit this stub and add the following inside the trait:

```php
    public static function bootHasUuid(): void
    {
        static::creating(function (Model $model): void {
            $model->uuid = Uuid::uuid4()->toString();
        });

        /* TODO: check on update if UUID is empty,
                 and if it is, add a new uuid */
    }
```

Next we edit the model and add two lines of code to tell the model to use this trait:

After the line:

```php
use Illuminate\Database\Eloquent\Model;
```
add `App\Traits\HasUuid;`

Which gives:
```php
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
```

Inside the model we now add:

```php
use HasUuid;
```

So for the Format model we have:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Format extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable=[
      'name',
      'description',
    ];
}
```

Now we can re-run our migrations and seeds from fresh and it will automatically add a UUID to the models that need them:

```bash
sail artisan migrate:fresh --seed --step
```

> **Remember**: DO NOT use the `migrate:fresh` command on a *production database/application*.
