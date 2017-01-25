#!/usr/bin/env make -f


test : codecept.phar tests/

codecept.phar:
	curl -LO http://codeception.com/codecept.phar

tests/:
	php codecept.phar bootstrap
