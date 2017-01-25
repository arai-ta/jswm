#!/usr/bin/env make -f

test : vendor/bin/codecept tests/
	php vendor/bin/codecept run acceptance --steps

vendor/bin/codecept:
	composer.phar install

tests/:
	php vendor/bin/codecept bootstrap

server:
	php -S localhost:9000 > tests/server.log 2>&1 &
	vendor/bin/phantomjs --webdriver=4444 > tests/phantom.log 2>&1 &

serverdown:
	@pkill -f 'php -S localhost:9000'
	@pkill -f 'vendor/bin/phantomjs --webdriver=4444'

taillog:
	tail -f tests/*.log
