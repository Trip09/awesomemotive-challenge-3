# Info

This was written in php 7.1 BUT if this was a commercial plugin I would write compatible with PHP 5.3

# Build Assets JS

I have gulp not grunt.... sorry...  

I know grunt was required but I never had use it and since this is a test I did it with 
webpack (the most recent kid on the block ;) ). 


go to path "resources/assets"

Run 

npm install
npm run-script build

# composer installation
in composer property add 
```JSON
"repositories": [
...
    {
      "name": "awesomemotive-challenge-3",
      "type": "package",
      "package": {
        "name": "awesomemotive/challenge-3",
        "type": "wordpress-plugin",
        "version": "v1.0.0",
        "source": {
          "type": "git",
          "reference": "master",
          "url": "git@github.com:Trip09/awesomemotive-challenge-3.git"
        }
      }
    }
...
]
```

composer require awesomemotive-challenge-3 --no-update
composer install