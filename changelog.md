# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

[3.1.0] - 2017-11-16
###Added
- `tasks.xml` to `/data/`

##[3.0.0] - 2017-11-16
###Changed
- README to reflect updates in lab 8

##[2.1.0] - 2017-11-5
##Changed
- Task.php to reflect getter functions

##Added
- phpunit.xml.dist to root of project
- Tasktest.php class to models folder w/ 3 validations

##[2.0.0] - 2017-11-2
### Added
- Entity class to `/application/core/`
- Task class to `/application/models/`
- copy of `/public/index.php` to `/tests/` renamed to `Bootstrap.php`

### Changed
- README to reflect update to lab 7
- `$autoload['model']` includes 'task'

##[1.7.0] - 2017-10-19
###Added
- made three more inputs on itemedit.php
- altered showit method to work with the three inputs

##[1.6.0] - 2017-10-19
###Changed
 - fixed bug in models/app
 - highest method in core/memory_model
 
 
 ###Added
 - task validation tools
 - add function in mtce
 - edit function in mtce
 - showit function in mtce
 - itemedit.php
 - cancel button in itemedit.php
 - deletion in itemedit.php
 - form submission in mtce
 - alert in mtce
 - delete in mtce 
 

## [1.5.0] - 2017-10-19
### Added
- Role-specific maintenance list

## [1.4.0] - 2017-10-19
### Added
- a checklist of tasks in table view

## [1.3.0] - 2017-10-19
### Added
- Roles Controller for user roles

### Changed
- .gitignore to ignore .idea

## [1.2.0] - 2017-10-19
### Added
- itemnav.php view fragment for navigation on maintenance index page

### Changed
- itemlist view fragment to use itemnav view fragment
- Mtce has new functions implemented to use pagination format

## [1.1.0] - 2017-10-19
### Added
- Maintenance controller target link in config.php
- itemlist.php view fragment
- oneitem.php view fragment
- Mtce.php maintenance controller

### Changed
- Markdown error in readme.md

## [1.0.0] - 2017-10-19
### Changed
- Readme to reflect "release" of lab 5 and beginning of lab 6

## [0.5.0] - 2017-10-12
### Added
- Parsedown.php to application/libraries/
- jobs.md to data/
- 'parsedown' to autoload libraries

### Changed
- config.php to include helpme controller target link

## [0.4.0] - 2017-10-12
### Added
- Setup the second template
- Made a view controller
- Made priorited and category views

## [0.3.0] - 2017-10-12
### Added
- Made isset pre-condition on MY_Controller.php and set pagetitle
- Alerted number of tasks to do onto homepage.php which is being rendered from index on Welcome.php
- Listed top 5 tasks based on priority onto homepage.php, also rendered from Welcome.php

## [0.2.0] - 2017-10-12
### Added
- Constructor for tasks.csv
- Added tasks to autoload
- Added comments to Tasks.php

## [0.1.0] - 2017-10-12
### Added
- changelog.md

### Changed
- readme.md description and project name

### Removed
- nbproject folder