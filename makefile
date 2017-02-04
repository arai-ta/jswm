#!/usr/bin/env make -f

CODECEPT = vendor/bin/codecept

# testcase name : define at runtime parameter
NAME =

test: $(CODECEPT) tests/ server
	$(CODECEPT) run acceptance --steps

newtest: $(CODECEPT) tests/
	$(CODECEPT) generate:cept acceptance $(NAME)

$(CODECEPT):
	composer.phar install

tests/:
	$(CODECEPT) bootstrap

# run tests, then push commits
push:
	make test
	git push origin

server:
	php -S localhost:9000 > tests/server.log 2>&1 &
	vendor/bin/phantomjs --local-storage-path=/dev/null \
		--webdriver=4444 > tests/phantom.log 2>&1 &

serverdown:
	@pkill -U $$UID -f 'php -S localhost:9000'
	@pkill -U $$UID -f 'vendor/bin/phantomjs'

taillog:
	tail -f tests/*.log
