# laravel-see-me

This package is a laravel (5.1-5.4) wrapper for [SeeMe](https://seeme.hu/). It can autoload in method params. Uses the LoggerInterface.

## Setup

### Install

```

composer require andrewboy/laravel-see-me

```

### app.php

```php
    'providers' => [
        ...
        \Andrewboy\LaravelSeeMe\LaravelSeeMeServiceProvider::class,
    ]
```

### publish(optional)

```

php artisan vendor:publish

```

## Config(seeme.php)

```php

return [
    'format' => \Andrewboy\SeeMe\SeeMeGateway::FORMAT_JSON,
    'method' => \Andrewboy\SeeMe\SeeMeGateway::METHOD_CURL,
    'log_to_file' => true
];

```

* *format:* 
    * type: string
    * required: false
    * default: 'json'
    
* *method:*
    * type: string
    * required: false
    * default: 'curl'
    
* *log_to_file:*
     type: boolean
     required: false
     default: false
     
##SeeMe class
     
### Format types

* 'json'
* 'string'
* 'xml'

### Method types

* 'curl'
* 'file_get_contents'

### Methods

#### __consrtuct

##### params

* *$apiKey:* application key
    * type: string
    * required: true
    
* *$logFileDestination:* If false, log is dismissed
    * type: boolean
    * required: false
    * default: false
    
* *$format:* result format
    * type: string
    * required: false
    * default: 'json'
    
* *$method:* set method type
    * type: string
    * required: false
    * default: 'curl'
    
##### return

* void

#### setLogger

##### params

* *$logger:*
    * type: LoggerInterface
    * required: true
    
##### return 

* $this

    
#### setApiKey

##### params

* *$apiKey:* application key
    * type: string
    * required: true
    
##### return

* void

#### setMethod

##### params

* *$method:* set method type
    * type: string
    * required: true
    
##### return

* void

#### setFormat

##### params
    
* *$format:* set result format
    * type: string
    * required: true
    
##### return

* void

#### setIP

##### params

* *$ip:*
    * type: string
    * required: true
    
##### return

* array

#### sendSMS

##### params

* *$number:* mobile number, format: /^36(20|30|31|70)\d{7}$/
    * type: string
    * required: true
    
* *$message:* SMS message
    * type: string
    * required: true
    
* *$sender:* sender id (mobile number)
    * type: string|null
    * required: false
    * default: null (number that you se in the SeeMe admin panel)
    
* *$reference:* 
    * type: string|null
    * required: false
    * default: null
    
* *$callbackParams:* 
    * type: string|null
    * required: false
    * default: null
    
* *$callbackURL:* 
    * type: string|null
    * required: false
    * default: null
    
##### return

* array

#### getResult

##### return

* array

#### getBalance

##### return

* array

#### getLog

##### return

* string