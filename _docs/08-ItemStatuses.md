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
| code         | string     | 3    |                         |           |
| description  | string     | 255  | nullable                | false     |
| created_at   | timestamp  | -    |                         |           |
| updated_at   | timestamp  | -    |                         |           |


