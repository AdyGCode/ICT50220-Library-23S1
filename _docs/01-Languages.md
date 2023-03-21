# Languages

The Language lookup table.

## Table Design

| Field Name  | Type    | Size | Options                 | Default |
|-------------|---------|------|-------------------------|---------|
| id          | big int | -    | unsigned, autoincrement |         |
| code        | string  | 8    |                         |         |
| name        | string  | 128  |                         |         |
| description | string  | 255  | nullable                |         |

## Seed Data

Obtained seed data from:

- http://www.lingoes.net/en/translator/langcode.htm

## Migrations

To migrate any tables that have been recently added use:

```bash
sail artisan migrate
```

To roll back a migration use:

```bash
sail artisan migrate:rollback
```

To migrate from fresh with each migration in its own step use:

```bash
sail artisan migrate:fresh --step
```

To rollback multiple stepped migrations use:

```bash
sail artisan migrate:rollback --step=10
 ```

To seed the database after all migrations have been completed

```bash
sail artisan db:seed
```

To run all migrations and start the database from 'scratch' or 'fresh', use:

```bash
sail artisan migrate:fresh --step --seed
```

## API Design

APIs need to have structure.

They also have to be clean in what they return.

Most APIs will have a "call structure" similar to this:

`/api/version/route/parameters`

Where version is the API version number in the form `v`**`n`**, route
is the API endpoint being requested, and parameters are optional depending
on the method being called.

For example:

```text
/api/v1/users/3
/api/v2/authors
```

### HTTP Verbs & Actions

To perform the API actions we related our BREAD or CRUD concepts with
the appropriate HTTP verbs.

Here is a table showing with Languages as part of the API endpoint.

| BREAD  | CRUD   |  HTTP Verb  | API Example                         |
|:-------|:-------|:-----------:|-------------------------------------|
| Browse | Read   |     GET     | GET /api/v1/languages               |
| Read   | Read   |     GET     | GET /api/v1/languages/{language}    |
| Add    | Create |    POST     | POST /api/v1/languages              |
| Edit   | Update | PATCH / PUT | PUT /api/v1/languages               |
| Delete | Delete |   DELETE    | DELETE /api/v1/languages/{language} |

## Making the API

Steps are basically (excluding tests using PEST):

- Create the Routes (Resourceful to begin)
- Create the API Controller (using `artisan`)
- Write and Test the API

In the last of these three steps we then go into the write test,
develop code, test code, refactor loop:

- Build the API Controller code (one action at a time)
- Test the API (one action at a time using Postman, or similar)
- Refactor as required

### Routes

```text
/routes/api.php
```

SHIFT SHIFT brings a search box to find file/class/etc

Add the resourceful route at the bottom:

```php
Route::resource('languages', LanguageApiController::class);
```

## Create the Controller & Pest Tests

```bash
sail artisan make:controller API/LanguageApiController --api --pest
```

Edit the `routes\api.php`.

At the top under the `use` lines:

```php
use App\Http\Controllers\API\LanguageApiController;
```

## Controller Actions

### Browse all Languages

```php
    public function index()
    {
        $languages = Language::all();
        return $languages;
    }
```

URL: http://localhost/api/languages

### Retrieve ONE Language

```php
    public function show(string $id)
    {
        $language = Language::find($id);
        return $language;
    }
```

URL: http://localhost/api/languages/3

## POSTMAN!

Got to https://postman.com

Click Sign Up for Free.

Please follow the steps.



<!-- ADD DETAILS ON POSTMAN HERE --->

## Adding an API Controller Wrapper

The structure of good results from an API endpoint is similar to this:

```json
{
  "data": [
    {
      "type": "articles",
      "id": 1,
      "attributes": {
        "title": "JSON:API paints my bikeshed!",
        "body": "This is the body of the article",
        "commentCount": 2,
        "likeCount": 8
      },
      "relationships": {
        "author": {
          "links": {
            "self": "http://example.com/articles/1/relationships/author",
            "related": "http://example.com/articles/1/author"
          }
        },
        "comments": [
          {
            "data": {
              "type": "user",
              "id": 9
            }
          }
        ]
      },
      "links": {
        "self": "http://example.com/articles/1"
      }
    }
  ],
  "included": [
    {
      "type": "comments",
      "id": "5",
      "attributes": {
        "body": "First!"
      },
      "links": {
        "self": "http://example.com/comments/5"
      }
    }
  ]
}
```
Based on an example in "Test-Driven APIs with Laravel and PEST" by Martin Joo.

### Create the API Base Controller

```bash
sail artisan make:controller API/ApiBaseController
```

Open this file and update to include the following

```php
/**
 * success response method.
 *
 * @return \Illuminate\Http\Response
 */
public function sendResponse($result, $message)
{
    $response = [
        'success' => true,
        'data'    => $result,
        'message' => $message,
    ];


    return response()->json($response, 200);
}


/**
 * return error response.
 *
 * @return \Illuminate\Http\Response
 */
public function sendError($error, $errorMessages = [], $code = 404)
{
    $response = [
        'success' => false,
        'message' => $error,
    ];


    if(!empty($errorMessages)){
        $response['data'] = $errorMessages;
    }


    return response()->json($response, $code);
}
```
