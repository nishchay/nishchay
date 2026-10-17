# Nishchay PHP Framework

<p align="center">
  <a href="https://nishchay.io">
      <img src="https://static.nilms.org/nishchay/resources/images/nishchay.png"/>
  </a>
</p>

![PHP Version Support](https://img.shields.io/packagist/php-v/nishchay/nishchay)
![Latest version](https://img.shields.io/packagist/v/nishchay/nishchay.svg)
![Downloads](https://img.shields.io/packagist/dt/nishchay/nishchay.svg)

Nishchay is open structure php framework which allows us to create web application, REST web services and more.

## Install

This framework is installed using composer only. Use below command

```
composer create-project nishchay/nishchay {YourAppName}
```

## Installaion guidelines

- [Linux Ubuntu](https://nishchay.io/learningCenter/installation/ubuntu/composer)
- [Linux CentOS](https://nishchay.io/learningCenter/installation/centos/composer)
- [Windows](https://nishchay.io/learningCenter/installation/windows/composer)
- [MacOS](https://nishchay.io/learningCenter/installation/macos/composer)

## Learn

Learn everything about nishchay [here](https://nishchay.io/learningCenter).

## Your first step (First timer)

If you are using framework for the first time, please go throw implementation which came with installatiion.

This installation comes with following implementations:

1. Login
2. Register
3. Get user detail
4. Static pages `aboutUs`, `help` & `terms`.

#### Setup things

Setup your application by one of **Installaion guidelines**, once that is done follow below steps

###### Step 1: Database setting

Database settings are located in `settings/configuration/database.php`, where you can place one or more database connection configuration.

###### Step 2: Import tables

In order to check implementation which came with installation, please execute `db.sql` which is placed at root directory of application.

###### Step 3: Generate token keys

Access tokens are signed with an RSA key pair. `composer create-project` generates it for you in `settings/keys/` (ignored by git), so there is nothing to do. If the installer reported that it could not (for example OpenSSL is missing), or you cloned the repository instead, generate it once:

```
mkdir -p settings/keys
openssl genrsa -out settings/keys/private.key 2048
openssl rsa -in settings/keys/private.key -pubout -out settings/keys/public.key
```

The paths can be changed in `settings/configuration/service.php`.

###### Step 4: Create account

If you have configured your app on domain name `http://app.nishchay.local`, then make POST request to `http://app.nishchay.local/user/register` with following parameters:

1. email
2. firstName
3. lastName
4. password
5. isTermAccepted = Y

This will return access token using which you can access services which requires token.

###### Step 5: Check login

Login requires a verified account, and this implementation has no email verification step. Mark the account you created as verified:

```
UPDATE `User` SET `isVerified` = 1 WHERE `email` = 'you@example.com';
```

Then make POST request to `http://app.nishchay.local/user/authorize` with the same `email` and `password`. This service also returns access token.

###### Step 6: Get user detail

Using `http://app.nishchay.local/user` service get user detail, you only need to pass access token in header with name `X-Service-Token`.
