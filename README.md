# Team Mango - DocuSign Hack For Good

## Installation

* Get composer - https://getcomposer.org/
* Run `composer install`
* Add database details to `config/app.php`
* Add DocuSign details to `config/app.php`

```
'HackForGood' => [
    'DocuSign' => [
        'username' => $username,
        'password' => $password,
        'integratorKey' => $integratorKey,
        'templateId' => $templateId
    ]
]
```
* Migrate the database with `bin/cake migrations migrate`
* Seed the database with `bin/cake migrations seed`

## Login information

* Username/email - volunteer@hackforgood.com
* Password - password
