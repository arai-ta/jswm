#!/usr/bin/env make -f

CODECEPT = vendor/bin/codecept

# testcase name : define at runtime parameter
NAME =

test: $(CODECEPT) tests/
	$(CODECEPT) run acceptance --steps

newtest: $(CODECEPT) tests/
	$(CODECEPT) generate:cept acceptance $(NAME)

$(CODECEPT):
	composer.phar install

tests/:
	$(CODECEPT) bootstrap

server:
	php -S localhost:9000 > tests/server.log 2>&1 &
	vendor/bin/phantomjs --webdriver=4444 > tests/phantom.log 2>&1 &

serverdown:
	@pkill -f 'php -S localhost:9000'
	@pkill -f 'vendor/bin/phantomjs --webdriver=4444'

taillog:
	tail -f tests/*.log
