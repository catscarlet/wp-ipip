# Changelog

## 3.1.1

- Fix an issue that may cause error messages show multiply times.

## 3.1.0

You may get an unpredictable 403 Forbidden from IPIP.net, and any future request to IPIP.net will be blocked with mysterious reason. The entry is changed from 'window.open' to <a> link so that you can right-click and open it with Private-Browsing/Incognito-Mode.

- Change from 'window.open' to <a> link.

## 3.0.4

Finally wp-useragent fixed it's output issue. I have wait this time for so 3 years, and sorry for the 2 months delays.

- Fix compatibility issue with wp-useragent-1.1.8.
- Hide ipip info before page load complete.

## 3.0.3

- Update IPIP.net IPDB database to 2019-7.
- Support on Mobile now.
- Now has a easier way to install.(See in README.md)

## 3.0.2

Fix a style issue.

## 3.0.1

Fix a conflict with akisment.

## 3.0.0

Support IPIP.ent IPDB database. DATX database is no longer supported.

## 2.0.0

Actually there literally nothing changed since 1.0.0

## 1.0.0

Today I luckily found how to generate the url for querying IP-Geolocation on ipip.net. So this is the update for it.

Now you can click the address-info and open a new page of ipip.net to get more information about the IP-Geolocation information.

IPIP.net doesn't offer English version of database. I decide that the 0.1.x version will no longer be supported.

Users using 0.2.x please update to this version.

## 0.2.x

Support IPIP.net DATX database. DAT database is no longer supported.

## 0.1.3

- Update IPIP database from 201707 to 201803.

I don't know why the database file is smaller than the older one.

IPIP.net will not support .dat database any longer, so a new version of WP-IPIP is on working for the .datx database.

## 0.1-0.1.2

- First commit
- Update to new IPIP lib and database (201707).

Notice the database file is much larger than before, so it will cost more memory.
