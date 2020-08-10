# LogIn Applicaiton

Simple Login Application build using Vanilla PHP

## Getting Started


### Prerequisites

PHP, MYSQL OR MAMP/WAMP. Database config can set on Core/Database/Config

#### Tree Structure of Application
```
    ├── Controller
    │   ├── Controller.php
    │   ├── HomeController.php
    │   └── LoginController.php
    ├── Core
    │   ├── CSRFToken.php
    │   ├── Database
    │   │   ├── Config.php
    │   │   └── DB.php
    │   ├── Hash.php
    │   ├── Request.php
    │   ├── Router.php
    │   └── Session.php
    ├── README.md
    ├── Repository
    │   └── UserRepository.php
    ├── Service
    │   ├── FileService.php
    │   └── LoginService.php
    ├── Storage
    │   └── File
    ├── composer.json
    ├── homestead.sql
    ├── index.php
    ├── routes.php
    ├── vendor
    │   ├── autoload.php
    │   └── composer
    │       ├── ClassLoader.php
    │       ├── LICENSE
    │       ├── autoload_classmap.php
    │       ├── autoload_namespaces.php
    │       ├── autoload_psr4.php
    │       ├── autoload_real.php
    │       ├── autoload_static.php
    │       └── installed.json
    └── views
        ├── index.view.php
        ├── login.view.php
        ├── partial
        │   └── nav.php
        └── register.view.php

```
