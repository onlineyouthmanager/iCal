# Change Log
All notable changes to this project will be documented in this file.

## 1.x
### Changed
- Require PHP >=5.6 (drop support for PHP 5.3, 5.4, 5.5)

### Removed
- Removed methods:
    - `Eluceo\iCal\Component\Calendar::addEvent()`
    - `Eluceo\iCal\Component\Property::setParam()`
    - `Eluceo\iCal\Component\Property::getParam()`
    - `Eluceo\iCal\Component\Property::getValue()`
    - `Eluceo\iCal\Component\Property\Event\Attendees::getValue()`

## [0.10.0] - 2016-04-26
### Changed
- Use 'escapeValue' to escape the new line character. [#60](https://github.com/markuspoerschke/iCal/pull/60)
- Order components by type when building ical file. [#65](https://github.com/markuspoerschke/iCal/pull/65)

### Added
- X-ALT-DESC for HTML types with new descriptionHTML field. [#55](https://github.com/markuspoerschke/iCal/pull/55)
- Added a property and setter for calendar color. [#68](https://github.com/markuspoerschke/iCal/pull/68)
- Write also GEO property if geo location is given. [#66](https://github.com/markuspoerschke/iCal/pull/66)

## [0.9.0] - 2015-11-13
### Added
- CHANGELOG.md based on [’Keep a CHANGELOG’](https://github.com/olivierlacan/keep-a-changelog)
- Support event properties EXDATE and RECURRENCE-ID [#50](https://github.com/markuspoerschke/iCal/pull/53)

### Changed
- Allow new lines in event descriptions [#53](https://github.com/markuspoerschke/iCal/pull/53)
- **Breaking Change:** Changed signature of the ```Event::setOrganizer``` method. Now there is is only one parameter that must be an instance of ```Property\Organizer```.
- Updated install section in README.md [#54](https://github.com/markuspoerschke/iCal/pull/53)

[Unreleased]: https://github.com/markuspoerschke/iCal/compare/0.10.0...1.x
[0.10.0]: https://github.com/markuspoerschke/iCal/compare/0.9.0...0.10.0
[0.9.0]: https://github.com/markuspoerschke/iCal/compare/0.8.0...0.8.0
