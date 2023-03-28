# Books Feature

## Create the Model, Migration, etc

```bash
sail artisan make:model Book -a -r
```

## Table Design

| Field Name   | Type       | Size | Options                 | Default   |
|--------------|------------|------|-------------------------|-----------|
| id           | big int    | -    | unsigned, autoincrement |           |
| title        | string     | 255  |                         |           |
| sub_title    | string     | 255  | nullable                |           |
| series       | boolean    | -    |                         | false     |
| isbn13       | string     | 13   | nullable                |           |
| edition      | tiny int   | -    | nullable                |           |
| is_fiction   | boolean    | -    |                         | true      |
| language     | string     | 8    |                         | en        |
| published    | year       | -    | nullable                |           |
| format       | string     | 16   |                         | paperback |
| publisher_id | foreign id | -    |                         | 1         |
| uuid         | string     | 128  |                         |           |
| created_at   | timestamp  | -    |                         |           |
| updated_at   | timestamp  | -    |                         |           |

## App\Models\Book.php

Add the HasUuid Trait to the model to make sure it adds the UUID automatically
when a new book is added.

Make sure that the fields except created_at, updated_at, and id are listed 
as fillable in the model.
