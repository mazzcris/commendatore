# comment-and-conquer

This script will add a lot of useful comments in your php code, turning this:
```
<?php

class TestClass
{
    public function getSomeField()
    {
        return true;
    }

    public function findSomeField()
    {
        return true;
    }

    public function searchSomeField()
    {
        return true;
    }

    public function saveUser()
    {
        return true;
    }

    public function loadUser(){
        return true;
    }
}
```


into this:
```
    // Gets some field
    public function getSomeField()
    {
        return true;
    }

    // Finds some field
    public function findSomeField()
    {
        return true;
    }

    // Searches some field
    public function searchSomeField()
    {
        return true;
    }

    // Saves user
    public function saveUser()
    {
        return true;
    }

    // Loads user
    public function loadUser(){
        return true;
    }
```

## Tests
No time to lose, we write comments. Automagically.
