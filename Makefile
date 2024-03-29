.PHONY: no_targets__ info help build deploy doc
        no_targets__:

.DEFAULT_GOAL := help

# CONSTANTS
DOCKER_COMPOSE = docker-compose
DOCKER_COMPOSE_FILE = docker-compose.yml

ifneq (,$(findstring xterm,${TERM}))
	BLACK   := $(shell tput -Txterm setaf 0)
	RED     := $(shell tput -Txterm setaf 1)
	GREEN   := $(shell tput -Txterm setaf 2)
	YELLOW  := $(shell tput -Txterm setaf 3)
	BLUE    := $(shell tput -Txterm setaf 4)
	MAGENTA := $(shell tput -Txterm setaf 5)
	CYAN    := $(shell tput -Txterm setaf 6)
	WHITE   := $(shell tput -Txterm setaf 7)
	RESET   := $(shell tput -Txterm sgr0)
else
	BLACK   := ""
	RED     := ""
	GREEN   := ""
	YELLOW  := ""
	BLUE    := ""
	MAGENTA := ""
	CYAN    := ""
	WHITE   := ""
	RESET   := ""
endif

TARGET_COLOR := $(YELLOW)

SERVICE_NAME = customservicename

SELF_DIR := $(dir $(lastword $(MAKEFILE_LIST)))

# Help command

help:
	@echo "╔══════════════════════════════════════════════════════════════════════════════╗"
	@echo "║                                                                              ║"
	@echo "║                           ${CYAN}.:${RESET} AVAILABLE COMMANDS ${CYAN}:.${RESET}                           ║"
	@echo "║                                                                              ║"
	@echo "╚══════════════════════════════════════════════════════════════════════════════╝"
	@echo ""
	@grep -E '^[a-zA-Z_0-9%-]+:.*?## .*$$' $(MAKEFILE_LIST) | sed -E 's/^[^:]*://' | awk 'BEGIN {FS=":.*?## "}; {printf "${TARGET_COLOR}%-1s${TARGET_COLOR} %s\n", $$2,":"$$1}' | awk 'BEGIN {FS=":"}; {printf "· ${TARGET_COLOR}%-40s${RESET} %s\n", $$3"("$$1"):",$$2}'
	@echo ""
# Build and start the Docker containers
up:
	$(DOCKER_COMPOSE) up -d --build
down:
	$(DOCKER_COMPOSE) down