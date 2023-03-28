# ItemStatus Feature

## Create the Model, Migration, etc

```bash
sail artisan make:model ItemStatus -a -r
```

## Table Design

| Field Name   | Type       | Size | Options                 | Default   |
|--------------|------------|------|-------------------------|-----------|
| id           | big int    | -    | unsigned, autoincrement |           |
| status       | string     | 64   |                         |           |
| code         | string     | 6    |                         |           |
| description  | string     | 255  | nullable                | false     |
| created_at   | timestamp  | -    |                         |           |
| updated_at   | timestamp  | -    |                         |           |


## Exercise

1. Create the model, migration, seeder, factory and other items for the ItemStatus
2. Add the seed data to the ItemStatus Seeder
3. Create the API for the ItemStatus
4. Create and test the ItemStatus API
