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

## Create the API Controller & Pest Tests

```bash
sail artisan make:controller API/LanguageApiController --api --pest
```

## Adding the API Routes

Edit the `routes\api.php`.

At the top under the `use` lines:

```php
use App\Http\Controllers\API\LanguageApiController;
```

Also, we need to include the Language model, so add the use line:

```php
use App\Models\Language;
```

## Controller Actions
We are now able to edit and add the various controller actions that
are triggered by the routing.

They include:
- browse (method: index)
- read (method: show)
- edit (method: update)
- add (method: create), and
- delete (method: destroy).

### Browse all Languages

```php
    public function index()
    {
        $languages = Language::all();
        return $languages;
    }
```
To access this we will use the URL: http://localhost/api/languages

### Retrieve ONE Language

```php
    public function show(string $id)
    {
        $language = Language::find($id);
        return $language;
    }
```

To access this we will use the URL: http://localhost/api/languages/3

The `3` at the end will be replaced by the langauge's row ID we want to view.

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

In the console, run the command:

```bash
sail artisan make:controller API/ApiBaseController
```
This creates a new empty controller called `ApiBaseController` 
in an automatically created folder called `API` in the 
`app\Http\Controllers` folder.

Open this file and update to include the following:
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

## Updating the Language API Controller

The new BaseApiController is very useful as it allows us to
define a particular structure for returning data from a request.

Most REST APIs are based upon a standard when returning data.
This is to make it easier for a developer to re-use their code 
and to make debugging simpler if results are coming in an expected 
format.

Open the LanguageApiController and edit the code.

In the block of `use ...` statements at the top of the file, 
add the following:

```php
use App\Http\Controllers\API\ApiBaseController;
```

Next modify the class name line to use the `ApiBaseController`:

```php
class LanguageApiController extends ApiBaseController
```

## Updating our Methods

We are now able to update the base methods to use this new controller.

All our methods will return a `JsonResponse`. So we are able to 
type hint the methods.

### Index Method

The index method, like all the methods we are now going to update,
requires more code so that we are able to respond in a meaningful
way to the API request.

Start by making sure the head of the method is correct:

```php
public function index(): JsonResponse
    {
        $languages = Language::all();
```

Now we are able to add a test to see if we got any results, 

```php
        if (!is_null($languages) && $languages->count() > 0) {
```
If we have results then we are able to use our new `sendResponse` 
method that is in our `BaseApiController`.

```php        
            return $this->sendResponse(
                $languages,
                "Retrieved successfully.",
            );
        }
```
We shortcut the method, by returning directly from the decision
if we did get results.

In the situation we do not, we simply force an error response as
the returned data.
```php        

        return $this->sendError("No Languages Found");
    }
```
### Show Method

```php
    public function show(string $id): JsonResponse
    {
        $language = Language::find($id);

        if (isset($language) && $language->count() > 0) {
            return $this->sendResponse(
                $language,
                "Retrieved language successfully.",
            );
        }

        return $this->sendError("Language Not Found");
    }
```
### Store Method

```php
    public function store(Request $request): JsonResponse
    {
        $validated = [
            'name' => $request['name'],
            'code' => $request['code'],
            'description' => $request['description'],
        ];

        $results = Language::create($validated);

        if (!is_null($results) && $results->count() > 0) {
            return $this->sendResponse(
                $results,
                "Created language successfully.",
            );
        }

        return $this->sendError("Unable to create language");
    }
```

### Update Method

```php
    public function update(Request $request, string $id): JsonResponse
    {
        $language = Language::find($id);

        if (!is_null($language)) {
            $validated = [
                'name' => $request['name'] ?? $language['name'],
                'code' => isset($request['code']) ? $request['code'] : $language['code'],
                'description' => $request['description'] ?? $language['description'],
            ];

            $results = $language->update($validated);

            if (isset($results) && $results->count() > 0) {
                return $this->sendResponse(
                    $results,
                    "Updated successfully.",
                );
            }
            return $this->sendError("Unable to update language");
        }

        return $this->sendError("Unable to update unknown language");

    }
```

### Destroy Method

```php
    public function destroy(string $id): JsonResponse
    {
        $language = Language::find($id);
        $results = $language;

        if (!is_null($language) && $language->count() > 0) {

            $deleted = $language->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted successfully.");
            }
            return $this->sendError("Unable to delete language");
        }

        return $this->sendError("Unable to delete unknown language");
    }
```
