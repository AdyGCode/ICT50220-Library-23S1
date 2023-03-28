# Using the UUIDs

In the previous step we created UUIDs on all our models.

In practice, we will only use the UUIDs on certain models:

- Publisher
- Author
- Books
- Genre

We basically use the UUID in place of the ID field when the user interacts with the application.

For example, when we want to find an author, we will give the UUID and not the ID.

The UUID is safer as it helps obfuscate the model's real id from the end user.

So how do we change the models to return the UUID in place of the ID?

We will use the `getRouteKeyName` to do this.

## Adding a `getRouteKeyName` to the Genre Model

Open the Genre model.

Inside the class, and before the close curly bracket add:

```php
public function getRouteKeyName():string{
    return 'uuid';
}
```

## Exercise - returning UUIDs

1. Add the getRouteKeyName to the Publisher, Genre, and Author models.
2. Use the API to list all the data for each model.
3. Copy ONE UUID from the list, and replace the number in the get with the UUID.
4. Verify that the correct row is returned.

