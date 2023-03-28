# Formats

The Format lookup table.

Includes the format of the book/item.

## Table Design

| Field Name  | Type     | Size | Options                 | Default |
|-------------|----------|------|-------------------------|---------|
| id          | big int  | -    | unsigned, autoincrement |         |
| name        | string   | 64   |                         |         |
| description | string   | 255  | nullable                |         |


## Exercise

1. Create the model, migration, seeder, factory and other items for the Format
2. Create the API for the Format
3. Create and test the Format API
