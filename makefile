#!/usr/bin/env make -f


test : codecept.phar

codecept.phar:
	curl -LO http://codeception.com/codecept.phar


