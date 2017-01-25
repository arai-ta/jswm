#!/usr/bin/env make -f


test : vendor/bin/codecept tests/

vendor/bin/codecept:
	composer.phar install

tests/:
	php vendor/bin/codecept bootstrap

server:
	php -S localhost:9000 > tests/server.log 2>&1 &
