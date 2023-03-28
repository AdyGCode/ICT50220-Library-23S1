# Authors

The Authors table.

## Table Design

| Field Name    | Type    | Size | Options                 | Default |
|---------------|---------|------|-------------------------|---------|
| id            | big int | -    | unsigned, autoincrement |         |
| Given names   | string  | 128  |                         |         |
| Other names   | string  | 128  | nullable                |         |
| Family names  | string  | 128  | nullable                |         |
| Country       | string  | 128  | nullable                |         |
| Date of Birth | date    |      | nullable                |         |
| Date of Death | date    |      | nullable                |         | 

## Exercise

1. Create the model, migration, seeder, factory and other items for the Author
2. Add the seed data to the Author Seeder
3. Create the API for the Author
4. Create and test the Author API



