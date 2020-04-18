<!-- markdownlint-disable MD012 MD022 MD024 -->
# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).



&nbsp; <!-- break line -->


## [Unreleased]

### Added

- Implement companies ignored API routes
- Implement QR Code generation for mobile connexion
- Create API tests
- Add more errors on bad api call (like a GET on POST method, return "method unavailable")
- Improve invoice qualifications
- Rename `chasing_date` by `cashing_date` in `Invoicies` table
- Fix map import of vuex (READ: <https://stackoverflow.com/questions/52773324/are-vuex-mapgetters-even-worth-using#answer-52795538>)

### Changed

- Refactor dashboard widget
    - add icon property
    - extract logic & style into mixins


&nbsp; <!-- break line -->



## [1.1.0a] - 2020-04-18

### Added

- All necessary API routes


## Changed

- Customer CRUD now works !


&nbsp; <!-- break line -->


## [1.0.0a] - 2020-04-11

### Added

- Vue application
- Laravel API
- BDD : Eloquent migrations


&nbsp; <!-- break line -->


## [0.1.0] - 2020-01-21

### Added

- LICENSE

### Changed

- add basic files in gitignore
