# Languages

The Language lookup table.

## Table Design

| Field Name  | Type     | Size | Options                 | Default |
|-------------|----------|------|-------------------------|---------|
| id          | big int  | -    | unsigned, autoincrement |         |
| code        | string   | 8    |                         |         |
| name        | string   | 128  |                         |         |
| description | string   | 255  | nullable                |         |
